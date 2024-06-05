<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`. `id`");
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

    <body class="quick-font">
        <div class="container mt-3">
            <a href="adminReport.php"><img src="Resources/img/backicon.svg" height="90px" /></a>
        </div>

        <div class="container mt-3" id="printArea">

            <h2 class="text-center">Stock Report</h2>

            <table class="table table-hover mt-5">

                <thead>
                    <tr>
                        <th class="center-vertical">Stock Id</th>
                        <th class="center-vertical">Product Name</th>
                        <th class="center-vertical">Stock qty</th>
                        <th class="center-vertical">unit price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();

                    ?>
                        <tr>
                            <td class="center-vertical"><?php echo $d["stock_id"] ?></td>
                            <td class="center-vertical"><?php echo $d["name"] ?></td>
                            <td class="center-vertical"><?php echo $d["qty"] ?></td>
                            <td class="center-vertical"><?php echo $d["price"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-outline-warning col-2" onclick="printDiv('printArea');">Print</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
    echo (" You are not a valid admin");
}
