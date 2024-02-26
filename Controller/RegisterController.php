<?php
require_once "../Model/RegisterModel.php";
// require_once "./config.php";

class RegisterControl {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function processValues($name, $email, $mobile, $pass, $department, $rm_id,$newImgName, $status) {
        $result = $this->model->addValues($name, $email, $mobile, $pass, $department, $rm_id,$newImgName, $status);
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
    $department = $_POST["department"];
    $status     = "A";
    $newImgName ="";
    $rm_id ="";
    $rm_id = $department=="development"?201:($department=="sales"?202:203);
    if(isset($_FILES["my_image"])){
        $imgName = $_FILES["my_image"]["name"];
        $imgSize = $_FILES["my_image"]["size"];
        $tmpName = $_FILES["my_image"]["tmp_name"];
        $error    = $_FILES["my_image"]["error"];
        if($error === 0){
            if($imgSize>650000){
                $em = "sorry your file is too large";
                echo $em;
            }
            else{
                $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
                $imgExLc = strtolower($imgEx);
    
                $alloed_ex = array('png','jpg', 'jpeg', 'webp');
                if(in_array($imgExLc, $alloed_ex)){
                    $newImgName    = uniqid("IMG-").'.'. $imgExLc;
                    $imgUploadPath = $_SERVER['DOCUMENT_ROOT'] .'/MvcDemo/images/'. $newImgName;
                    move_uploaded_file($tmpName,$imgUploadPath);
                }
                else{
                    echo "This type of files not allowed";
                }
            }
        }
        else{
            echo "Unknown error occured!";
        }
    }
    if($newImgName != "")
        $regControl->processValues($name, $email, $mobile, $pass, $department,$rm_id,$newImgName, $status);
}
