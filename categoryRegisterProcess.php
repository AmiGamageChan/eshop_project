<?php

include "connection.php";

$cat = $_POST["c"];

if (empty($cat)) {
    echo ("Please enter category name");
} elseif (strlen($cat) > 20) {
    echo ("Should be more than 20 characters");
} else {

    // echo("success");

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $cat . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Category name is Already exist");
    } else {

        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $cat . "')");
        echo ("Success");
    }
}
