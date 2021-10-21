<?php
function emptyCart()
{
    $_SESSION["cart_length"] = null;
    $_SESSION["cart"] = null;
}
?>