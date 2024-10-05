<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Home</title>
  <link
    rel="icon"
    type="image/x-icon"
    href="svg/logo1.png"
    media="(prefers-color-scheme: light)" />
  <link
    rel="icon"
    type="image/x-icon"
    href="svg/logo1.png"
    media="(prefers-color-scheme: dark)" />
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/aos.css" />
  <link rel="stylesheet" href="css/ionicons.min.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="css/jquery.timepicker.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/icomoon.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/style2.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
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
  </style>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.php" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="login.php">Login/SignUp</a></li>
        <li><a href="order.php">Orders</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li class="user" id="user">
          <div class="circle"></div>
          <i class="fa fa-user"></i>
          <i class="fa fa-exclamation-circle"></i>
        </li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/home.jpg')"
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
    <h1>Category</h1>
    <div class="box">
      <?php
      // Include your database connection
      require_once 'php/DbConnect.php';

      // Query to fetch products from the database
      $result = $conn->query("SELECT * FROM `products` WHERE 1;");

      // Check if products are available
      if ($result->num_rows > 0) {
        // Loop through each product and display its details
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product">';

          // Display the product image
          echo '<div class="pimage" style="background-image: url(\'data:' . $row['image_type'] . ';base64,' . base64_encode($row['image']) . '\');"></div>';

          // Display product description
          echo '<div class="des">';
          echo '<span>' . htmlspecialchars($row['brand_id']) . '</span>';
          echo '<h5>' . htmlspecialchars($row['product_name']) . '</h5>';

          // Display product rating as stars (assuming a 'rating' column exists in your products table)

          // Display product price
          echo '<h4>Rs.' . number_format($row['price'], 2) . '</h4>';
          echo '</div>';

          // Add to cart button
          echo '<a href="addToCart.php?product_id=' . $row['product_id'] . '" class="cart">';
          echo '<img src="svg/shopping-cart-svgrepo-com.svg" style="width: 24px; height: 24px;" />';
          echo '</a>';


          echo '</div>'; // Close product div
        }
      } else {
        echo '<p>No products found.</p>';
      }
      ?>
    </div>
  </div>


  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle
        class="path-bg"
        cx="24"
        cy="24"
        r="22"
        fill="none"
        stroke-width="4"
        stroke="#eeeeee" />
      <circle
        class="path"
        cx="24"
        cy="24"
        r="22"
        fill="none"
        stroke-width="4"
        stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg>
  </div>
  <!-- loader -->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/home.js"></script>
</body>

</html>