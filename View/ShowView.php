<?php
    require_once "../Controller/ShowController.php";
    // session_start();
    $result = $showControl->showHome();
    if (isset($_SESSION["msg"])) {
        $message = $_SESSION["msg"];
        echo $message;
    } else {
        echo "";
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
            width: 50%;
            margin: auto;
            border-collapse: collapse;
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
<input id="myInput" type="text" placeholder="Search.."><br>
<a href="./HomeView.php" id="back">back</a>
<form action="" method="post">
    <table>
        <thead>
            <tr>
            <th>Si No.</th>
            <th>Username</th>
            <th>Email Id</th>
            <th>Mobile No.</th>
            <th>Department</th>
            <th>Status</th>
            <th>Image</th>
            <th></th>
            </tr>
        </thead>
        <tbody id="mytable">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email_id"]; ?></td>
                    <td><?php echo $row["mobile_no"]; ?></td>
                    <td><?php echo $row["department"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td>
                        <div class="div1"> <img src="../images/<?php echo $row["image_url"]; ?>" alt="<?php echo $row["image_url"]; ?>"></div>
                    </td>
                    <td>
                    <button id="delbutton" type="submit" name="delete"><a href="../Controller/HomeController.php?id=<?php echo $row["id"]; ?>&status=D">DELETE</a></button>
                    </td>
                    <td><button id="editbutton" type="submit" name="edit"><a href="../View/EditView.php?uid=<?php echo $row["id"]; ?>">EDIT</a></button></td>
                </tr>
                <?php
                    }
                    }
                ?>
        </tbody>
    </table>
  </form>
 

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./js/ShowValidations.js"></script>
    <script>
         $('#delbutton').click(function(e){
        e.preventDefault();

        var id =<?php echo $row["id"]; ?>
        console.log(id);

        $.ajax({
            type: "POST",
            url : "../Controller/ShowController.php",
            data: {id: id, action: "delete"},
            
        })
    })
    </script>
</body>
</html>