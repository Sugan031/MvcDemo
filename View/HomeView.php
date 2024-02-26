<?php
    require_once "../Controller/HomeController.php";

    $val = $homeControl->display();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#ffe4e1;
        }
    table {
            position: relative;
            top: 250px;
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            border-radius: 10px;
            background-color: rgba(60, 60, 60, 0.5);
            /* background-color: lightblue; */
        }

        th, td {
            padding: 10px;
            border: 0px solid lightslategray;
            text-align: left;
           
        }
        .mybutton{
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: auto;
            position: relative;
            left: 600px;
            top: 300px;
        }
        /* img{
            position: absolute;
            opacity: 0.5;
        } */
        a{
            color: white;
        }
        #back{
            color: black;
        }
        #logOutButton{
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: auto;
            position: relative;
            left: 675px;
            top: 315px;
        }
</style>
</head>
<body>
<!-- <img src="https://github.com/bedimcode/animated-login-form/blob/main/assets/img/login-bg.png?raw=true" alt=""> -->
    <table>
         <tr>
            <th>ID</th>
            <td><?php echo $val[0]; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo $val[1]; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $val[2]; ?></td>
        </tr>
        <tr>
            <th>Mobile No</th>
            <td><?php echo $val[3]; ?></td>
        </tr>
        <tr>
            <th>Department</th>
            <td><?php echo $val[5]; ?></td>
        </tr>
    </table>
    <form action="" method="post">
            <button id="showlist" name="showlist" class="mybutton"> <a href="ShowView.php">Show full list</a></button>
            <!-- <button id="delbutton" name="delete" class="mybutton"><a href="DelView.php">Delete My Account</a></button> -->
            <button id="delValuebutton" name="delete" class="mybutton"><a href="DelValueView.php">Show Deleted Values</a></button>
            <br>
            <button id="logOutButton" name="logout">Logout</a></button>
    </form>
    <!-- <a href="../index.php" id="back">back</a> -->
    <a href="./"></a>
</body>
</html>