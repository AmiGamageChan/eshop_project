<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$user_id = $user["id"];
$product_id = $_POST["id"];

$qty = isset($_POST["qty"]) ? intval($_POST["qty"]) : 0;

// echo($user["username"]);
// echo($user_id);
// echo($product_id);

// Validate quantity
if ($qty <= 0) {
    echo ("Invalid quantity");
    exit();
}

// Fetch stock_id and stock quantity using product_id
$rs = Database::search("SELECT stock.stock_id, stock.qty AS stockQty 
                        FROM product 
                        JOIN stock ON product.id = stock.product_id 
                        WHERE product.id = '$product_id'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
    $stock_id = $d['stock_id'];
    $stockQty = $d['stockQty'];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $user_id . "' AND `stock_stock_id`='" . $stock_id . "'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];
        if ($stockQty >= $newQty) {
            Database::iud("UPDATE `cart` SET `cart_qty` = '" . $newQty . "' WHERE `cart_id` = '" . $d2["cart_id"] . "'");
            echo ("Success");
        } else {
            echo ("Stock exceeded");
        }
    } else {
        if ($stockQty >= $qty) {
            Database::iud("INSERT INTO `cart` (`cart_qty`, `user_id`, `stock_stock_id`) VALUES ('" . $qty . "', '" . $user_id . "', '" . $stock_id . "')");
            echo ("Success");
        } else {
            echo ("Stock exceeded");
        }
    }
} else {
    echo ("No stock");
}
?>
