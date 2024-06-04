<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$user_id = $user["id"];
$stock_id = $_POST["s"];
$qty = $_POST["q"];

$rs = Database::search("SELECT * FROM `stock` WHERE `stock_id`='" . $stock_id . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
    $stockQty = $d["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $user_id . "' AND `stock_stock_id`='" . $stock_id . "'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];
        if ($stockQty >= $newQty) {
            Database::iud("UPDATE `cart` SET `cart_qty` = '" . $newQty . "' WHERE `cart_id` = '" . $d2["cart_id"] . "'");
            echo ("Cart item updated");
        } else {
            echo ("Stock exceeded");
        }
    } else {
        if ($stockQty >= $qty) {
            Database::iud("INSERT INTO `cart` (`cart_qty`,`user_id`,`stock_stock_id`) VALUES ('" . $qty . "','" . $user_id . "','" . $stock_id . "')");
            echo ("Cart item added successfully");
        } else {
            echo ("Stock exceeded");
        }
    }
} else {
    echo ("No stock");
}

?>
