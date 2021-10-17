<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Product</title>
    <link rel="stylesheet" href="./Styles/styles.css">
    <script src="./Scripts/Product.js" defer></script>
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
                <h1><?php echo $item["product_name"] ?></h1>
                <span><?php echo $item["currency"] ?></span>
                <p><?php echo "Denomination: ", $item["denomination"] ?></p>
                <p><?php echo "Quality: ", $item["quality"] ?></p>
                <p><?php echo "In Stock: ", $item["quantity"] ?></p>
                <p><?php echo "Mint Year: ", $item["mint_year"] ?></p>
            </div>

            <div class="product-price">
                <form id="add_to_cart" action="Add_to_cart.php" method="get">
                    <a><?php echo "$<span id='price'>", $item["price"], "</span> per item"; ?></a>
                    <?php
                    echo '<input id="product_id" class="hidden" type="text" name="item" 
                        value="', $entry, '"> <br><br>';
                    echo '<span>Quantity:  </span>';
                    echo '<input id="quantity_selector" type="number" name="quantity"',
                    'min="1" value="1"',
                    'max="', $item["quantity"], '">';
                    ?>
                    <p id="total_cost">Total cost: <span id="item_cost"><?php echo $item["price"] ?></span></p>
                    <input class="submit_btn" type="submit" value="Add to Cart">
                </form>
            </div>
        </div>
    </main>