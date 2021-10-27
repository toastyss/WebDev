<?php session_start(); 
$_SESSION["test"] = rand(0, 100);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>
<body>

    <?php require_once "website_header.php"; 
    
    ?>

    <div id="about_sec">
        <img src="assets/images/M2U_White.png" id="logo" alt="Logo">
        <h1>MONEY 2 U</h1>
        
        <!-- about paragraph -->
        <p>Money 2 U is the premier website for the purchasing of cash online, delivered straight to your door. Since our founding in 2006, we have supplied over 65,000 customers with the cash they need!</p>
    </div>


    <div id="home_body">
    <h2>Featured Products</h2>
    <hr>

    <section class="card_grid">
            <a href="Product.php?element=USD1001997">
                <img src="assets/images/Products/FEAT/FeatProduct1.png">
            </a>
            <a href="Product.php?element=AUD0101954">
                <img src="assets/images/Products/FEAT/FeatProduct2.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct3.png">
            </a>
            <a href="Product.php?element=AUD0101993">
                <img src="assets/images/Products/FEAT/FeatProduct4.png">
            </a>
        </section>
        
        <h2>Top Selling</h2>
        <hr>
        
        <section class="card_grid">
            <a href="Product.php?element=EXT001DRAC">
                <img src="./assets/images/Products/EXT/335-330BC_Drachma.png">
            </a>
            <a href="Product.php?element=EUR2002018">
                <img src="./assets/images/Products/EUR/200EUR.png">
            </a>
            <a href="Product.php?element=AUD1002020">
                <img src="./assets/images/Products/AUD/100AUD.png">
            </a>
            <a href="Product.php?element=EUR0102013">
                <img src="./assets/images/Products/EUR/10EUR.png">
            </a>
        </section>

        <h2>Editor's Pick</h2>
        <hr>

        <section class="card_grid">
            <a href="Product.php?element=EXT4501986">
                <img src="./assets/images/Products/FEAT/FeatProduct5.png">
            </a>
            <a href="Product.php?element=EXT001ANTO">
                <img src="./assets/images/Products/EXT/198-127AD_Antoninianus.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct2.png">
            </a>
            <a href="Product.php?element=EXT001DENA">
                <img src="./assets/images/Products/EXT/117-138AD_Denarius.png">
            </a>
        </section>

    </div>

    <?php
    require_once "footer.php";
    ?>

</body>
</html>