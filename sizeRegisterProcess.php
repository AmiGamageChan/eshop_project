<?php
include "connection.php";

$sz = $_POST["sz"];

if (empty($sz)) {
    echo ("Please enter the Size name");
} else if (strlen($sz) > 20) {
    echo ("Your Size name should be less than 20 characters");
} else {
    $rs = Database::search("SELECT * FROM `Size` WHERE `size_name` = '" . $sz . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Size name already exists");
    } else {
        Database::iud("INSERT INTO `Size` (`size_name`) VALUES ('" . $sz . "')");
        echo("Success");
    }
}
?>
