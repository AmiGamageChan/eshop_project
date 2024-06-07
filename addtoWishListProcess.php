<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$user_id = $user["id"];
$stock_id = $_POST["s"];

$rs = Database::search("SELECT * FROM stock WHERE stock_id = '$stock_id'");
if ($rs->num_rows > 0) {
    $product_id = $rs->fetch_assoc()['product_id'];

    $rs = Database::search("SELECT * FROM product
INNER JOIN stock ON product.id = stock.product_id
WHERE product.id = '$product_id';");
    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        $stockQty = $row['qty'];

        if ($stockQty > 0) {
            // Check if the product is already in the wishlist
            $wishlist_check = Database::search("SELECT * FROM wish_list WHERE user_id = '$user_id' AND stock_stock_id = '$stock_id'");
            if ($wishlist_check->num_rows > 0) {
                echo "This item is already in the wishlist.";
            } else {
                $query = "INSERT INTO wish_list (user_id, stock_stock_id) VALUES ('$user_id', '$stock_id')";
                $success = Database::iud($query);
                echo "Success";
            }
        } else {
            echo "Error: Product is out of stock.";
        }
    } else {
        echo "Error: Product does not exist.";
    }
} else {
    echo "Error: Stock ID does not exist.";
}
