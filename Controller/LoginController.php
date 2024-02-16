<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/MvcDemo/Model/LoginModel.php";
class LoginControl {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function processCheck($email, $pass) {
        $row = $this->model->checkValues($email, $pass);
        return $row;
    }
}

$logModel = new LoginModel();
$logControl = new LoginControl($logModel);

if (isset($_POST["submit"])) {
    $email  = $_POST["email"];
    $pass   = $_POST["password"];
    $row    = $logControl->processCheck($email, $pass);
    if ($row) {
        header("Location: View/HomeView.php");
    }
}
