<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$id = $_POST['id'];

$rs = Database::search("DELETE FROM `user` WHERE `id` = '" . $id . "'");
if ($rs) {
    echo "Success";
} else {
    echo "User ID failed to Validate";
}


