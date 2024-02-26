<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/MvcDemo/config.php";
session_start();
class LoginModel {
    public function checkValues($email, $pass) {
        global $conn;
        $sql    = "SELECT password FROM person_details WHERE email_id=? AND status = 'A'";
        $stmt   = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!mysqli_num_rows($result) > 0) {
            echo "invalid email id";
        } else {
            $_SESSION["email"] = $email;
            $row        = mysqli_fetch_assoc($result);
            $passCheck  = $row["password"];
            if (password_verify($pass, $passCheck)) {
                return true;
            } else {
                echo "password is not matching";
            }
        }
    }
}
