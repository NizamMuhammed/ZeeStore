<?php
session_start();
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']); // Clear the cart
    $_SESSION['message'] = "Your cart has been cleared."; // Optionally set a message
}
header("Location: cart.php"); // Redirect back to the cart page
exit();
?>
