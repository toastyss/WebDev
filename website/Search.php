<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Search</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<body>
    <?php 
    require_once "website_header.php";
    require_once "db_functions.php";

    ?>

    <div class="search_page">
        <aside class="sidebar">
            <!-- Sidebar -->
            <form id="product_filter" action="" method="post">
                <input id="year" type="number" placeholder="Mint year" name="year" min="1900" max="2021"><br>

                <div id="checkboxes">
                    <input id="usd_c" type="checkbox" name="currency_USD" value="USD">
                    <label for="usd_c">USD</label><br> 
                    <input id="eur_c" type="checkbox" name="currency_EUR" value="EUR">
                    <label for="eur_c">EUR</label><br>
                    <input id="aud_c" type="checkbox" name="currency_AUD" value="AUD">
                    <label for="aud_c">AUD</label><br>
                </div>

                <!-- TODO Add cost, and price slider -->

                <div id="sliders">
                    <input type="range" id="higher" min="500" max="1000" step="10"><br>
                    <label for="higher">Denomination</label><br>

                    <input type="range" id="lower" min="1" max="500" step="10"><br>
                    <label for="lower">Cost</label><br>
                </div>

                <input id="submit_btn" type="submit" value="Filter">
            </form>
        </aside>

        <main class="content">
            <!-- Search Results -->
            <?php 

            $year = $_POST['year'];

            $sql = "SELECT * 
            FROM Products
            CROSS JOIN Products_status
            ON Products.product_id = Products_status.product_id;";         

            $filter_currency = [];

            if(isset($_POST["currency_USD"]))
            {
                $filter_currency[count($filter_currency)] = $_POST["currency_USD"];
            }
            if(isset($_POST["currency_EUR"]))
            {
                $filter_currency[count($filter_currency)] = $_POST["currency_EUR"];
            }
            if(isset($_POST["currency_AUD"]))
            {
                $filter_currency[count($filter_currency)] = $_POST["currency_AUD"];
            }

            $conn = get_conn();

            display_search_results($conn, $filter_currency);

            ?>
            
        </main>
    </div>

    
</body>
