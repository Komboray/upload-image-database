<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Using PHP</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items:center;
            flex-direction:column;
            min-height:100vh;
        }
    </style>
</head>
<body>
    <?php if(isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <form action="upload.php" method = "POST" enctype = "multipart/form-data">
        <input type="file" name="my_img" id="">

        <input type="submit" name = "submit" value = "Upload">

    </form>
</body>
</html>