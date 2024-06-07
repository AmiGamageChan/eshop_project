<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$id = $_POST['id'];

// 1 Cart & Wishlist
$rs = Database::search("DELETE FROM `cart` WHERE `user_id` = '" . $id . "'");
$rs2 = Database::search("DELETE FROM `wish_list` WHERE `user_id` = '" . $id . "'");
if ($rs && $rs2) {
    // 2 User
    $rs3 = Database::search("DELETE FROM `user` WHERE `id` = '" . $id . "'");
    if ($rs3) {
        echo "Success";
    } else {
        echo "Failed to delete user";
    }
} else {
    echo "Failed to delete from cart";
}

?>
