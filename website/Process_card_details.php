<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Search</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<?php 
require_once "website_header.php";
require_once "db_functions.php";
require "Empty_cart.php";
$_SESSION;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // echo "<p>";
    // print_r($_SESSION["cart"]);
    // echo "</p>";

    $conn = get_conn();

    foreach($_SESSION["cart"] as $product)
    {
        // echo "<p>";
        // print_r($product);
        // echo "</p>";
        process_product($conn, $product["item_name"], $product["order_quantity"]);
    }

    $conn = get_conn();
    
    $minID = 10000;
    $maxID = 99999;

    $userID = random_int($minID, $maxID);
    $check = mysqli_query($conn, "SELECT user_id FROM User_data WHERE user_id = '$userID'");

    while(!$check->mysqli_num_rows == 0)
    {
        $userID = random_int($minID, $maxID);
        $check = mysqli_query($conn, "SELECT user_id FROM User_data WHERE user_id = '$userID'");
    }

    $userFirstName = htmlspecialchars($_REQUEST['firstname']);
    $userLastName = htmlspecialchars($_REQUEST['lastname']);
    $cardNum = htmlspecialchars($_REQUEST['cnumber']);
    $cardExp = htmlspecialchars($_REQUEST['expdate']);
    $cardCVC = htmlspecialchars($_REQUEST['cvc']);

    $sql = "INSERT INTO User_data VALUES ('$userID', '$userFirstName', '$userLastName', '$cardNum', '$cardExp', '$cardCVC')";

    if(mysqli_query($conn, $sql))
    {
        echo "<h2 id='confirm_text'>Purchase complete for $userFirstName $userLastName. Enjoy your cash!</h2>";
        echo emptyCart();
    }
    else
    {
        echo "Transaction error!";
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
}

    require_once "footer.php";
?>