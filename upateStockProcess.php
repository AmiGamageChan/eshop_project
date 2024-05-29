<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

if (empty($qty)) {
    echo ("Please enter qunntity");
} else if (!is_numeric($qty)) {
    echo ("Only numbers can be use for quantity");
} else if (strlen($qty) > 10) {
    echo ("your qty should be less than 10 characters");
} else if (empty($price)) {
    echo ("Please enter price");
} else if (!is_numeric($price)) {
    echo ("Only numbers can be used");
} else if (strlen($price) > 10) {
    echo ("Your price should be less than 10 characters");
} else {
    // echo ("succes");
    $rs = Database::search("SELECT*FROM `stock` WHERE `product_id` = '" . $productId . "' AND `price` = '" . $price . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        //update query
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock`SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_id"] . "' ");
        echo ("Stock Update Sucessfully");
    } else {

        //insert query
        Database::iud("INSERT INTO `stock`(`price`,`qty`,`product_id`)VALUES('" . $price . "','" . $qty . "' , '" . $productId . "')");
        echo ("New Added Successfully");
    }
}
