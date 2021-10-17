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

    echo '<h1> Shopping cart </h1>', "\n";

    $cart_text = "";
    $cart_length = strval($_SESSION["cart_length"]);

    if($_SESSION["cart_length"] >= 1)
    {
        $cart_text = "$cart_length items in cart";
        
        echo "\t\t\t", '<table id="shopping_cart_table">', "\n";
        foreach($header as $label)
        {
            echo "\t\t\t\t\t", '<th>', $label, "</th>", "\n";
        }
        foreach($_SESSION["cart"] as $product)
        {
            $conn = get_conn();
            $entry = htmlspecialchars($product);
	//echo "\t\t\t", '<table id="shopping_cart_table">', "\n";
    //foreach($header as $label)
    {
        //echo "\t\t\t\t\t", '<th>', $label, "</th>", "\n";
    //}

    // echo "<p> product list", $_SESSION["cart"]["item_name"], "</p>";

    // echo "<p>";
    // print_r( $_SESSION["cart"]);
    // echo "</p>";

    //foreach($_SESSION["cart"] as $product)
    //{
        // echo "<p> product";
        // print_r($product);
        // echo "</p>";

        //$conn = get_conn();
        //$entry = htmlspecialchars($product["item_name"]);


            echo "\t\t\t\t", '<tr>', "\n";
            $item = display_single_product($conn, $entry);

            foreach($item as $value)
            {
                echo "\t\t\t\t\t", '<td>', $value, "</td>", "\n";
            }
            echo "\t\t\t\t", '</tr>', "\n";
        }
        echo "\t\t\t", "</table>", "\n";
    }
    else
    {
        $cart_text = "No items in cart";
    }

    echo $cart_text;
    ?>

    <form id="add_to_cart" action="Add_to_cart.php" method="get">
        <?php
            echo '<input id="product_id" class="hidden" type="text" name="item" 
            value="erase">'; 
        ?>
        <input id="submit_btn" type="submit" value="empty cart">
    </form>

</body>