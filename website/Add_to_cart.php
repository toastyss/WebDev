<?php
session_start();
$_GET;

require "Empty_cart.php";

if($_GET["item"] == "erase")
{
    emptyCart();
    header("Location: Checkout.php");
    exit();
}

if(!isset($_SESSION["cart_length"]))
{
    $_SESSION["cart_length"] = 0;
}
$length = $_SESSION["cart_length"];

$_SESSION["cart"][$length]["item_name"] =  $_GET["item"];
$_SESSION["cart"][$length]["order_quantity"] =  $_GET["quantity"];
$_SESSION["cart_length"] += 1;

header("Location: Checkout.php");
exit();

require_once "footer.php";
?>