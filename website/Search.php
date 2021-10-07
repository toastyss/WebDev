<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Search</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<body>
    <?php require_once "website_header.php";

    ?>

    <div class="search_page">
        <aside class="sidebar">
            <!-- Sidebar -->
            <div id="product_filter">
        <form id="filter_form" action="" method="GET">
            <input id="search_bar" type="text" placeholder="Search for item" name="search"><br>

            <div id="checkboxes">
                <input id="usd_c" type="checkbox" name="currency_type" value="USD">
                <label for="usd_c">USD</label><br> 
                <input id="eur_c" type="checkbox" name="currency_type" value="EUR">
                <label for="eur_c">EUR</label><br>
                <input id="aud_c" type="checkbox" name="currency_type" value="AUD">
                <label for="aud_c">AUD</label><br>
            </div>

            <input id="submit_btn" type="submit" value="Filter">
        </form>
    </div>
        </aside>

        <main class="content">
            <!-- Search Results -->
            <?php 
            require_once "dbconn.php";

            $sql = "SELECT * FROM Products;";

            if($result = mysqli_query($conn, $sql))
            {
                if(mysqli_num_rows($result) > 0)
                {
                    echo '<h1> Results </h1>', "\n";
	            echo "\t\t\t", '<table id="results">', "\n";
	    	    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "\t\t\t\t", '<tr>', "\n";
                        echo "\t\t\t\t\t", '<td>', $row["currency"], "</td>", "\n";
                        echo "\t\t\t\t\t", '<td>', $row["denomination"], "</td>", "\n";
                        echo "\t\t\t\t\t", '<td>', $row["mint_year"], "</td>", "\n";
                        echo "\t\t\t\t\t", '<td>', $row["quality"], "</td>", "\n";
                        echo "\t\t\t\t\t", '<td>', $row["product_status"], "</td>", "\n";
                        echo "\t\t\t\t\t", '<td>', $row["quantity"], "</td>", "\n";
                        echo "\t\t\t\t", '</tr>', "\n";
                    }
                    echo "\t\t\t", "</table>", "\n";
                    myqli_free_result($result);
                }
                else 
                {
                    echo "\t\t\t", "<p> no results found </p>";
                }
            }
            else
            {
                echo "\t\t\t", "<p> sql query faliure 3</p>";
            }
            
            mysqli_close($conn);

            ?>
            
        </main>
    </div>

    
</body>
