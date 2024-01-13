<?php
include("connection.php");


if(isset($_POST['submit'])&& isset($_FILES['my_img'])){

    echo "<pre>";
    print_r($_FILES['my_img']);
    echo "</pre>";

    $img_name = $_FILES['my_img']['name'];
    $img_size = $_FILES['my_img']['size'];
    $tmp_name = $_FILES['my_img']['tmp_name'];
    $error = $_FILES['my_img']['error'];

    if($error === 0){
        if($img_size > 125000){
            $em = "Sorry, Your file is too large";
            header("Location: start.php?error=$em");
        }else{  
            echo "Not more than 1mb";
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                //insert into Database
                $sql = "INSERT INTO `images` (image_url) VALUES
                        ('$new_img_name')";
                mysqli_query($conn, $sql);
                header("Location:view.php");
            }
        }
    }else{
        $em = "Unknown error occured!";
        header("Location:start.php?error=$em");
    }


}else{
    header("Location:start.php");
}