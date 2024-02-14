<?php
require_once "../Model/RegisterModel.php";
// require_once "./config.php";

class RegisterControl {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function processValues($name, $email, $mobile, $pass, $country, $status) {
        $this->model->addValues($name, $email, $mobile, $pass, $country, $status);
        // header("Location: /PHP_practiceCodes/login.php");
        echo "registration success";
    }

}

$regModel = new RegisterModel();
$regControl = new RegisterControl($regModel);
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pass = $_POST["password"];
    $country = $_POST["country"];
    $status = "active";

    $regControl->processValues($name, $email, $mobile, $pass, $country, $status);
}
