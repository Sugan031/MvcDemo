<?php
    require_once "Controller/LoginController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        table {
            position: relative;
            top: 350px;
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            /* background-color: lightblue; */
        }

        th, td {
            padding: 10px;
            border: 1px solid lightslategray;
            text-align: left;
        }
        #mybutton{
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        img{
            position: absolute;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <!-- <img src="https://github.com/Taratakos/form-login/blob/main/assets/img/login-bg.png?raw=true" alt=""> -->
    <form action="" method="post">
        <table>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" id="email" placeholder="Enter your mail id" required>
                <small id="small"></small></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" id="pass" name="password" placeholder="Enter your password" required>
                <small id="passError"></small></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" id="mybutton" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    <!-- <form action="" method="post">
    <button name="register" type="submit">Register</button>
    </form> -->
    <a href="View/RegisterView.php">Register</a>
</body>
</html>
<?