<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM `product` INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
    INNER JOIN `color` ON `product`.`color_id`= `color`.`color_id`
    INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
    INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` ORDER BY `product`.`id` ASC");

    $num = $rs->num_rows;
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>Product Report</title>
    </head>

    <body>


        <div class="container mt-3">
            <div>
                <a class="img-fluid" href="adminReport.php"><img src="Resources/img/backicon.svg" height="100px" /></a>
                <h2 class="text-center">Product Report</h2>
            </div>


            <table class="table table-hover mt-5">

                <thead>
                    <tr>
                        <th class="center-vertical">Product Id</th>
                        <th class="center-vertical">Product Name</th>
                        <th class="center-vertical">Brand Name</th>
                        <th class="center-vertical">Category</th>
                        <th class="center-vertical">Color</th>
                        <th class="center-vertical">Size</th>
                        <th class="center-vertical">Description</th>
                        <th class="center-vertical">Image</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();

                    ?>
                        <tr>
                            <td class="center-vertical"><?php echo $d["id"] ?></td>
                            <td class="center-vertical"><?php echo $d["name"] ?></td>
                            <td class="center-vertical"><?php echo $d["brand_name"] ?></td>
                            <td class="center-vertical"><?php echo $d["cat_name"] ?></td>
                            <td class="center-vertical"><?php echo $d["color_name"] ?></td>
                            <td class="center-vertical"><?php echo $d["size_name"] ?></td>
                            <td class="center-vertical"><?php echo $d["description"] ?></td>
                            <td class="center-vertical"><img src="<?php echo $d["path"] ?>" height="80vh"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>

    </body>

    </html>

<?php
} else {
    echo ("You are not a valid admin");
}
?>