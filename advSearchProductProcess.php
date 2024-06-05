<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["co"];
$cat = $_POST["cat"];
$brand = $_POST["b"];
$size = $_POST["s"];
$min = $_POST["min"];
$max = $_POST["max"];
// echo($cat);

$status = 0; //No Condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno  = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` INNER JOIN `brand` 
ON `product`.`brand_id`=`brand`.`brand_id` INNER JOIN`category` 
ON `product`.`category_id`=`category`.`cat_id` INNER JOIN `color` 
ON `product`.`color_color_id`=`color`.`color_id` INNER JOIN`size` 
ON `product`.`size_size_id`=`size`.`size_id`";

// Search By Color
if ($status == 0 && $color != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `color`.`color_id` = '" . $color . "'";
    $status = 1;
} elseif ($status != 0 && $color != 0) {
    //2nd time search by color (AND)
    $q .= " AND `color`.`color_id` = '" . $color . "'";
}


// Search By Category
if ($status == 0 && $cat != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `category`.`cat_id` = '" . $cat . "'";
    $status = 1;
} elseif ($status != 0 && $cat != 0) {
    //2nd time search by color (AND)
    $q .= " AND `category`.`cat_id` = '" . $cat . "'";
}


// Search By Brand
if ($status == 0 && $brand != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `brand`.`brand_id` = '" . $brand . "'";
    $status = 1;
} elseif ($status != 0 && $brand != 0) {
    //2nd time search by color (AND)
    $q .= " AND `brand`.`brand_id` = '" . $brand . "'";
}

// Search By Size
if ($status == 0 && $size != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `size`.`size_id` = '" . $size . "'";
    $status = 1;
} elseif ($status != 0 && $size != 0) {
    //2nd time search by color (AND)
    $q .= " AND `size`.`size_id` = '" . $size . "'";
}

// Search By Min Price
if (!empty($min) && empty($max)) {
    if ($status == 0) {
        // 1st time search by color (WHERE)
        $q .= " WHERE `stock`.`price` >= '" . $min . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        //2nd time search by color (AND)
        $q .= " AND `stock`.`price` >= '" . $min . "' ORDER BY `stock`.`price` ASC";
    }
}

// Search By Max Price
if (empty($min) && !empty($max)) {
    if ($status == 0) {
        // 1st time search by color (WHERE)
        $q .= " WHERE `stock`.`price` <= '" . $max . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        //2nd time search by color (AND)
        $q .= " AND `stock`.`price` <= '" . $max . "' ORDER BY `stock`.`price` ASC";
    }
}

// Search By Price Range
if (!empty($min) && !empty($max)) {
    if ($status == 0) {
        // 1st time search by color (WHERE)
        $q .= " WHERE `stock`.`price` BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        //2nd time search by color (AND)
        $q .= " AND `stock`.`price` BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY `stock`.`price` ASC";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    // Search no Result
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No Result</h5>
        <p>We're Sorry, We cannot find any matches for your search term.</p>
    </div>
    <?php
} else {

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

    ?>
        <!-- card -->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 250px;">
                <a href="singleProductView.php?s=<?php echo $d["stock_id"]; ?>">
                    <img src="<?php echo $d["path"]; ?>" class="card-img-top" />
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"]; ?></h5>
                    <p class="card-text"><?php echo $d["description"]; ?></p>
                    <p class="card-text">Rs.<?php echo $d["price"]; ?></p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary col-6">Add to Cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
    <?php
    }
    ?>

    <!-- pagination -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>
                <?php

                for ($y = 1; $y <= $num_of_pages; $y++) {

                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y; ?>);"><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y; ?>);"><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }
                ?>

                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno + 1); ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>
    <!-- pagination -->

<?php
}


?>