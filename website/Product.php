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

    echo "<h1>product page</h1>";

    $sql = "SELECT * FROM Products WHERE product_id=?";

    $statement = mysqli_stmt_init($conn);
    $statement = mysqli_prepare($conn, $sql);

    echo "<p>", $_GET['element'], "</p>";

    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_GET["element"]));

    if($result = mysqli_query($conn, $sql))
    {
        $row = mysqli_fetch_assoc($result);
        echo "\t\t\t\t", '<ul>', "\n";
        echo "\t\t\t\t\t", '<li>', $row["currency"], "</li>", "\n";
        echo "\t\t\t\t\t", '<li>', $row["denomination"], "</li>", "\n";
        echo "\t\t\t\t\t", '<li>', $row["mint_year"], "</li>", "\n";
        echo "\t\t\t\t", '</ul>', "\n";

        mysqli_free_result($result);
    }
    else
    {
        echo "\t\t\t", "<p> sql query faliure</p>";
    }
    mysqli_close($conn);

    ?>

</body>