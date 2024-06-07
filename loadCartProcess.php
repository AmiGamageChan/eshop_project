<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart`
INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
WHERE `cart`.`user_id` = '" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //Load Cart

?>
    <div class="mb-4 mt-5">
        <h3>Shopping Cart</h3>
    </div>

    <?php
    //number of items
    $number = 0;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;
        $number += $d["cart_qty"];

    ?>
        <!-- Card Items -->
        <div class="col-12 border border-3 rounded-5 p-3 mb-3 d-flex justify-content-between shadowbox">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo $d["path"]; ?>" class="rounded-4" width="200px">
                <div class="ms-5">
                    <h4><?php echo $d["name"]; ?></h4>
                    <p class="text-muted mb-0 mt-3">Color: <?php echo $d["color_name"]; ?></p>
                    <p class="text-muted">Size: <?php echo $d["size_name"]; ?></p>
                    <h5 class="text-warning">Rs. <?php echo $d["price"]; ?></h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty(<?php echo $d['cart_id']; ?>);">-</button>
                <input type="number" id="qty<?php echo $d['cart_id']; ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" disabled value="<?php echo $d["cart_qty"]; ?>">
                <button class="btn btn-light btn-sm" onclick="incrementCartQty(<?php echo $d['cart_id']; ?>);">+</button>
            </div>
            <div class="d-flex align-items-center">
                <h4>Total: <span class="text-warning">Rs. <?php echo $total; ?></span></h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-danger" onclick="removeCart(<?php echo $d['cart_id']; ?>);">X</button>
            </div>
        </div>
        <!-- Card Items -->
    <?php
    }
    ?>

    <div class="col-12 mt-4">
        <hr>
    </div>

    <!-- Checkouts -->
    <div class="d-flex flex-column align-items-end">
        <h6>Number of Items: <span class="text-info"><?php echo $number ?></span></h6>
        <h5>Delivary Fee: <span class="text-muted">Rs.500</span></h5>
        <h3>Net Total: <span class="text-warning">Rs.<?php echo ($netTotal + 500); ?></span></h3>
        <button class="btn btn-success col-3 mt-3 mb-4" id="payhere-payment" onclick="checkOut();">Checkout</button>
    </div>
    <!-- Checkouts -->
<?php

} else {

?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 text-center">
            <img src="Resources/img/sad.svg" alt="Empty Cart" class="img-fluid w-50 mb-4">
            <h2>Your Cart is Empty!</h2>
            <a href="index.php" class="btn btn-primary">Start Shopping</a>
        </div>
    </div>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <?php

    
}
