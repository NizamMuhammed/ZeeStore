<?php
session_start();
require_once '../php/DbConnect.php';

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        $stmt = $conn->prepare("SELECT product_name, price FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $_SESSION['cart'][$productId] = [
                'name' => $product['product_name'],
                'price' => $product['price'],
                'quantity' => $quantity,
            ];
        }
        $stmt->close();
    }

    header("Location: cart.php");
    exit();
} else {
    echo "Product ID not provided.";
}
?>
