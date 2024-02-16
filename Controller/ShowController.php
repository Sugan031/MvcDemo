<?php
require_once "../Model/ShowModel.php";
session_start();
class ShowController {
    private $model;
    public function __construct($model) {
        $this->model = $model;
    }

    public function showHome() {
        $result = $this->model->showValues();

        return $result;
    }

    public function delVal() {
        $dId = $_SESSION["id"];
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            if ($dId != $id) {
                $result = $this->model->delValByRow($id);
                if ($result) {
                    $_SESSION["msg"] = "";
                    header("Location: ../View/ShowView.php");
                } else {
                    echo "Value is not deleted";
                }
            } else {
                $message = "You can't delete your own id";
                $_SESSION["msg"] = $message;
                header("Location: ../View/ShowView.php");
            }

        }
    }

    public function editVal($id) {
        $result = $this->model->editValues($id);
        return $result;
    }

    public function updateValue() {
        if (isset($_POST["submit"])) {
            $id         = $_POST["id"];
            $name       = $_POST["name"];
            $email      = $_POST["email"];
            $mobile     = $_POST["mobile"];
            $result     = $this->model->updateValuesDb($name, $email, $mobile, $id);
            if ($result) {
                header("Location: ../View/ShowView.php");
            }
        }
    }

}

$showModel = new ShowModel();
$showControl = new ShowController($showModel);
$showControl->delVal();
$showControl->updateValue();
