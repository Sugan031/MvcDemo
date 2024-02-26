<?php
require_once "../config.php";
class RegisterModel {
    public function addValues($name, $email, $mobile, $pass, $department,$rm_id,$newImgName, $status) {
        global $conn;
        // $status = "active";
        $stmt = $conn->prepare("INSERT INTO person_details(name, email_id, mobile_no, password, department,rm_id,image_url,status,created_date)values(?,?,?,?,?,?,?,?,NOW())");
        $stmt->bind_param("ssississ", $name, $email, $mobile, $pass, $department,$rm_id, $newImgName, $status);
        $stmt->execute();
        return true;

    }
}
