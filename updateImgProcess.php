<?php

include "connection.php";

$id = $_POST["id"];

if(isset($_FILES["image"])){
    $image = $_FILES["image"];

    $path ="Resources/userImg/" . uniqid() . ".png";
    move_uploaded_file($image["tmp_name"], $path);

    $rs= Database::search("SELECT * FROM `user` WHERE `id`='".$id."'");
    $num=$rs->num_rows;

    if($num>0){

        Database::iud("UPDATE `user` SET `img_path` = '$path' 
        WHERE `id` = '".$id."'");

        echo("Success");

    }else{

        echo("Image upload failed");
        
    }
}