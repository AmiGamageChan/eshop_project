<?php

include "connection.php";

$uid = $_POST["u"];

// echo($uid);

if (empty($uid)) {
    echo ("please Enter your UserId");
} else {
    // echo("success");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $uid . "' AND `user_type_id` = '2' ");
    $num = $rs->num_rows;
    // echo($num);

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {

            Database::iud("UPDATE `user` SET `status` = '0' WHERE `id` = '" . $uid . "'");
            //set Deactive
            echo ("Deactive");
        }

        if ($d["status"] == 0) {

            Database::iud("UPDATE `user` SET `status` = '1' WHERE `id` = '" . $uid . "'");
            //set Active
            echo ("Active");
        }
    } else {
        echo ("invalid User Id");
    }
}
