<?php

include "connection.php";

$itemId = $_POST["c"];


$rs = "DELETE FROM wish_list WHERE stock_stock_id = $itemId";
Database::iud($rs);

echo("Success");

?>