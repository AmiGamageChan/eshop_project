<?php

include "connection.php";

$pname=$_POST["p"];
$brand=$_POST["b"];
$cat=$_POST["ca"];
$size=$_POST["s"];
$color=$_POST["co"];
$desc=$_POST["d"]; 

if(empty($pname)){

    echo("Please enter the product name");

}else if($brand == "0"){

    echo("Please select a brand");

}else if($cat=="0"){

    echo("please select a category");

}else if($size=="0"){

    echo("Please select a size");

}else if($color=="0"){

    echo("Please select a color");

}else if(empty($desc)){

    echo("Please enter the description");

}else{

    if(isset($_FILES["image"])){
        $image = $_FILES["image"];

        $path ="Resources/ProductImg/" . uniqid() . ".png";
        move_uploaded_file($image["tmp_name"], $path);

        $rs= Database::search("SELECT * FROM `product` WHERE `name`='$pname'");

        $num=$rs->num_rows;

        if($num>0){

            echo("product already registered");

        }else{

            Database::iud("INSERT INTO `product`(`name`,`description`,`path`,`brand_id`,`category_id`,`color_id`,`size_id`)
            VALUES('$pname','$desc','$path','$brand','$cat','$color','$size')");

            echo("Success");
            
        }
    }else{
        echo("Please select a product image");
    }

}


?>