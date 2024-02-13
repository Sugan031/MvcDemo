<?php
require_once "./config.php";
class RegisterModel {
    public function addValues($id, $name, $email, $mobile, $pass, $country, $status) {
        global $conn;
        // $status = "active";
        $stmt = $conn->prepare("insert into person_details(id,name, email_id, mobile_no, password, country,status)values(?,?,?,?,?,?,?)");
        $stmt->bind_param("ississs", $id, $name, $email, $mobile, $pass, $country, $status);
        $stmt->execute();

    }
}
