<?php

session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

// 

if (empty($username)) {
    echo ("please enter Username...");
} else if (empty($password)) {
    echo ("Please enter your password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        if ($d["status"] == 1) {
            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {
                //set cookie

                setcookie("username",$username,time()+(60*60*24*365));
                setcookie("password",$password,time()+(60*60*24*365));


            } else {
                //destroy cokkie
                setcookie("username","",-1);
                setcookie("password","",-1);
            }
            

        } else {
            echo ("Inactive user");
        }
    } else {
        echo ("invalid username or password");
    }
}
