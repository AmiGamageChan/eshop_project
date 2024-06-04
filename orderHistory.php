<?php
session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Online Store - Order History</title>
    </head>

    <body>
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

                        <div class="mt-3 p-3 border border-3 rounded-3 bg-body-tertiary">
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
                        <div class="mt-1 d-flex flex-column align-items-end pe-5">
                            <h6>Delivery Fee:<span class="text-muted">500</span></h6>
                            <h4>Net Total: <span class="text-warning"><?php echo $d["amount"]; ?></span></h4>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-12 text-center mt-5">
                        <h2>You have not placed any orders yet!</h2>
                        <a href="index.php" class="btn btn-primary">Shop Now</a>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    </body>

    </html>

<?php
}
?>
