<?php
require_once "../config.php";
class RegisterModel {
    public function addValues($name, $email, $mobile, $pass, $country, $status) {
        global $conn;
        // $status = "active";
        $stmt = $conn->prepare("insert into person_details(name, email_id, mobile_no, password, country,status)values(?,?,?,?,?,?)");
        $stmt->bind_param("ssisss", $name, $email, $mobile, $pass, $country, $status);
        $stmt->execute();

    }
}
