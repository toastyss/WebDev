<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Checkout</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<body>
    <?php require_once "website_header.php";

    echo "<p>";
    if($_SESSION["cart_length"] == 0)
    {
        echo "no";
    }
    echo $_SESSION["cart_length"], " items in cart </p>";

    foreach($_SESSION["cart"] as $product)
    {
        echo "<p> item ", $product, "</p>";
    }

    echo '<a href=Add_to_cart.php?item=erase>', 'empty cart </a>';

    ?>

</body>