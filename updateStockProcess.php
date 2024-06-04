<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

// Validation
if (empty($qty)) {
    echo ("Please Enter quantity");
} else if (!is_numeric($qty)) {
    echo ("Only Numbers can be entered for Quantity");
} else if (strlen($qty) > 10) {
    echo ("Quantity be less than 10 Characters");
} else if (empty($price)){
    echo ("Please enter Unit Price");
} else if (!is_numeric($price)){
    echo ("Only Numbers can be entered for Unit Price");
} else if (strlen($price) > 10){
    echo ("Unit Price should be less than 10 Characters");
} else {
    
    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$productId."' AND `price` = '".$price."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1){
        // Update Query
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id` = '".$d["stock_id"]."'");
        echo("Stock Updated Successfully");

    } else {
        // Insert Query
        Database::iud("INSERT INTO `stock` (`product_id`, `price`, `qty`) VALUES ('".$productId."','".$price."','".$qty."')"
    );
        echo ("Stock Record Added Successfully");
    }
}

?>