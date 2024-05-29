<?php

include "connection.php";

$size = $_POST["sz"];

if (empty($size)) {
    echo("Please enter Size");
} elseif(strlen($size ) > 20) {
    echo("Should be more than 20 characters");
}else{
 
    // echo("success");

$rs = Database::search("SELECT * FROM `size` WHERE `size_name` = '".$size."'");
$num = $rs->num_rows;

if ($num > 0) {
    echo ("Your Size name is Already exist");
} else {

    Database::iud("INSERT INTO `size` (`size_name`) VALUES ('".$size."')");
    echo("Success");
}


}


?>