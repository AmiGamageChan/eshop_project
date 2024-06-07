<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `wish_list`
INNER JOIN `stock` ON `wish_list`.`stock_stock_id` = `stock`.`stock_id`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
WHERE `wish_list`.`user_id` = '" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //Load Wishlist

?>
    <div class="mb-4 mt-5">
        <h3>Wish List</h3>
    </div>

    <?php
    //number of items
    $number = 0;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

    ?>
        <!-- Card Items -->
        <div class="col-12 border border-3 rounded-5 p-3 mb-3 d-flex justify-content-between shadowbox">
    <div class="d-flex align-items-center col-5">
    <a href="singleProductView.php?s=<?php echo $d['product_id']; ?>"><img src="<?php echo $d["path"]; ?>" class="rounded-4" width="200px"></a>
        <div class="ms-5">
            <h4><?php echo $d["name"]; ?></h4>
            <p class="text-muted mb-0 mt-3">
                Color: <?php echo $d["color_name"]; ?> |
                Size: <?php echo $d["size_name"]; ?> |
                Price: Rs. <?php echo $d["price"]; ?>
            </p>
        </div>
    </div>
    <div class="d-flex align-items-center">
        <button class="btn btn-danger" onclick="removeWishlist(<?php echo $d['product_id']; ?>);">X</button>
    </div>
</div>


        <!-- Card Items -->
    <?php
    }
    ?>

    <div class="col-12 mt-4">
        <hr>
    </div>
<?php

} else {

?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 text-center">
            <img src="Resources/img/sad.svg" alt="Empty Cart" class="img-fluid w-50 mb-4">
            <h2>Your Wishlist is Empty!</h2>
            <a href="index.php" class="btn btn-primary">Try adding Things You Like Here</a>
        </div>
    </div>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <?php

    
}
