<?php
require_once "db_functions.php";

$_SESSION;

foreach($_SESSION["cart"] as $product)
{
    process_product($conn, $product["item_name"], $product["order_quantity"]);
}

header("Location: Process_card_details.php")
exit();
?>