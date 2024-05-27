<?php
include "connection.php";

$clr = $_POST["cl"];

if (empty($clr)) {
    echo ("Please enter the color");
} else if (strlen($clr) > 20) {
    echo ("Your color should be less than 20 characters");
} else {
    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $clr . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your color name already exists");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('" . $clr . "')");
        echo("Success");
    }
}
?>
