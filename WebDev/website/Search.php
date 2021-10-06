<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Search</title>
    <link rel="stylesheet" href="./Styles/styles.css">
    <link rel="stylesheet" href="./Styles/headerstyle.css">
</head>
<body>

    <?php require_once "website_header.php"; ?>

    <form method="POST" action="">
        <input type="text" placeholder="search">
        <input type="submit" value="GO">
    </form>

    <?php 
    require_once "dbconn.php";

    $sql = "SELECT currency, denomination, mint_year, quality, product_status, quantity FROM Products;";

    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) > 0)
        {
            echo "<ol>";
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<li>';
                echo '<ul>';
                echo '<li>', $row["currency"], "</li>";
                echo '<li>', $row["denomination"], "</li>";
                echo '<li>', $row["mint_year"], "</li>";
                echo '<li>', $row["quality"], "</li>";
                echo '<li>', $row["product_status"], "</li>";
                echo '<li>', $row["quantity"], "</li>";
                echo '</ul>';
                echo '</li>';
            }
            echo "<ol>";
        }
        else 
        {
            echo "<p> no results found </p>";
        }
    }
    else
    {
        echo "<p> an error occured </p>";
    }
    
    mysqli_close($conn);

    ?>



</body>