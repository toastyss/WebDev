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
    $total_cost = 0;

    if($_SESSION["cart_length"] >= 1)
    {
        $cart_text = "$cart_length items in cart";
        
        echo "\t\t\t", '<table id="shopping_cart_table">', "\n";
        foreach($header as $label)
        {
            echo "\t\t\t\t\t", '<th>', $label, "</th>", "\n";
        }
        echo "\t\t\t\t\t", "<th> item cost</th>", "\n";

        foreach($_SESSION["cart"] as $product)
        {
            $conn = get_conn();
            $entry = htmlspecialchars($product["item_name"]);

            echo "\t\t\t\t", '<tr>', "\n";
            $item = display_single_product($conn, $entry);
            $item_cost;

            foreach ($item as $attribute => $value) {
                $item_cost = $item["price"] * $product["order_quantity"];
                if ($attribute == "product_id") {
                    continue;
                }
                echo "\t\t\t\t\t", '<td>';

                if ($attribute == "quantity") {
                    echo $product["order_quantity"];
                } else if ($attribute == "product_image") {
                    echo "\t\t\t\t\t\t", '<a href=Product.php?element=', $item["product_id"], '><img id="search_preview" src="', $value,  '"></a>', "\n";
                } else {
                    echo $value;
                }
                echo "</td>", "\n";
            }
            echo "<td>$item_cost</td>";
            $total_cost += $item_cost;
            echo "\t\t\t\t", '</tr>', "\n";
        }
        echo "\t\t\t", "</table>", "\n";
    }
    else
    {
        $cart_text = "No items in cart";
    }

    echo "<p id=cart_length_text> $cart_text </p>";
    echo '<h1 id="total_cost_text"> Total cost </h2>';

    echo '<p id="total_cost_number">$';
    echo $total_cost, "</p>";


    ?>
    <form id="add_to_cart" action="Add_to_cart.php" method="get">
        <?php
            echo '<input id="product_id" class="hidden" type="text" name="item" 
            value="erase">'; 
        ?>
        <input class="submit_btn" type="submit" value="empty cart">
    </form>

    <h1>Payment Form</h1>
    <form id="purchase_form" action="Process_card_details.php" method="POST">
        
        <input type="text" placeholder="First name" name="firstname" required> 
        <input type="text" placeholder="Last name" name="lastname" required><br>

        <div id="card_details">
            <input type="text" placeholder="Card number" name="cnumber" minlength="16" maxlength="16" required><br>
            <input id="expdate" type="date" name="expdate" required>
            <label id="datelbl" for="expdate">Card Expiry Date</label><br> 
            <input type="text" placeholder="CVC" name="cvc" minlength="3" maxlength="3" required><br>
        </div>
        <br>
        <input class="submit_btn" type="submit" value="Pay now">
    </form>
    <?php
    require_once "footer.php";
    ?>
</body>