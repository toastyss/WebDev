<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Search</title>
    <link rel="stylesheet" href="./Styles/styles.css">
    <script src="./Scripts/Search.js" defer></script>
</head>

<body>
    
    <?php 
    require_once "website_header.php";
    require_once "db_functions.php";

    $year = $_REQUEST['year'];   
    $filter_currency = [];

    if(isset($_REQUEST["currency_USD"]))
    {
        $filter_currency[count($filter_currency)] = $_REQUEST["currency_USD"];
    }
    if(isset($_REQUEST["currency_EUR"]))
    {
        $filter_currency[count($filter_currency)] = $_REQUEST["currency_EUR"];
    }
    if(isset($_REQUEST["currency_AUD"]))
    {
        $filter_currency[count($filter_currency)] = $_REQUEST["currency_AUD"];
    }
    if(isset($_REQUEST["currency_EXT"]))
    {
        $filter_currency[count($filter_currency)] = $_REQUEST["currency_EXT"];
    }

    $slider_value = $_GET['cost'];
    ?>

    <div class="search_page">
        <aside class="sidebar">
            <!-- Sidebar -->
            <form id="product_filter" action="" method="get" name="filter">
                <input id="year" type="number" placeholder="Mint year" name="year" min="0" max="2021" value="<?php echo $year; ?>"><br>

                <div id="checkboxes">
                    <input id="usd_c" type="checkbox" name="currency_USD" value="USD">
                    <label for="usd_c">USD</label><br> 
                    <input id="eur_c" type="checkbox" name="currency_EUR" value="EUR">
                    <label for="eur_c">EUR</label><br>
                    <input id="aud_c" type="checkbox" name="currency_AUD" value="AUD">
                    <label for="aud_c">AUD</label><br>
                    <input id="ext_c" type="checkbox" name="currency_EXT" value="EXT">
                    <label for="ext_c">EXT</label><br>
                </div>
                <div id="sliders">
                    <input type="range" id="cost" name="cost" min="0" max="500" step="10" value="<?php echo $slider_value; ?>"><br>
                    <label id="cost_label" for="cost">Max Price: <?php echo $slider_value; ?></label><br>
                </div>
                <br>
                <input class="submit_btn" type="submit" value="Filter">
            </form>
        </aside>

        <main class="content">
            <!-- Search Results -->
            <?php 
            $conn = get_conn();
            display_search_results($conn, $filter_currency, $year, $slider_value);
            ?>
            
        </main>
    </div>

    <?php
    require_once "footer.php";
    ?>
</body>
