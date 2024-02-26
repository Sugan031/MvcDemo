<?php
    require_once "../Controller/ShowController.php";
    if (isset($_GET["uid"])) {
        $id = $_GET["uid"];
        $_SESSION["uid"] = $id;
        $result = $showControl->editVal($id);
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#b0e0e6;
        }
         table {
            position: relative;
            top: 250px;
            left: 360px;
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            position: fixed;
            border-radius: 20px;
            /* background-color: lightblue; */
            background-color: rgba(58, 54, 54, 0.5);
        }

        th, td {
            padding: 10px;
            border: 0px solid lightslategray;
            text-align: left;
            font-weight: bold;
        }
        input[value]{
            color: black;
        }
        input[readonly]{
            color: grey;
        }
        #mybutton{
            position: relative;
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            left: 320px;
        }
        #back{
            color: black;
        }
        .div1 {
            width: 35mm;
            height: 45mm;
            overflow: hidden;
            border: 1px solid #000; 
        }

        .div1 img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
         <tr>
            <th>ID</th>
            <td><input type="number" name="id" value="<?php echo $row["id"]; ?>" readonly></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><input type="text" name="name" value="<?php echo $row["name"]; ?>" readonly></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" id="email" value="<?php echo $row["email_id"]; ?>">
            <small id="small"></small></td></td>
        </tr>
        <tr>
            <th>Mobile No</th>
            <td><input type="tel" name="mobile" id="mobile" value="<?php echo $row["mobile_no"]; ?>">
            <small id="NumError">mobile number must be 10 numbers long</small></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><div class="div1"> <img src="../images/<?php echo $row["image_url"]; ?>" alt="<?php echo $row["image_url"];?>"></div>
            <input type="text" name="file" value="<?php echo $row["image_url"]; ?>" hidden>
            <br><input type="file" name="my_image"></td>
        </tr>
        <!-- <tr>
            <th>Country</th>
            <td><?php echo $val[5]; ?></td>
        </tr> -->
        <tr>
                <td colspan="2"><button id="mybutton" name="submit">Submit</button></td>
            </tr>
    </table>
    </form>
    <a href="./ShowView.php" id="back">back</a>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../View/js/LoginValidation.js"></script>
    <script src="../View/js/RegisterValidation.js"></script>
</body>
</html>