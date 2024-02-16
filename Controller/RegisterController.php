<?php
require_once "../Model/RegisterModel.php";
// require_once "./config.php";

class RegisterControl {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function processValues($name, $email, $mobile, $pass, $country, $status) {
        $result = $this->model->addValues($name, $email, $mobile, $pass, $country, $status);
        // header("Location: /PHP_practiceCodes/login.php");
        echo "registration success";
        if($result){
            header("Location: /MvcDemo/");
        }
    }

}

$regModel = new RegisterModel();
$regControl = new RegisterControl($regModel);
if (isset($_POST["submit"])) {
    $name       = $_POST["name"];
    $email      = $_POST["email"];
    $mobile     = $_POST["mobile"];
    $passOne    = $_POST["password"];
    $pass       = password_hash($passOne, PASSWORD_DEFAULT);
    $country    = $_POST["country"];
    $status     = "active";

    $regControl->processValues($name, $email, $mobile, $pass, $country, $status);
}
