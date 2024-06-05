<?php

include "connection.php";

$pageno = 1; // Default page number
if (isset($_POST["p"])) {
    $page = $_POST["p"];
    if (is_numeric($page) && $page > 0) {
        $pageno = $page;
    }
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 4;
$num_of_pages = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = "SELECT * FROM `stock`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
ORDER BY `stock`.`stock_id` ASC
LIMIT $results_per_page OFFSET $page_results;";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    // Not available stock
    echo ("No Product Here...");
} else {
    // Load Stock
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
?>
        <!--Card Loading-->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="vw:25%">
                <a href="singleProductView.php?s=<?php echo $d['product_id']; ?>"><img src="<?php echo $d['path']; ?>" class="card-img-top"></a>
                <div class="card-body d-flex flex-column justify-content-between text-center">
                    <div class="mb-3">
                        <h5 class="card-title"><?php echo $d['name']; ?></h5>
                        <p class="card-text"><?php echo $d['description']; ?></p>
                        <p class="card-text"><?php echo $d['price']; ?></p>
                        <!-- <p class="card-text"><?php echo $d['id']; ?></p> -->
                        <p class="card-text d-none" id="qty-<?php echo $d['id']; ?>">1</p>
                    </div>
                    <div class="d-flex justify-content-between mt-auto">
                        <button class="btn btn-outline-primary col-6" onclick="addtoCartIndex(<?php echo $d['id']; ?>);">Add to Cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2" id="payhere-payment" onclick="buyNow(<?php echo $d['stock_id']; ?>);">Buy Now</button>
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
                <li class="page-item"><a class="page-link flex-column" <?php if ($pageno <= 1) {
                                                                echo "href='#'";
                                                            } else { ?> onclick="loadProduct(<?php echo ($pageno - 1); ?>);" <?php } ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="loadProduct(<?php echo ($y); ?>);"><?php echo ($y); ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="loadProduct(<?php echo ($y); ?>);"><?php echo ($y); ?></a></li>
                <?php
                    }
                }
                ?>

                <li class="page-item"><a class="page-link" <?php if ($pageno >= $num_of_pages) {
                                                                echo "href='#'";
                                                            } else { ?> onclick="loadProduct(<?php echo ($pageno + 1); ?>);" <?php } ?>>Next</a></li>
            </ul>
        </nav>
    </div>
    <!--Pagination-->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<?php
}
?>