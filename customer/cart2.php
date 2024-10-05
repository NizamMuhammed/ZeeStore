<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zee_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$cartItems = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
} else {
    echo "No items in the cart";
}

$conn->close();
?>

<?php
    session_start();

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Update quantity
    if (isset($_POST['update'])) {
        foreach ($_POST['quantities'] as $productID => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION['cart'][$productID]);
            } else {
                $_SESSION['cart'][$productID]['quantity'] = $quantity;
            }
        }
    }

    // Remove item from cart
    if (isset($_GET['remove'])) {
        $productID = $_GET['remove'];
        unset($_SESSION['cart'][$productID]);
    }

    $cart = $_SESSION['cart'];

    // Check if the cart is not empty
    if (!empty($cart)) {
        foreach ($cart as $item) {
            // Your cart item rendering logic here
        }
    } else {
        echo "Your cart is empty.";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
    .product-category {
      padding: 2rem;
    }

    .category-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
    }

    .category-card {
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 8px;
      background-color: #f9f9f9;
      text-align: center;
    }

    .category-card h3 {
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }

    .product-card {
      margin-bottom: 1rem;
    }

    .product-card img {
      max-width: 100%;
      border-radius: 4px;
    }

    .product-card p {
      margin-top: 0.5rem;
      font-size: 1rem;
    }
    /* Search bar container */
.search {
  display: flex;
  align-items: center;
}

/* Style for the input field */
#search {
  padding: 10px;
  border: 2px solid #f96d00; /* Orange border */
  border-radius: 5px 0 0 5px; /* Rounded corners */
  outline: none;
  transition: border-color 0.3s;
  flex-grow: 1; /* Allow input to grow */
}

/* Change border color on focus */
#search:focus {
  border-color: #ff8800; /* Darker orange when focused */
}

/* Style for the search button */
#search-bt {
  background-color: #f96d00; /* Orange background */
  border: none;
  color: white; /* White text */
  padding: 10px 15px;
  border-radius: 0 5px 5px 0; /* Rounded corners */
  cursor: pointer;
  transition: background-color 0.3s;
}

/* Change background color on hover */
#search-bt:hover {
  background-color: #ff8800; /* Darker orange on hover */
}

/* Icon styles */
#search-bt i {
  font-size: 16px; /* Adjust icon size */
}

  </style>
</head>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f0f5;
    color: #333;
}

.cart-container {
    width: 80%;
    max-width: 10000px; /* Reduced max-width */
    margin: 10px auto; /* Reduced margin */
    background-color: white;
    padding: 20px; /* Reduced padding */
    border-radius: 10px; /* Slightly smaller border radius */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Reduced shadow */
}

h1 {
    text-align: center;
    margin-bottom: 30px; /* Reduced margin */
    font-size: 22px; /* Smaller font size */
    color: #333;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px; /* Reduced margin */
    padding: 10px; /* Reduced padding */
    border-bottom: 1px solid #e0e0e0;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.item-image {
    width: 80px; /* Smaller image */
    height: 80px; /* Smaller image */
    object-fit: cover;
    border-radius: 8px; /* Reduced border-radius */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Slightly reduced shadow */
}

.item-details {
    flex-grow: 1;
    padding-left: 15px; /* Reduced padding */
    color: #555;
    font-size: 14px; /* Smaller text */
}

.item-price,
.item-total-price {
    font-size: 16px; /* Smaller font */
    font-weight: 500;
    color: #333;
}

.item-quantity {
    display: flex;
    align-items: center;
    gap: 5px; /* Reduced gap */
}

.quantity-btn {
    padding: 4px 10px; /* Smaller button size */
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 14px; /* Smaller font */
    transition: background-color 0.3s ease;
}

.quantity-btn:hover {
    background-color: #0056b3;
}

.quantity-input {
    width: 40px; /* Smaller input width */
    text-align: center;
    padding: 4px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px; /* Smaller font */
}

.remove-item-btn {
    background-color: #ff4d4d;
    color: white;
    padding: 6px 12px; /* Smaller button */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px; /* Smaller font */
    transition: background-color 0.3s ease;
}

.remove-item-btn:hover {
    background-color: #d93636;
}

