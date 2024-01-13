<?php  include('connection.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Images from database</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items:center;
            flex-direction:column;
            min-height:100vh;
        }
        .alb{
            width: 200px;
            height: 200px;
            padding: 5px;
        }
        a{
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
    <a href="start.php">&#8592;</a>
    <?php
    $sql = "SELECT * FROM `images` ORDER BY `id` DESC";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0){ 
        while($images = mysqli_fetch_assoc()){  ?>

            <div class="alb">
              <img src="uploads/<?=$images['image_url']?>">
            </div>
            

        <?php }
    }?>
</body>
</html>