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
    </style>
</head>
<body>
    <form action="" method="post">
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
            <td><input type="email" name="email" value="<?php echo $row["email_id"]; ?>"></td>
        </tr>
        <tr>
            <th>Mobile No</th>
            <td><input type="tel" name="mobile" value="<?php echo $row["mobile_no"]; ?>"></td>
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
</body>
</html>