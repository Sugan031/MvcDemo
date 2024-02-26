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

    // public function delVal() {
    //     $dId = $_SESSION["id"];
    //     if (isset($_GET["id"])) {
    //         $id = $_GET["id"];
    //         if ($dId != $id) {
    //             $result = $this->model->delValByRow($id);
    //             if ($result) {
    //                 $_SESSION["msg"] = "";
    //                 header("Location: ../View/ShowView.php");
    //             } else {
    //                 echo "Value is not deleted";
    //             }
    //         } else {
    //             $message = "You can't delete your own id";
    //             $_SESSION["msg"] = $message;
    //             header("Location: ../View/ShowView.php");
    //         }
    //     }
    // }

    public function editVal($id) {
        $result = $this->model->editValues($id);
        return $result;
    }

    public function updateValue() {
        if (isset($_POST["submit"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $mobile = $_POST["mobile"];
            $newImgName = "";
            $imgName = $_FILES["my_image"]["name"];
            $imgSize = $_FILES["my_image"]["size"];
            $tmpName = $_FILES["my_image"]["tmp_name"];
            $error = $_FILES["my_image"]["error"];
            if (!$imgName == "") {
                if ($error === 0) {
                    if ($imgSize > 650000) {
                        $em = "sorry your file is too large";
                        echo $em;
                    } else {
                        $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
                        $imgExLc = strtolower($imgEx);

                        $alloed_ex = array('png', 'jpg', 'jpeg', 'webp');
                        if (in_array($imgExLc, $alloed_ex)) {
                            $newImgName = uniqid("IMG-") . '.' . $imgExLc;
                            $imgUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/MvcDemo/images/' . $newImgName;
                            echo $newImgName;
                            echo $imgUploadPath;
                            move_uploaded_file($tmpName, $imgUploadPath);
                        } else {
                            echo "This type of files not allowed";
                        }
                    }
                } else {
                    echo "Unknown error occured!";
                }
            } else {
                $newImgName = $_POST["file"];
            }
            $result = $this->model->updateValuesDb($name, $email, $mobile, $newImgName, $id);

            if ($result) {
                header("Location: ../View/ShowView.php");
            }

        }
    }

}

$showModel = new ShowModel();
$showControl = new ShowController($showModel);
// $showControl->delVal();
$showControl->updateValue();
