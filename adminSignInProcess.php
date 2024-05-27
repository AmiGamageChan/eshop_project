<?php

session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

// Validate input
if (empty($username)) {
    echo("Please Enter Your Username");
} else if (empty($password)) {
    echo("Please Enter your Password");
} else {
    // Execute the query
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");

    // Check if the query was successful
    if ($rs) {
        $num = $rs->num_rows;

        if ($num == 1) {
            $d = $rs->fetch_assoc();

            if ($d["user_type_id"] == 1) {
                echo("Success");
                $_SESSION["a"] = $d;
            } else {
                echo("You are not an admin");
            }
        } else {
            echo("Invalid Username or Password");
        }
    } else {
        echo("Database query failed");
    }
}
?>
