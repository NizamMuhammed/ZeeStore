<?php
session_start();
require_once '../php/DbConnect.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the cart exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $customerId = $_SESSION['customer_id']; // Assuming you have stored the customer ID in the session
        $totalAmount = 0.0;

        // Calculate the total amount from the cart
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            // Fetch product price from the database
            $stmt = $conn->prepare("SELECT price FROM products WHERE product_id = ?");
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $totalAmount += $row['price'] * $quantity;
            }
        }

        // Insert order into the database
        $stmt = $conn->prepare("INSERT INTO orders (customer_id, total_amount) VALUES (?, ?)");
        $stmt->bind_param("id", $customerId, $totalAmount);

        if ($stmt->execute()) {
            unset($_SESSION['cart']); // Clear the cart
            echo "Payment processed successfully! Thank you for your order.";
            // Optionally redirect to orders.php
            // header("Location: orders.php");
            // exit();
        } else {
            echo "Error processing order: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Your cart is empty.";
    }
} else {
    echo "Invalid request.";
}
?>
