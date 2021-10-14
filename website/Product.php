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
    //require_once "dbconn.php";

    require_once "db_functions.php";
    $conn = get_conn();

    echo "<h1>product page</h1>";

    $entry = htmlspecialchars($_GET["element"]);
    echo "\t\t\t\t", '<ul>', "\n";
    $item = display_single_product($conn, $entry);
    foreach($item as $value)
    {
        echo "\t\t\t\t\t", '<li>', $value, "</li>", "\n";
    }
    echo "\t\t\t\t", '</ul>', "\n";

    echo '<a href=Add_to_cart.php?item=', $entry,'>', 'add to cart </a>';

    ?>

</body>
