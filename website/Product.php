<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Product</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<body>
    <?php require_once "website_header.php";?>
    
    <?php
    $_GET;
    $row = $_GET["element"];
    echo "\t\t\t\t", '<ul>', "\n";
    echo "\t\t\t\t\t", '<li>', $row["currency"], "</li>", "\n";
    echo "\t\t\t\t\t", '<li>', $row["denomination"], "</li>", "\n";
    echo "\t\t\t\t\t", '<li>', $row["mint_year"], "</li>", "\n";
    echo "\t\t\t\t\t", '<li>', $row["quality"], "</li>", "\n";
    echo "\t\t\t\t\t", '<li>', $row["product_status"], "</li>", "\n";
    echo "\t\t\t\t\t", '<li>', $row["quantity"], "</li>", "\n";
    echo "\t\t\t\t", '</ul>', "\n";
    ?>

</body>