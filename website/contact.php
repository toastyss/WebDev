<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money 2 U Checkout</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>

<body>
    <?php
    require_once "website_header.php";
    ?>
    <h1>Contact</h1>
    <form id="contact_form" action="email_sent.php" method="POST">

        <input type="text" placeholder="First name" name="firstname" required>
        <input type="text" placeholder="Last name" name="lastname" required><br><br>
        <input type="email" placeholder="Email" name="email" required><br><br>
        <label for="body">Comments/Questions:</label><br>
        <textarea rows="4" cols="50" name="body" required></textarea><br>
        <br>
        <input class="submit_btn" type="submit" value="Contact Us">
    </form>
</body>