<!DOCTYPE html>
<html lang="en">
<head>
    <title>ZeeStore - Cart</title>
    <link rel="icon" type="image/x-icon" href="../svg/logo.png" media="(prefers-color-scheme: light)" />
    <link rel="icon" type="image/x-icon" href="../svg/logo.png" media="(prefers-color-scheme: dark)" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="../css/magnific-popup.css" />
    <link rel="stylesheet" href="../css/aos.css" />
    <link rel="stylesheet" href="../css/ionicons.min.css" />
    <link rel="stylesheet" href="../css/animate.css" />
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="../css/jquery.timepicker.css" />
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/icomoon.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f96d00;
            color: white;
        }

        .btn {
            background-color: #f96d00;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #e65c00;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 8px;
            text-align: center;
        }

        .close {
            color: red;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: darkred;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav>
        <a href="index.php" class="brand">ZeeStore</a>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="cart.php" class="active">Cart</a></li>
            <li><a href="../index.php">Logout</a></li>
        </ul>
    </nav>
    <!-- END nav -->

    <div class="container">
        <h1>Your Cart</h1>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php
                session_start();
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($item['name']) . '</td>';
                        echo '<td>Rs.' . number_format($item['price'], 2) . '</td>';
                        echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                        echo '<td>Rs.' . number_format($subtotal, 2) . '</td>';
                        echo '</tr>';
                    }
                    echo '<tr><td colspan="3">Total</td><td>Rs.' . number_format($total, 2) . '</td></tr>';
                } else {
                    echo '<tr><td colspan="4">Your cart is empty.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="checkout.php" class="btn">Proceed to Checkout</a>
        <button id="clearCartBtn" class="btn">Clear Cart</button> <!-- Clear Cart Button -->
    </div>

    <!-- Modal for selecting quantity -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Select Quantity</h2>
            <form id="quantityForm" method="GET" action="cart.php">
                <input type="hidden" id="product_id" name="product_id" />
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" max="10" required />
                <button type="submit" id="submitQuantity">Add to Cart</button>
            </form>
        </div>
    </div>

    <footer class="ftco-footer ftco-bg-light ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 ZeeStore. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/jquery.min.js"></script>
    <script>
        // Modal handling
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Quantity selection
        document.getElementById("submitQuantity").onclick = function() {
            var quantity = document.getElementById("quantity").value;
            alert("You have selected " + quantity + " items."); // You can customize this as needed
            modal.style.display = "none"; // Close modal after selection
        }

        // Clear Cart functionality
        document.getElementById("clearCartBtn").onclick = function() {
            if (confirm("Are you sure you want to clear the cart?")) {
                // Use AJAX or form submission to clear the cart
                window.location.href = "clear_cart.php"; // Redirect to a PHP script to clear the cart
            }
        }
    </script>
</body>
</html>
