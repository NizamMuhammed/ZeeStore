<?php
require_once '../php/DbConnect.php';
session_start(); // Ensure session is started to access the cart

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get customer details from the form
    $customer_name = htmlspecialchars($_POST['customer_name']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);

    // Calculate the total from the cart
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        }
    }

    // Prepare and execute the SQL statement
$user_data = json_decode($_COOKIE['user_data'], true);
$user_id = $user_data['user_id'];
$stmt = $conn->prepare("INSERT INTO orders (customer_name, address, phone, total, customer_id) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $customer_name, $address, $phone, $total, $user_id); // Changed type string to "ssssi"

if ($stmt->execute()) {
    // Clear the cart after successful order
    unset($_SESSION['cart']);
    $message = "Order placed successfully! Your Order ID is: " . $stmt->insert_id;
} else {
    $message = "Error: " . $stmt->error;
}

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    header("Location: checkout.php");
    exit();
}

// JavaScript to show message and redirect
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Order Status</title>
    <script>
        alert('" . addslashes($message) . "');
        window.location.href = 'index.php';
    </script>
</head>
<body>
</body>
</html>";
?>
