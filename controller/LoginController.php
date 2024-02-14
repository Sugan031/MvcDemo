<?php
require_once("./Model/LoginModel.php");
    class LoginControl{
        private $model;

        public function __construct($model)
        {
            $this->model=$model;
        }

        public function processCheck($email, $pass){
            $this->model->checkValues($email, $pass);
        }
        // public function openRegister(){
        //     header("Location: /MvcDemo/view/register.php ");
        // }
    }

    $logModel = new LoginModel();
    $logControl = new LoginControl($logModel);

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $logControl->processCheck($email,$pass);
    }
    // if(isset($_POST["register"])){
    //     $logControl->openRegister();
    // }

?>