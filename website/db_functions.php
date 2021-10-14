<?php

function get_conn(){
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

function display_single_product($conn, $entry){
    $sql = "SELECT currency, denomination, mint_year 
    FROM Products WHERE product_id=?;";

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



?>