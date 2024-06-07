<?php

include "connection.php";

$brand = $_POST["b"];

if (empty($brand)) {
    echo ("Please enter brand name");
} elseif (strlen($brand) > 20) {
    echo ("Should be more than 20 characters");
} else {

    // echo("success");

    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $brand . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Brand Name Already exist");
    } else {

        Database::iud("INSERT INTO `brand` (`brand_name`) VALUES ('" . $brand . "')");
        echo ("Success");
    }
}
