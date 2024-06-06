<?php
session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["order_id"];

if (isset($_GET["order_id"])) {
    $orderHistoryId = $_GET["order_id"];
    $rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=SO, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="bootstrap.css">
            <title>Fashion Haven - Invoice</title>
        </head>

        <body>

            <div class="container text-end mt-2">
            <a onclick="printDiv('printArea');" class="btn btn-info">Print</a>
                <a href="index.php" class="btn btn-primary">Home</a>
            </div>

            <div class="container mt-2 mb-4"  >
                <div class="border border-3 border-black p-5 rounded-3" id="printArea">
                    <div class="row" >
                        <div class="col-6">
                            <h4>Name: <?php echo ($user["fname"]) ?></h4>
                            <h5><?php echo ($user['line_1']) ?></h5>
                            <h5><?php echo ($user['line_2']) ?></h5>
                            <h5>Order ID: <?php echo ($d["ohid"]) ?></h5>
                            <h5><?php echo ($d['order_date']) ?></h5>
                        </div>
                        <div class="col-6 text-end">
                            <h1 style="color:blue;">I N V O I C E</h1>
                            <h2>Fashion Haven</h2>
                            <p>271/4, North Circular Road, Kegalle</p>
                            <p>Phone: +94717982214</p>
                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <table class="table table-hover border border-1 border-black">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rs2 = Database::search("SELECT * FROM `order_item`
                                INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id`
                                INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
                                INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
                                INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
                                INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
                                INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
                                WHERE `order_item`.`order_history_ohid` = '" . $orderHistoryId . "'");

                                    $num2 = $rs2->num_rows;

                                    for ($i = 0; $i < $num2; $i++) {
                                        $d2 = $rs2->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td><?php echo ($d2["name"]) ?></td>
                                            <td><?php echo ($d2["brand_name"]) ?></td>
                                            <td><?php echo ($d2["cat_name"]) ?></td>
                                            <td><?php echo ($d2["color_name"]) ?></td>
                                            <td><?php echo ($d2["size_name"]) ?></td>
                                            <td><?php echo ($d2["oi_qty"]) ?></td>
                                            <td>Rs: <?php echo ($d2["price"] * $d2["oi_qty"]) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end mt-5 pe-5">
                            <h6>Number of Items: <?php echo ($d2["oi_qty"]) ?></h6>
                            <h6 class="text-muted">Delivery Charge: Rs: 500.00</h6>
                            <h3>Net Total: Rs: <?php echo ($d["amount"]) ?></h3>

                        </div>
                    </div>
                </div>
            </div>
        </body>

        <script src="script.js"></script>
        </html>

<?php
    } else {
        echo ("Access Denied");
    }
} else {
    echo ("Order ID Not Provided");
}
?>