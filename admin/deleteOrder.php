<?php
include("../php/DbConnect.php");
session_start();

if (isset($_GET['order_id'])) {
    $userID = $_GET['order_id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM orders WHERE orders_id = ?");
    $stmt->bind_param("i", $userID); // 'i' specifies the variable type as integer

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        $_SESSION['delete'] = "<div class='success'><h3>Order Canceled Successfully..!</h3></div>";
    } else {
        // Deletion failed
        $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete Order: " . $stmt->error . "</h3></div>";
    }

    // Close the statement
    $stmt->close();
} else {
    $_SESSION['delete'] = "<div class='error'><h3>No Order ID Provided!</h3></div>";
}

header("location: orders.php");
exit(); // Always exit after header redirection
?>
