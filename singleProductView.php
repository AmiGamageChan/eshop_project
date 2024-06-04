<?php
include "connection.php";
$stockId = $_GET["s"];

if (isset($stockId)) {

    $q = "SELECT * FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` 
INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` 
INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` WHERE `stock`.`stock_id` = '" . $stockId . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!-- navbar -->
    <?php include "navBar.php" ?>
    <!-- navbar -->

        <!-- Card  -->
    <div class="adminBody">
        <div class="col-8 row shadow p-5 bg-body-tertiary rounded-2 m-auto">
            <div class="col-6">
                <img src="<?php echo $d["path"] ?>" width="300px" class="rounded-3 shadow-lg" />
            </div>
            <div class="col-6">
                <h4><?php echo $d["name"] ?></h4>
                <h5>Brand: <?php echo $d["brand_name"] ?></h5>
                <h6>Category: <?php echo  $d["cat_name"] ?></h6>
                <h6>Color: <?php echo  $d["color_name"] ?></h6>
                <h6>Size: <?php echo   $d["size_name"] ?></h6>
                <p>Description: <?php echo  $d["description"] ?></p>
                <div class="row">
                    <div class="col-2">
                        <input type="text" placeholder="Qty" class="qty form-control" id="qty"/>
                    </div>
                    <div class="col-6 mt-2">
                        <h6 class="text-warning">Available Quantity : <?php echo $d["qty"] ?></h6>
                    </div>
                </div>
                <h5 class="mt-3">Price : <?php echo $d["price"] ?></h5>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-warning col-6" onclick="addtoCart(<?php echo $d['stock_id']; ?>);">Add to Cart</button>
                    <button class="btn btn-outline-success col-6 ms-2" id="payhere-payment" onclick="buyNow(<?php echo $d['stock_id']; ?>);">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->

    <!-- footer -->
    <div class="fixed-bottom col-12 mt-3">
        <p class="text-center">&copy; 2024 OnlineStore.lk || All Right Reserved</p>
    </div>
    <!-- footer -->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php

} else {
    header("location: index.php");
}

?>
