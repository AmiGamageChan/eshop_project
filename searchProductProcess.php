<?php

include("connection.php");

$pageno = 1; // Default to page 1
if (isset($_POST["pg"]) && $_POST["pg"] != 0) {
    $pageno = $_POST["pg"];
}

$product = $_POST["p"];

$q = "SELECT * FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = "SELECT * FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
WHERE `product`.`name` LIKE '%$product%'
LIMIT $results_per_page OFFSET $page_results";
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
            <div class="card" style="vw:25%">
                <a href="singleProductView.php?s=<?php echo $d['product_id']; ?>"><img src="<?php echo $d['path']; ?>" class="card-img-top"></a>
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="mb-3">
                        <h5 class="card-title"><?php echo $d['name']; ?></h5>
                        <!-- <p class="card-text"><?php echo $d['id']; ?></p> -->
                        <p class="card-text d-none" id="qty-<?php echo $d['id']; ?>">1</p>
                    </div>
                    <div class="d-flex flex-column mt-auto">
                        <p class="card-text text-center mb-0 mb-3">Rs: <?php echo $d['price']; ?></p>
                        <div class="d-flex justify-content-between mt-auto">
                            <button class="btn btn-outline-primary col-6" onclick="addtoCartIndex(<?php echo $d['id']; ?>);">Add to Cart</button>
                            <button class="btn btn-outline-warning col-6 ms-2" id="payhere-payment" onclick="buyNow(<?php echo $d['stock_id']; ?>);">Buy Now</button>
                        </div>
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
                                                            ?> onclick="searchProduct(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="searchProduct(<?php echo ($y); ?>);"><?php echo ($y); ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="searchProduct(<?php echo ($y); ?>);"><?php echo ($y); ?></a></li>
                <?php
                    }
                }
                ?>

                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="searchProduct(<?php echo ($pageno + 1); ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>
    <!--Pagination-->
<?php
}
?>