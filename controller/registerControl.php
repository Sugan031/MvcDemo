<?php
require_once "./model/registermodel.php";
// require_once "./config.php";

class RegisterControl {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function processValues($id, $name, $email, $mobile, $pass, $country, $status) {
        $this->model->addValues($id, $name, $email, $mobile, $pass, $country, $status);
        echo "Registraion succesful";
    }
}
