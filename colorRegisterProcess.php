<?php

include "connection.php";

$color = $_POST["cl"];

if (empty($color)) {
    echo ("Please enter color name");
} elseif (strlen($color) > 20) {
    echo ("Should be more than 20 characters");
} else {

    // echo("success");

    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $color . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your color name Already exist");
    } else {

        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('" . $color . "')");
        echo ("Success");
    }
}
