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
    <?php 
    require_once "website_header.php";
    require_once "db_functions.php";



    echo "<p>";
    if($_SESSION["cart_length"] == 0)
    {
        echo "no";
    }
    echo $_SESSION["cart_length"], " items in cart </p>";
    echo '<h1> Shopping cart </h1>', "\n";

	echo "\t\t\t", '<table id="shopping_cart_table">', "\n";
    foreach($header as $label)
    {
        echo "\t\t\t\t\t", '<th>', $label, "</th>", "\n";
    }
    foreach($_SESSION["cart"] as $product)
    {
        $conn = get_conn();
        $entry = htmlspecialchars($product);

        echo "\t\t\t\t", '<tr>', "\n";
        $item = display_single_product($conn, $entry);

        foreach($item as $value)
        {
            echo "\t\t\t\t\t", '<td>', $value, "</td>", "\n";
        }
        echo "\t\t\t\t", '</tr>', "\n";
    }
    echo "\t\t\t", "</table>", "\n";

    ?>

    <form id="add_to_cart" action="Add_to_cart.php" method="get">
        <?php
            echo '<input id="product_id" class="hidden" type="text" name="item" 
            value="erase">'; 
        ?>
        <input id="submit_btn" type="submit" value="empty cart">
    </form>

</body>