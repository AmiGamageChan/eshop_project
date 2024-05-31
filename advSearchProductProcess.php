<?php

include "connection.php";

$product = $_POST["p"];
$brand = $_POST["b"];
$size = $_POST["s"];
$minPrice = $_POST["min"];
$MaxPrice = $_POST["max"];

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`";

//Search by Color
if ($status == 0 && $color != 0) {
    $q .= "WHERE `color`.`color_id` = '" . $color . "'";
} elseif ($status != 0 && $color != 0) {
    $q .= "AND `color`.`color_id` = '" . $color . "'";
}

//Search by Cat
if ($status == 0 && $cat != 0) {
    $q .= "WHERE `brand`.`brand_id` = '" . $brand . "'";
} elseif ($status != 0 && $cat != 0) {
    $q .= "AND `brand`.`brand_id` = '" . $brand . "'";
}

//Search by Size
if ($status == 0 && $size != 0) {
    $q .= "WHERE `size`.`size_id` = '" . $size . "'";
} elseif ($status != 0 && $cat != 0) {
    $q .= "AND `size`.`size_id` = '" . $size . "'";
}

//Search by Min Price
if (!empty($minPrice) && empty($maxPrice)) {
    $q .= "WHERE `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
} elseif ($status != 0) {
    $q .= "AND `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
}

//Search by Min Price
if (empty($minPrice) && !empty($maxPrice)) {
    $q .= "WHERE `stock`.`price` >= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
} elseif ($status != 0 && $cat != 0) {
    $q .= "AND `stock`.`price` >= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
}

//Search by Price range
if (empty($minPrice) && !empty($maxPrice)) {
    $q .= "WHERE `stock`.`price` >= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
} elseif ($status != 0 && $cat != 0) {
    $q .= "AND `stock`.`price` >= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
}

$rs = Database::search($q);
$rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . "LIMIT $results_page_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
?>
    <div class="d-flex flex-column justify-content-center mt-5">
        <h5>Search No Result</h5>
        <p>We couldn't find anything</p>
    </div>
    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>
        <!--Card Loading-->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px;">
                <img class="card-img-top" src="<?php echo $d["path"]; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"]; ?></h5>
                    <p class="card-text"><?php echo $d["description"]; ?></p>
                    <p class="card-text"><?php echo $d["price"]; ?></p>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-outline-primary col-6">Add to Cart</a>
                        <a href="#" class="btn btn-outline-warning col-6 ms-2">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Card Loading-->
    <?php
    }
    ?>
    <!--Pagination-->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="advSearchProduct(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                                        }
                                                                                                                            ?>>Previous</a></li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="advSearchProduct(<?php echo ($y); ?>);"><?php echo ($y); ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="advSearchProduct(<?php echo ($y); ?>);"><?php echo ($y); ?></a></li>
                <?php
                    }
                }
                ?>

                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="advSearchProduct(<?php echo ($pageno + 1); ?>);" <?php                                                                                                                      }                                                                                                                          ?>>Next</a></li>
            </ul>
        </nav>
    </div>
    <!--Pagination-->
<?php
}
