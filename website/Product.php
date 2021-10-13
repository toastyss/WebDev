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
    require_once "dbconn.php";

    // require_once "db_functions";
    // $conn = get_conn();

    echo "<h1>product page</h1>";

    echo "<p>", $_SESSION["test"], "</p>";

    $sql = "SELECT currency, denomination, mint_year 
    FROM Products WHERE product_id=?;";

    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);

    $entry = htmlspecialchars($_GET["element"]);

    mysqli_stmt_bind_param($statement, 's', $entry);

    if(mysqli_stmt_execute($statement))
    {
        $result = mysqli_stmt_get_result($statement);
        if($row = mysqli_fetch_assoc($result))
        {
            echo "\t\t\t\t", '<ul>', "\n";
            echo "\t\t\t\t\t", '<li>', $row["currency"], "</li>", "\n";
            echo "\t\t\t\t\t", '<li>', $row["denomination"], "</li>", "\n";
            echo "\t\t\t\t\t", '<li>', $row["mint_year"], "</li>", "\n";
            echo "\t\t\t\t", '</ul>', "\n";
        }
    }
    else
    {
        echo "\t\t\t", "<p> sql query faliure</p>";
    }
    mysqli_close($conn);

    echo '<a href=Add_to_cart.php?item=', $entry,'>', 'add to cart </a>';

    ?>

</body>
