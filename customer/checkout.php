<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ZeeStore</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <nav>
        <a href="index.php" class="brand">ZeeStore</a>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Checkout</h1>
        <form method="POST" action="processOrder.php">
            <label for="customer_name">Name:</label>
            <input type="text" id="customer_name" name="customer_name" required />

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required />

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script src="../js/jquery.min.js"></script>
</body>

</html>
