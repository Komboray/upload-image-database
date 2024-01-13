<?php


$local = "127.0.0.1";
$username = "root";
$pass = "";
$db_name = "images";
$conn = "images";

$conn = mysqli_connect($local, $username, $pass, $db_name);
if($conn){
   
}else{
    echo "You have a prob ";
}