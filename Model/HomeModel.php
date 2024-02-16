<?php
require_once "../config.php";

class HomeModel {
    public function selectAll($email) {
        global $conn;
        $sql = "SELECT * FROM person_details WHERE email_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function showValues() {
        global $conn;
        $sql = "SELECT * FROM person_details WHERE status = 'deleted'";
        $result = $conn->query($sql);

        return $result;
    }

    public function delValues($email) {
        global $conn;
        $status = "deleted";
        $stmt = $conn->prepare("UPDATE  person_details SET status = ? WHERE email_id = ? ");
        $stmt->bind_param("ss", $status, $email);
        $stmt->execute();
    }

    public function actValByRow($id) {
        global $conn;
        $stmt = $conn->prepare("UPDATE person_details SET status = 'active' WHERE id = ? ");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }
}
