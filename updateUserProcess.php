<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];

$email = $_POST["e"];
$mobile = $_POST["m"];
$password = $_POST["p"];
$username = $_POST["u"];
$no = $_POST["no"];
$line_1 = $_POST["l1"];
$line_2 = $_POST["l2"];
$id = $_POST["id"];

$rs = Database::search ("SELECT * FROM `user` WHERE id = '" . $id . "'");
$d = $rs->num_rows;

if ($d>0) {
    $query = Database::iud ("UPDATE `user` 
    SET `email` = '" . $email . "', `mobile` = '" . $mobile . "', `password` = '" . $password . "', `username` = '" . $username . "', `no` = '" . $no . "', `line_1` = '" . $line_1 . "', `line_2` = '" . $line_2 . "' 
    WHERE `id` = '" . $id . "'");
    echo("Success");
} else {
    echo("Failed");
}
