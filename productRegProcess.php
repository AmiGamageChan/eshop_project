<?php
include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$size = $_POST["size"];
$color = $_POST["color"];
$desc = $_POST["desc"];
$image = $_FILES["image"];

if (empty($pname)) {
    echo ("Please enter product name");
} else if ($brand == '0') {
    echo ("Please select a brand");
} else if ($cat == '0') {
    echo ("Please select a category");
} else if ($size == '0') {
    echo ("Please select a size");
} else if ($color == '0') {
    echo ("Please select a color");
} else if (empty($desc)) {
    echo ("Please enter the description");
} else {
    if (isset($_FILES["image"])) {

        $image = $_FILES["image"];
        $path = "Resources/ProductImg/" . uniqid() . "." . $image["type"];
        move_uploaded_file($image["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '$pname'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo ("Product has been already added");
        } else {
            Database::iud("INSERT INTO `product` (`name`,`description`,`path`,brand_id`,`color_id`,`category_id`,`size_id`) VALUES ('$pname','$desc','$path','$brand','$color','$cat','$size')");
        }
    } else {
        echo ("Please select a product image");
    }
}
