<?php
require_once "../Model/HomeModel.php";
session_start();

class HomeController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function display() {
        $email = $_SESSION["email"];
        $res = $this->model->selectAll($email);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $dId        = $row["id"];
                $dName      = $row["name"];
                $dEmail     = $row["email_id"];
                $dMobile    = $row["mobile_no"];
                $dPass      = $row["password"];
                $dCountry   = $row["department"];
            }
        }
        $_SESSION["id"] = $dId;
        return [$dId, $dName, $dEmail, $dMobile, $dPass, $dCountry];
    }

    public function ShowDelValues() {
        $result = $this->model->showValues();

        return $result;
    }

    // public function delValue() {
    //     $email = $_SESSION["email"];
    //     $this->model->delValues($email);
    // }

    public function actValues($id,$status) {
        $dId = $_SESSION["id"];
        if($id != $dId){
        $result = $this->model->actValByRow($id,$status);
        } else{
            $message = "You can't delete your own id";
            $_SESSION["msg"] = $message;
            header("Location: ../View/ShowView.php");
        }
        return $result;
    }
    public function logout(){
        session_unset();
        session_destroy();
        sleep(1);
        header("Location: /MvcDemo/");
    }

}

$homeModel = new HomeModel();
$homeControl = new HomeController($homeModel);
// $homeControl->delValue();
if (isset($_GET["id"]) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $status = $_GET["status"];
    echo $id;
    echo $status;

    $result = $homeControl->actValues($id,$status);
    if ($result && $status=='A') {
        header("Location: ../View/DelValueView.php");
    } elseif($result && $status=='D'){
        $_SESSION["msg"] = "";
        header("Location: ../View/ShowView.php");
    } else {
        echo "Value is not deleted";
    }
}

if(isset($_POST["logout"])){
    $homeControl->logout();
}