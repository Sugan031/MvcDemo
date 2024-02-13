<?php
// i have only one controller, with only one action, so i call it.
// i havnt autoloader so i do all requires here
require_once "./config.php";
require_once "./controller/registerControl.php";
require_once "./model/registermodel.php";
require_once "./view/register.php";

$regModel = new RegisterModel();
$regControl = new RegisterControl($regModel);

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pass = $_POST["password"];
    $country = $_POST["country"];
    $status = "active";

    $regControl->processValues($id, $name, $email, $mobile, $pass, $country, $status);
}
