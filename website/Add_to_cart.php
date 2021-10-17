<?php
session_start();
$_GET;

if($_GET["item"] == "erase")
{
    $_SESSION["cart_length"] = null;
    $_SESSION["cart"] = null;
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
?>