<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`. `product_id`");
    $num = $rs->num_rows;


?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>Stock Report</title>
    </head>

    <body>
        <div class="container mt-3">
            <a href="adminReport.php"><img src="Resources/img/backicon.png" height="25" /></a>
        </div>

        <div class="container mt-3">

            <h2 class="text-center">Stock Report</h2>

            <table class="table table-hover mt-5">

                <thead>
                    <tr>
                        <th>Stock Id</th>
                        <th>Product Name</th>
                        <th>Stock qty</th>
                        <th>unit price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();

                    ?>
                        <tr>
                            <td><?php echo $d["stock_id"] ?></td>
                            <td><?php echo $d["name"] ?></td>
                            <td><?php echo $d["qty"] ?></td>
                            <td><?php echo $d["price"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-outline-warning col-2" onclick="window.print();">Print </button>
        </div>

    </body>

    </html>

<?php

} else {
    echo (" You are not a valid admin");
}
