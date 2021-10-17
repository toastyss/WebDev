<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Product</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<body>
    <?php require_once "website_header.php";
    $_GET;
    require_once "db_functions.php";
    $conn = get_conn();
    $entry = htmlspecialchars($_GET["element"]);
    $item = display_single_product($conn, $entry);
    ?>

    <main class="product-page-container">
        <div class="product-image">
            <img src="https://via.placeholder.com/500.png" alt="">
        </div>

        <div class="product-right-column">

            <div class="product-description">
                <h1><?php echo $item["denomination"] ?></h1>
                <span><?php echo $item["currency"] ?></span>
                <p><?php echo "Quality: ", $item["quality"] ?></p>
                <p><?php echo "In Stock: ", $item["quantity"] ?></p>
                <p><?php echo "Mint Year: ", $item["mint_year"] ?></p>
            </div>

            <div class="product-price">
                <form id="add_to_cart" action="Add_to_cart.php" method="get">
                    <?php
                    echo '<input id="product_id" class="hidden" type="text" name="item" 
                    value="', $entry, '">';
		    echo '<input id="quantity_selector" type="number" name="quantity"',
		    'min="1" value="1"',	    
            	    'max="', $item["quantity"],'">';
                    ?>
                    <span><?php echo "$", $item["price"] ?></span>
                    <input class="submit_btn" type="submit" value="add to cart">
                </form>
            </div>
        </div>
    </main>

