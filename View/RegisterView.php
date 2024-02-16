<?php
    require_once "../Controller/RegisterController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#b0c4de;
        }
         table {
            position: relative;
            top: 250px;
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            background-color: rgba(58, 54, 54, 0.5);
            border-radius: 20px;
        }

        th, td {
            padding: 10px;
            border: 0px solid lightslategray;
            text-align: left;
        }
        #mybutton{
            position: relative;
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            left: 300px;
        }
        #back{
            position: relative;
            color: black;
            top: -260px;
        }
    </style>
</head>
<body>
<form action="" method="post" id="loginform">
        <table>
            <tr>
                <th>Username</th>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
            <th>Email ID</th>
            <td><input type="email" name="email" id="email" required>
            <small id="small"></small></td>
            </tr>
            <tr>
            <th>Mobile No.</th>
            <td><input type="tel" name="mobile" required id="mobile"></td>
            </tr>
            <tr>
            <th>Password</th>
            <td><input type="text" name="password" id="pass" required>
                    <small id="passError">password must be 8-20 letters long</small>
            </td>
            </tr>
            <tr>
            <th>Country</th>
            <td>
            <select name="country" required>
                        <option value="" disabled selected>Select a country</option>
                        <option value="usa">USA</option>
                        <option value="canada">Canada</option>
                        <option value="uk">UK</option>
                        <option value="India">India</option>
                        <option value="Scotland">Scotland</option>
                    </select>
            </td>
            </tr>
            <!-- <tr>
                <th>Image</th>
                <td><input type="file" name="image"></td>
            </tr> -->
            <tr>
                <td colspan="2"><button id="mybutton" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    <a href="/MvcDemo/" id="back">back</a>
</body>
</html>
