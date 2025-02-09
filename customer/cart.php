<?php
session_start(); // Start the session at the top
?>
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

        th,
        td {
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
        <a href="index.php" class="brand">
            <img src="../svg/logo.png" alt="ZeeStore Logo" class="logo" />
            ZeeStore
        </a>

        <style>
            .brand {
                display: flex;
                align-items: center;
            }

            .logo {
                width: 60px;
                height: auto;
                margin-right: 8px;
            }
        </style>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="cart.php" class="active">Cart</a></li>
                <li class="user" id="user">
                    <div class="circle"></div>
                    <i class="fa fa-user"></i>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
            <div id="userbar">
                <li><a href="aditProfile.php">Edit Profile</a></li>
                <li><a href="../login.php">Logout</a></li>
                <a href="#" id="asd"><i class="fa-solid fa-xmark"></i></a>
            </div>
        </div>
        <div class="show">
            <div class="user2" id="user2">
                <div class="circle"></div>
                <i class="fa fa-user"></i>
                <i class="fa fa-exclamation-circle"></i>
            </div>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </nav>
    <!-- END nav -->

    <div class="container">
        <br><br>
        <h1 style="text-align: center;">Your Cart</h1>
        <button id="clearCartBtn" style="text-align: center;" class="btn">Clear Cart</button><br>
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
        </table><br>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <button id="openCheckoutBtn" class="btn">Cash On Delivery Checkout</button><br><br>
            <a href="checkout.php" class="btn">Pay now</a>
        <?php else: ?>
            <button id="openCheckoutBtn" class="btn" style="pointer-events: none; opacity: 0.6;">Cash On Delivery Checkout</button><br><br>
            <a href="checkout.php" class="btn" style="pointer-events: none; opacity: 0.6;">Pay now</a>
        <?php endif; ?>
    </div>


    <!-- Checkout Modal -->
    <div id="checkoutModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeCheckoutModal">&times;</span>
            <h1>Checkout</h1>
            <form method="POST" action="processOrder.php">
                <label for="customer_name">Name:</label>
                <input type="text" id="customer_name" name="customer_name" required />

                <label for="address">Address:</label><br>
                <textarea id="address" name="address" required></textarea>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required /><br>

                <button type="submit" class="btn">Place Order</button>
            </form>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script>
        // Existing modal handling code...

        // Modal handling for checkout
        var checkoutModal = document.getElementById("checkoutModal");
        var openCheckoutBtn = document.getElementById("openCheckoutBtn");
        var closeCheckoutModal = document.getElementById("closeCheckoutModal");

        // Function to open the checkout modal
        openCheckoutBtn.onclick = function() {
            checkoutModal.style.display = "block";
        }

        // Function to close the checkout modal
        closeCheckoutModal.onclick = function() {
            checkoutModal.style.display = "none";
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == checkoutModal) {
                checkoutModal.style.display = "none";
            }
        }

        // Existing code...


        // Clear Cart functionality
        document.getElementById("clearCartBtn").onclick = function() {
            if (confirm("Are you sure you want to clear the cart?")) {
                // Use AJAX or form submission to clear the cart
                window.location.href = "clear_cart.php"; // Redirect to a PHP script to clear the cart
            }
        }
    </script>
</body>
<?php include '../footer.php'; ?>
<?php require_once '../php/loader.php' ?>
<?php require_once '../php/javaScripts.php' ?>

</html>