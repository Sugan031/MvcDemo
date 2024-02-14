<?php
require_once "./config.php";
class LoginModel {
    public function checkValues($email, $pass) {
        global $conn;
        $sql = "SELECT password FROM person_details WHERE email_id=? AND status = 'active'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!mysqli_num_rows($result) > 0) {
            echo "invalid email id";
        } else {
    
            $row = mysqli_fetch_assoc($result);
            $passCheck = $row["password"];
            if ($passCheck == $pass) {
                // header("Location: /PHP_practiceCodes/home.php");
                echo "Login success";
            } else {
                echo "password is not matching";
            }
        }
    }
}
