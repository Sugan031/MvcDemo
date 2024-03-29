<?php
require_once "../config.php";
class showModel {
    public function showValues() {
        global $conn;
        $sql = "SELECT * FROM person_details WHERE status = 'A'";
        $result = $conn->query($sql);

        return $result;
    }

    // public function delValByRow($id) {
    //     global $conn;
    //     $dId = $_SESSION["id"];
    //     if ($dId != $id) {
    //         $stmt   = $conn->prepare("UPDATE person_details SET status = 'D' WHERE id = ? ");
    //         $stmt->bind_param("i", $id);
    //         $result = $stmt->execute();
    //     }
    //     return $result;
    // }

    public function editValues($id) {
        global $conn;
        $sql    = "SELECT * FROM person_details WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function updateValuesDb($name, $email, $mobile,$newImgName , $id) {
        global $conn;
        $stmt   = $conn->prepare("UPDATE  person_details SET name = ?,email_id=?, mobile_no=?, image_url=? WHERE id = ? ");
        $stmt->bind_param("ssisi", $name, $email, $mobile,$newImgName , $id);
        $result = $stmt->execute();
        return $result;
    }
}
