<!DOCTYPE html>
<html lang="en"><head>
    <title>ZeeStore - Home</title>
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

    .search {
      display: flex;
      justify-content: center;
      margin: 20px;
    }

    #search {
      padding: 10px;
      border: 2px solid #f96d00;
      border-radius: 5px 0 0 5px;
      outline: none;
      flex-grow: 1;
      width: 500px;
    }

    #search-bt {
      background-color: #f96d00;
      border: none;
      color: white;
      padding: 10px 15px;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }

    #search-bt i {
      font-size: 16px;
    }

    .product {
      margin: 20px 0;
      display: inline-block;
      width: 300px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      text-align: center;
    }

    .product .pimage {
      background-size: cover;
      background-position: center;
      width: 100%;
      height: 200px;
      margin-bottom: 10px;
    }

    .des h4 {
      color: #f96d00;
    }
        /* Modal CSS */
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

        <section class="search">
            <form method="GET" action="">
                <input type="text" id="search" name="query" placeholder="Search Products or Brand" />
                <button type="submit" id="search-bt">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </section>
        <div>
            <ul id="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li class="user" id="user">
                    <div class="circle"></div>
                    <i class="fa fa-user"></i>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
            <div id="userbar">
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

    <section class="hero-wrap hero-wrap-2" style="background-image: url('../images/shopping.jpg')"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Your One-Stop Shop for Electronics</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="deals.php">
                                Today's Deals
                                <i class="ion-ios-arrow-forward"></i>
                            </a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- header -->

    <div class="container">
        <h1>Products</h1>
        <div class="box">
        <?php
// Include your database connection
require_once '../php/DbConnect.php';

// Get the search query if it exists
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare a SQL query based on the search input
if ($searchQuery) {
    // Search in both product_name and brand
    $stmt = $conn->prepare("
        SELECT products.*, brand.brand_name 
        FROM products 
        JOIN brand ON products.brand_id = brand.brand_id
        WHERE product_name LIKE ? OR brand_name LIKE ?");
    $likeQuery = '%' . $searchQuery . '%';
    $stmt->bind_param('ss', $likeQuery, $likeQuery);
} else {
    // Fetch all products if no search query is provided
    $stmt = $conn->prepare("
        SELECT products.*, brand.brand_name 
        FROM products 
        JOIN brand ON products.brand_id = brand.brand_id");
}

$stmt->execute();
$result = $stmt->get_result();

// Check if products are available
if ($result->num_rows > 0) {
    // Loop through each product and display its details
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        
        // Display the product image
        echo '<div class="pimage" style="background-image: url(\'data:' . $row['image_type'] . ';base64,' . base64_encode($row['image']) . '\');"></div>';
        
        // Display product description with brand and product name
        echo '<div class="des">';
        echo '<span>' . htmlspecialchars($row['brand_name']) . '</span>';
        echo '<h5>' . htmlspecialchars($row['product_name']) . '</h5>';
        echo '<h4>Rs.' . number_format($row['price'], 2) . '</h4>';
        echo '</div>';
        echo '<a href="addToCart.php?product_id=' . $row['product_id'] . '" class="add-to-cart">';
        
echo '<img src="../svg/shopping-cart-svgrepo-com.svg" style="width: 24px; height: 24px;" /></a>';
        echo '</div>'; // End of product
    }
} else {
    echo '<p>No products found.</p>';
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

        </div>
        </div>

    <script src="../js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.add-to-cart').click(function(event){
                event.preventDefault();
                var productId = $(this).attr('href').split('=')[1];
                $.ajax({
                    url: 'addToCart.php',
                    method: 'GET',
                    data: {product_id: productId},
                    success: function(response){
                        alert('Product added to cart!');
                    }
                });
            });
        });
    </script>
    <!-- Modal for selecting quantity -->
    <!-- Quantity Selection Modal -->
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
<script>
    // Modal handling
    var modal = document.getElementById("myModal");
    var btns = document.querySelectorAll(".buy-button");
    var span = document.getElementsByClassName("close")[0];

    btns.forEach(function(btn) {
        btn.onclick = function() {
            // Assuming you have a data attribute for the product ID
            var productId = btn.getAttribute("data-product-id");
            document.getElementById("product_id").value = productId; // Set the product ID
            modal.style.display = "block";
        }
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    document.getElementById("submitQuantity").onclick = function() {
        var quantity = document.getElementById("quantity").value;
        alert("You have selected " + quantity + " items."); // You can customize this as needed
        modal.style.display = "none"; // Close modal after selection
    }
</script>

<!-- CSS for Modal -->
<style>
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
<script>
  // Get the modal and elements
  var modal = document.getElementById("quantityModal");
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on Add to Cart button, show the modal
  document.querySelectorAll('.cart').forEach(function(button) {
    button.onclick = function(event) {
      event.preventDefault();
      var productId = this.getAttribute('data-id');
      document.getElementById('product_id').value = productId;
      modal.style.display = "block";
    }
  });

  // When the user clicks on (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  };

  // Close the modal when user clicks anywhere outside of it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
</script>
    </div>
</div>


  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg>
  </div>
  <!-- loader -->

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
<?php include '../footer.php'; ?>
</html>
