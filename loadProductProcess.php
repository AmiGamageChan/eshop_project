<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];
//echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`product_id` ORDER BY `stock`.`stock_id` ASC" ;
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 4;
$rpp = $results_per_page;

$num_of_pages = ($num/$rpp);
