<?php
// // Database connection (WAMP environment example)
// $servername = "localhost";
// $username = "root"; // Replace with your DB username
// $password = "";     // Replace with your DB password
// $dbname = "your_database_name"; // Replace with your DB name

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

include("DBconnect.php");
    session_start();

// Function to send confirmation email
function sendOrderConfirmationEmail($customerEmail, $orderID, $customerName) {
    // Set the email subject and headers
    $subject = "Order Confirmation - Order #$orderID";
    $headers = "From: yourshop@example.com\r\n";
    $headers .= "Reply-To: support@example.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Email body
    $message = "
    <html>
    <head>
    <title>Order Confirmation - Order #$orderID</title>
    </head>
    <body>
    <h2>Dear $customerName,</h2>
    <p>Thank you for your order! We are pleased to inform you that your order #$orderID has been confirmed.</p>
    <p>You can expect your delivery soon. We will keep you updated regarding shipping and other details.</p>
    <p>If you have any questions, feel free to contact our support team.</p>
    <p>Best regards,<br>Your Shop Team</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($customerEmail, $subject, $message, $headers)) {
        echo "Order confirmation email sent successfully.<br>";
    } else {
        echo "Failed to send order confirmation email.<br>";
    }
}

// Check if an order confirmation request has been submitted
if (isset($_POST['confirm_order'])) {
    $orderID = $_POST['order_id']; // Get the order ID from the form
    $customerEmail = $_POST['customer_email']; // Get the customer's email
    $customerName = $_POST['customer_name']; // Get the customer's name

    // Update order status in the database (assuming 'orders' table with a 'status' column)
    $sql = "UPDATE orders SET status='Confirmed' WHERE order_id='$orderID'";
    
    if ($con->query($sql) === TRUE) {
        echo "Order #$orderID has been confirmed.<br>";
        
        // Send confirmation email
        sendOrderConfirmationEmail($customerEmail, $orderID, $customerName);
    } else {
        echo "Error updating order status: " . $conn->error;
    }
}

// $conn->close();
?>

<!-- HTML Form to Confirm the Order -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Confirm Order</h1>
    <form method="post" action="">
        <label for="order_id">Order ID:</label>
        <input type="text" id="order_id" name="order_id" required><br><br>

        <label for="customer_email">Customer Email:</label>
        <input type="email" id="customer_email" name="customer_email" required><br><br>

        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br><br>

        <input type="submit" name="confirm_order" value="Confirm Order">
    </form>
</body>
</html>
