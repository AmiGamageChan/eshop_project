<?php

include "connection.php";
$vcode = $_POST['vcode'];
$np = $_POST['np'];
$np2 = $_POST['np2'];

if ($np == $np2) {
    $rs = Database::search("SELECT * FROM `user` WHERE `v_code` = '" . $vcode . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();

        Database::iud("UPDATE `user` SET `password` = '" . $np . "',`v_code` = NULL WHERE `id` ='" . $d['id'] . "'");
        echo ("Success");
    } else {
        echo "User Not Found!";
    }
} else {
    echo "Passwords do not match!";
}
