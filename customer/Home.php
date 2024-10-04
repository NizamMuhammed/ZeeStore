<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Home</title>
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
    <a href="index.html" class="brand">Zee Store</a>
    <div>
      <ul id="navbar">
        <li><a href="Home.php" class="active">Home</a></li>
        <li><a href="signin.php">Sign In</a></li>
        <li><a href="retunorder.php" >Orders</a></li>
        <li><a href="cart.php">Cart</a></li>
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

  <section
    class="hero-wrap hero-wrap-2"
    style="background-image: url('../images/home.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div
        class="row no-gutters slider-text align-items-center justify-content-center">
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

  <?php
  require_once '../php/DbConnect.php';
  $ghr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO `category`(`category_name`) VALUES ('" . $_POST['name'] . "')";
    $result1 = $conn->query("SELECT * FROM category WHERE category_name = '" . $_POST['name'] . "' ;");
    if ($result1->num_rows > 0)  $ghr = "Catagory already exists";
    elseif ($conn->query($sql)) {
      $ghr = "Process successfully done";
    } else $ghr = "Invalid data detected";
  }
  ?>

<main>
  <section class="customer-table">
    <h2>Product Category Table</h2>
    <span>Products</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="Search category" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="message <?php if ($ghr == "") echo "hide"; ?>">
            <i class="fa-solid fa-circle"></i>
            <?php echo $ghr ?>
          </div>
          <input
            type="text"
            pattern="[A-Za-z]+"
            title="Please enter only letters."
            name="name"
            required
            placeholder="New category" />
          <button type="submit">Add category</button>
        </form>
        <?php if (isset($error)) echo "<p>$error</p>" ?>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Category ID</div>
        <div class="table-header-data row">Name</div>
        <div class="table-header-data row">NO_Products</div>
      </div>
      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php';
        $result = $conn->query("SELECT * FROM `category` WHERE 1;");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['category_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['category_name'] . "</div>";
            echo "<div class='table-cell row'>" . 20 . "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='table-row parent'> No records found </div>";
        }
        ?>
      </div>
    </div>
  </section>
</main>


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