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

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $conn = get_conn();
    
    $minID = 10000;
    $maxID = 99999;

    $userID = random_int($minID, $maxID);
    $userFirstName = htmlspecialchars($_REQUEST['firstname']);
    $userLastName = htmlspecialchars($_REQUEST['lastname']);
    $cardNum = htmlspecialchars($_REQUEST['cnumber']);
    $cardExp = htmlspecialchars($_REQUEST['expdate']);
    $cardCVC = htmlspecialchars($_REQUEST['cvc']);

    $sql = "INSERT INTO User_data VALUES ('$userID', '$userFirstName', '$userLastName', '$cardNum', '$cardExp', '$cardCVC')";

    if(mysqli_query($conn, $sql))
    {
        echo "<h2 id='confirm_text'>Purchase complete for $userFirstName $userLastName. Enjoy your cash!</h2>";
    }
    else
    {
        echo "Transaction error!";
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>