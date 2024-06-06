<?php
session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Fashion Haven - Order History</title>
    </head>

    <body class="quick-font">
        <!--Nav bar -->
        <?php include "NavBar.php"; ?>
        <!--Nav bar -->

        <div class="container mt-5">

            <div class="row">

                <?php

                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                ?>
                    <h2 class="mt-4 mb-3">Order History<span class="text-info"></span></h2>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <!--Order history card-->

                        <div class="mt-3 p-3 border border-3 rounded-3 bg-body-tertiary shadowbox">
                            <div>
                                <h5 class="text-info">Order ID: <span class="text-warning"><?php echo ($d["order_id"]) ?></span></h5>
                            </div>

                            <table class="table table-hover mt-5">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $rs2 = Database::search("SELECT * FROM `order_item`
                                    INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id`
                                    INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
                                    WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");
                                    $num2 = $rs2->num_rows;

                                    for ($j = 0; $j < $num2; $j++) { // Use a different loop variable
                                        $d2 = $rs2->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td><?php echo $d2["name"] ?></td>
                                            <td><?php echo $d2["oi_qty"] ?></td>
                                            <td><?php echo $d2["price"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="mt-1 d-flex flex-column align-items-end pe-5 mt-2">
                            <h6>Delivery Fee:<span class="text-muted">500</span></h6>
                            <h4>Net Total: <span class="text-warning"><?php echo $d["amount"]; ?></span></h4>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="container d-flex justify-content-center align-items-center vh-100">
                        <div class="col-12 text-center">
                            <img src="Resources/img/sad.svg" alt="Empty Cart" class="img-fluid w-50 mb-4">
                            <h2>You have not placed any orders yet!</h2>
                            <a href="index.php" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>

                <?php
                }

                ?>
            </div>
        </div>

        <!--Footer-->
        <div class="col-12 mt-3">
            <p class="text-center fixed-bottom">&copy; 2024 Fashion Haven || All Right Reserved </p>
        </div>
        <!--Footer-->
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

<?php
}
?>