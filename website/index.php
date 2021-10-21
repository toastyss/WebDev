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
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct1.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct2.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct3.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct4.png">
            </a>
        </section>
        
        <h2>Top Selling</h2>
        <hr>
        
        <section class="card_grid">
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/117-138AD_Denarius.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct2.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct3.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct4.png">
            </a>
        </section>

        <h2>On Sale</h2>
        <hr>

        <section class="card_grid">
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct1.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct2.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct3.png">
            </a>
            <a href="Product.php?element=USD0101997">
                <img src="assets/images/Products/FEAT/FeatProduct4.png">
            </a>
        </section>

    </div>

    <footer id="footer">
        <p>Careers (they dont exist)</p>
    </footer>

</body>
</html>