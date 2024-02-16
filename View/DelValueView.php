<?php
    require_once "../Controller/HomeController.php";

    $result = $homeControl->ShowDelValues();
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
            left: 300px;
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            position: fixed;
            /* background-color: lightblue; */
            background-color: rgba(58, 54, 54, 0.5);
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
            font-weight: bold;
        }
        #delbutton, #editbutton{
            background-color: blue;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        a{
            color: white;
        }
        #back{
            color: black;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <table>
        <thead>
            <tr>
            <th>Si No.</th>
            <th>Username</th>
            <th>Email Id</th>
            <th>Mobile No.</th>
            <th>Country</th>
            <th>Status</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email_id"]; ?></td>
                    <td><?php echo $row["mobile_no"]; ?></td>
                    <td><?php echo $row["country"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td>
                    <button id="delbutton" type="submit" name="delete"><a href="../Controller/HomeController.php?id=<?php echo $row["id"]; ?>">Activate</a></button>
                    </td>
                </tr>
                <?php
                    }
                    }
                ?>
        </tbody>
    </table>
  </form>
  <a href="./HomeView.php" id="back">back</a>
</body>
</html>