<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ZeeStore - Product</title>
    <link
    rel="icon"
    type="image/x-icon"
    href="../svg/logo2.png"
    media="(prefers-color-scheme: light)" />
  <link
    rel="icon"
    type="image/x-icon"
    href="../svg/logo1.png"
    media="(prefers-color-scheme: dark)" />
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>
  <body style="margin-top: -30px">
    <nav>
      <a href="index.html" class="brand">ZeeStore</a>
      <div>
        <ul id="navbar">
          <li><a href="Dashboard.php">Dashboard</a></li>
          <li><a href="brand.php">Brands</a></li>
          <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
          <li><a href="product.php" class="active">Products</a></li>
          <li class="user" id="user">
            <div class="circle"></div>
            <i class="fa fa-user"></i>
          </li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul>
        <div id="userbar">
          <li><a href="singup1.html">Settings</a></li>
          <li><a href="login.html">Logout</a></li>
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

    <?php
require_once '../php/DbConnect.php';
$ghr = "";
$quantity = 0; // Initialize quantity

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Accessing the image from the correct input name
    $image = $_FILES['product_image']['tmp_name'];
    $iimage_type = $_FILES['product_image']['type'];
    $image_data = addslashes(file_get_contents($image));

    $product_name = $_POST['product_name'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Insert data into the product table using prepared statements
    $stmt = $conn->prepare("INSERT INTO product (product_name, brand_id, category_id, description, price, quantity, image, image_type) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siississ", $product_name, $brand_id, $category_id, $description, $price, $quantity, $image_data, $iimage_type);

    $result1 = $conn->query("SELECT * FROM product WHERE product_name = '$product_name';");

    if ($result1->num_rows > 0) {
        $ghr = "Product already exists";
    } elseif ($stmt->execute()) {
        $ghr = "Process successfully done";
    } else {
        $ghr = "Invalid data detected";
    }

    // Close the statement
    $stmt->close();
}
?>

<div class="popup <?php if ($ghr == "") echo "hide"; ?>">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
        <div class="form-body">
            <div class="image"><img src="../svg/image.svg" class="display" /></div>
            <div class="fields">
                <!-- Display any messages -->
                <div class="message <?php if ($ghr == "") echo "pop"; ?>">
                    <i class="fa-solid fa-circle"></i>
                    <?php echo htmlspecialchars($ghr); ?>
                </div>

                <!-- Product Name -->
                <div class="inputs">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" placeholder="Product name..." required />
                </div>

                <!-- Brand Dropdown -->
                <div class="inputs">
                    <label for="brand">Brand</label>
                    <select name="brand_id" id="brand" required>
                        <?php
                        // Fetching brands from the database
                        $result = $conn->query("SELECT brand_id, brand_name FROM brand");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Category Dropdown -->
                <div class="inputs">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" required>
                        <?php
                        // Fetching categories from the database
                        $result = $conn->query("SELECT category_id, category_name FROM category");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Product Image -->
                <div class="inputs">
                    <label for="image_input">Product Image</label>
                    <input type="file" name="product_image" id="image_input" accept=".jpg, .jpeg, .png, .img" required />
                </div>

                <!-- Description -->
                <div class="inputs">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Enter product description"></textarea>
                </div>

                <!-- Price -->
                <div class="inputs">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" id="price" placeholder="Enter product price" required />
                </div>

                <!-- Submit Button -->
                <button type="submit">Add</button>
            </div>
        </div>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>" ?>
</div>


    <section
      class="hero-wrap hero-wrap-2"
      style="background-image: url('images/shopping.jpg')"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
        >
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Manage Products</h1>
            <p class="breadcrumbs">
              <span class="mr-2">
                <a href="index.html">
                  Dashboard
                  <i class="ion-ios-arrow-forward"></i>
                </a>
              </span>
              <span>
                Products
                <i class="ion-ios-arrow-forward"></i>
              </span>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- header -->

    <section class="admin-table">
      <h2>Product table</h2>
      <span>view and manage product deatils</span>
      <div class="table">
        <div class="searchAddS">
          <section class="search">
            <input type="text" id="search" placeholder="search product" />
            <button id="search-bt">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </section>
          <button id="btt1">Add product</button>
        </div>
        <div class="table-header parent">
          <div class="table-header-data row">Product ID</div>
          <div class="table-header-data row">Name</div>
          <div class="table-header-data row">Quantity</div>
          <div class="table-header-data row">Status</div>
        </div>
        <div class="table-data">
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
        </div>
      </div>
    </section>

    <div id="ftco-loader" class="show fullscreen">
    <.. /svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#F96D00"
        />
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

</html>
