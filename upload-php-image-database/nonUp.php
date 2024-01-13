<?php
//in this php code, we are uploading files to the upload folder when a user has already chosen it from his files
if(isset($_POST['submit'])){
    //get the info of the file

    $file = $_FILES['file'];

    //we are extracting the info of the file
    $fileName = $_FILES['file']['name'];
    
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    //we are getting the file extension
    //below the explode function gets the name of the file then gets the extension
    $fileExt = explode(".", $fileName);
    //below we are making everything into lowercase
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    //below we are checking whether the below
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 500000){
                //we are now uploading the file
                $fileNameNew = uniqid('', true).".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                header("Location:index.php?uploadsuccess");
            }else{
                echo "Your file is too big";
            }
        }else{
            echo "There was an error uploading your file!";
        }
    }else{
        echo "You cannot upload files of this type!";
    }

}