.cart-summary {
    text-align: right;
    margin-top: 20px; /* Reduced margin */
}

.cart-summary p {
    font-size: 18px; /* Slightly smaller font */
    margin-bottom: 10px;
    color: #555;
}

.checkout-btn {
    background-color: #28a745;
    color: white;
    padding: 12px 24px; /* Smaller button */
    border: none;
    border-radius: 8px;
    font-size: 16px; /* Slightly smaller font */
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.checkout-btn:hover {
    background-color: #218838;
}

/* Smooth removing animation */
.cart-item.removing {
    animation: fadeOut 0.3s ease forwards;
}

@keyframes fadeOut {
    to {
        opacity: 0;
        transform: translateX(100px);
    }
}


</style>

<body style="margin-top: -30px">
  <nav>
    <a href="index.php" class="brand">ZeeStore</a>
    <section class="search">
  <form method="GET" action="">
    <input type="text" id="search" name="query" placeholder="search" />
    <button type="submit" id="search-bt">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </form>
</section>
    <div>
      <ul id="navbar">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="../index.php">Logout</a></li>
        <li><a href="order.php">Orders</a></li>
        <li><a href="../customer/cart.php">Cart</a></li>
        <li class="user" id="user">
          <div class="circle"></div>
          <i class="fa fa-user"></i>
        </li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
      <div id="userbar">
      <li><a href="settings.php">Setting</a></li>
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

  

    <div class="cart-container">
        <h1>Shopping Cart</h1>

        <!-- Cart Item Start -->
        <?php foreach ($cart as $item): ?>
        <div class="cart-item" data-price="<?php echo $item['price']; ?>">
            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['product_name']; ?>" class="item-image">
            <div class="item-details">
                <h2><?php echo $item['product_name']; ?></h2>
                <p>Brand: <?php echo $item['brand_id']; ?></p>
                <p>Model: <?php echo $item['category_id']; ?></p>
                <div class="item-price">
                    <p>Rs.<?php echo $item['price']; ?></p>
                </div>
            </div>
            
            <div class="item-quantity">
                <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                <input type="number" value="<?php echo $item['quantity']; ?>" class="quantity-input" onchange="updateCart(this)">
                <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
            </div>

            <button class="remove-item-btn" onclick="removeItem(this)">Remove</button>
        </div>
        <?php endforeach; ?>
        
        <!-- Cart Item End -->



        <div class="cart-summary">
            <h3>Cart Summary</h3>
            <p>Total Items: <span id="total-items">2</span></p>
            <p>Total Price: $<span id="total-price">2000</span></p>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

    <script>
        function updateQuantity(button, change) {
            const quantityInput = button.parentNode.querySelector('.quantity-input');
            const currentQuantity = parseInt(quantityInput.value);
            let newQuantity = currentQuantity + change;
            if (newQuantity < 1) newQuantity = 1; // Prevent quantity from going below 1
            quantityInput.value = newQuantity;
            updateCart(quantityInput);
        }

        function updateCart(input) {
            const cartItem = input.closest('.cart-item');
            const itemPrice = parseFloat(cartItem.getAttribute('data-price'));
            const quantity = parseInt(input.value);
            const totalPriceElement = cartItem.querySelector('.item-total-price span');
            const newTotalPrice = itemPrice * quantity;
            totalPriceElement.textContent = $$(newTotalPrice.toFixed(2));

            updateCartSummary();
        }

        function removeItem(button) {
            const cartItem = button.closest('.cart-item');
            cartItem.classList.add('removing');
            setTimeout(() => {
                cartItem.remove();
                updateCartSummary();
            }, 300); // Remove after animation
        }

        function updateCartSummary() {
            const cartItems = document.querySelectorAll('.cart-item');
            let totalItems = 0;
            let totalPrice = 0;

            cartItems.forEach(item => {
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                const itemPrice = parseFloat(item.getAttribute('data-price'));
                totalItems += quantity;
                totalPrice += itemPrice * quantity;
            });

            document.getElementById('total-items').textContent = totalItems;
            document.getElementById('total-price').textContent = totalPrice.toFixed(2);
        }

        // Initial cart summary update
        updateCartSummary();
    </script>

<script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/home.js"></script>
</body>
</html>