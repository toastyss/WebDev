<?php

$header = ["currency", "denomination", "mint_year", "price", "quality", "quantity"];

function get_conn()
{
    define("DB_HOST", "localhost");
    define("DB_NAME", "MoneyToU");
    define("DB_USER", "dbadmin");
    define("DB_PASS", "");

    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        // Something went wrong...
        echo "Error: Unable to connect to database.<br>";
        echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
        echo "Debugging error: " . mysqli_connect_error() . "<br>";
    }
    return $conn;
}

function display_single_product($conn, $entry)
{
    global $header;

    $sql = "SELECT currency, denomination, 
    mint_year, price, quality, quantity
    FROM Products
    CROSS JOIN Products_status
    ON Products.product_id = Products_status.product_id
    WHERE shipping_status = 'IN WAREHOUSE' AND Products.product_id=?;";

    $ret = null;

    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);

    mysqli_stmt_bind_param($statement, 's', $entry);

    if(mysqli_stmt_execute($statement))
    {
        $result = mysqli_stmt_get_result($statement);
        if($row = mysqli_fetch_assoc($result))
        {
            $ret = $row;
        }
        mysqli_free_result($result);
    }
    
    mysqli_close($conn);
    return $ret;
    
}

function display_search_results($conn, $filter_currency)
{
    global $header;

    $sql = "SELECT Products.product_id, currency, denomination, mint_year, price, quality, quantity
            FROM Products
            CROSS JOIN Products_status
            ON Products.product_id = Products_status.product_id
            WHERE shipping_status = 'IN WAREHOUSE'";

    if(count($filter_currency) > 0)
    {
        $sql = $sql.' AND currency = "'.$filter_currency[0].'"';
    }
    if(count($filter_currency) > 1)
    {
        for($i = 1; $i < count($filter_currency); $i++)
        {
            $sql = $sql.' OR currency = "'.$filter_currency[$i].'"';
        }
    }

    $ret = null;

    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) > 0)
        {
            echo '<h1> Results </h1>', "\n";
            echo "\t\t\t", '<table id="results">', "\n";
            echo "\t\t\t\t", '<tr>', "\n";
            echo "\t\t\t\t\t", '<th>Product_id</th>', "\n";
            foreach($header as $label)
            {
                echo "\t\t\t\t\t", '<th>', $label, "</th>", "\n";
            }
            echo "\t\t\t\t", '</tr>', "\n";
            while($row = mysqli_fetch_assoc($result))
            {
                echo "\t\t\t\t", '<tr>', "\n";
                foreach($row as $attribute => $value)
                {
                    if($attribute == "product_id")
                    {
                        echo "\t\t\t\t\t", '<td>', '<a href=Product.php?element=',$value, '>', $value, '</a>' ,"</td>", "\n";
                    }
                    else
                    {
                        echo "\t\t\t\t\t", '<td>', $value, "</td>", "\n";
                    }
                }
            }
            echo "\t\t\t", "</table>", "\n";
            mysqli_free_result($result);
        }
        else 
        {
            echo "\t\t\t", "<p> no results found </p>";
        }
    }
    else
    {
        echo "\t\t\t", "<p> sql query faliure</p>";
    }
    
    mysqli_close($conn);
    return $ret;
    
}



?>