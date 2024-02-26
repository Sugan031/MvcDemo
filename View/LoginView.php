<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/MvcDemo/Controller/LoginController.php";
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
            background-color:#b0c4de;
        }
        table {
            position: relative;
            top: 300px;
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            /* border:solid black 2px; */
            border-radius: 20px;
            /* background-color: lightskyblue; */
            /* background-color: lightblue; */
            background-color: rgba(58, 54, 54, 0.5);
            /* left: 200px; */
        }

        th, td {
            padding: 10px;
            border: 0px solid white;
            border-radius: 20px;
            text-align: left;
            opacity: 1.2;
        }
        #mybutton{
            background-color: blue;
            color: white;
            padding: 10px 15px;
            margin-left: 300px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        a{
            position: relative;
            border: 1px solid black;
            padding: 7px;
            border-radius: 5px;
            color: white;
            background-color: blue;
            top: 400px;
            right: 100px;
        }
        span{
            position: relative;
            display: inline-block;
            top: 350px;
            left: 550px;
        }
        #regis{
            position: relative;
            left: 550px;
            top: 350px;
        }

    </style>
</head>
<body >
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
   <!-- <p>If you don't have a account,</p> -->
  <span>If you are not registered already,</span> <a href="View/RegisterView.php" id="regis">Register</a>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./View/js/LoginValidation.js"></script>
</body>
</html>
<?php
// $_SESSION["email"] = $_POST["email"];
?>