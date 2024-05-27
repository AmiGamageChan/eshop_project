<?php
include "connection.php";

$cat = $_POST["c"];

if (empty($cat)) {
    echo ("Please enter the category name");
} else if (strlen($cat) > 20) {
    echo ("Your category name should be less than 20 characters");
} else {
    $rs = Database::search(("SELECT * FROM `category` WHERE `cat_name` = '".$cat."'"));
    $num = $rs->num_rows;

    if ($num >0) {
        echo ("Your category already exists");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $cat . "')");
        echo("Success");
    }
    
}

?>