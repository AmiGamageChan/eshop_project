<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"];

// echo($fname);

if (empty($fname)) {
    echo("please enter your first Name");
} else if((strlen($fname) > 20)){
    echo("your first name should be less than 20 Characters");
}else if (empty($lname)) {
    echo("please enter your last Name");
} else if((strlen($lname) > 20)){
    echo("your last name should be less than 20 Characters");
}else if (empty($email)) {
    echo("please enter your email");
} else if((strlen($email) > 100)){
    echo("your email should be less than 100 Characters");
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("email not vaild");
} else if((empty($mobile))){
    echo("please enter your mobile ");
}else if((strlen($mobile) != 10)){
    echo("Incorect number");
}elseif(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo("Not valid number");
}elseif (empty($username)) {
    echo("eneter your user name");
}elseif (strlen($username) > 20) {
    echo("user name should be less than 20 character");
}elseif (empty($password)) {
    echo("please enter your passsword");
}elseif (strlen($password) < 5 || strlen($password) > 45) {
    echo("your password must contain 5 - 45 characters");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."' OR `username` = '".$username."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("email or username or mobile already exist");
    }else{

        Database::iud("INSERT INTO `user`
        (`fname`,`lname`,`email`,`mobile`,`username`,`password`,`user_type_id`) VALUES 
        ('".$fname."','".$lname."','".$email."','".$mobile."','".$username."','".$password."','2')");

        echo ("success");
    }

}

?>