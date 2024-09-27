<!DOCTYPE html>
<html lang="en">

<head>
  <title>Zee Store - Supplier</title>
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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brand</a></li>
        <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php" class="active">Supplier</a></li>
        <li><a href="product.php">Product</a></li>
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

  // retreve data if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // input data to db
    $sql = "INSERT INTO `supplier`(`suppier_name`, `suppier_email`, `suppier_mobile`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['mobile'] . "')";
    try {
      $conn->query($sql);
      $ghr = "Process successfully done";
    } catch (\Throwable $th) {
      $ghr = "Invalid data detected";
    }
  }
  ?>

  <div class="popup <?php if ($ghr == "") echo "hide"; ?>">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="min-width: 600px">
      <span>Inventory Managment System</span>
      <h2>Add new supplier</h2>
      <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
      <div
        class="form-body"
        style="flex-direction: column; align-items: flex-start">
        <div class="message <?php if ($ghr == "") echo "pop"; ?>" style="margin: -12px 0">
          <i class="fa-solid fa-circle"></i>
          <?php echo $ghr ?>
        </div>
        <div class="fields">
          <div class="inputs">
            <label>Name</label>
            <input type="text" name="name" placeholder="name..." required />
          </div>
          <div class="inputs">
            <label>Email</label>
            <input type="email" name="email" placeholder="email..." required />
          </div>
          <div class="inputs">
            <label>Mobile</label>
            <input type="tel" name="mobile" placeholder="mobile..." maxlength="14" pattern="\d+" required />
          </div>
        </div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
  <!-- popup -->

  <section
    class="hero-wrap hero-wrap-2"
    style="background-image: url('../images/shopping.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div
        class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Manage Suppliers</h1>
          <p class="breadcrumbs">
            <span class="mr-2">
              <a href="index.html">
                Dashboard
                <i class="ion-ios-arrow-forward"></i>
              </a>
            </span>
            <span>
              Supplier
              <i class="ion-ios-arrow-forward"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- header -->

  <section class="admin-table">
    <h2>Supplier information table</h2>
    <span>view and manage supplier information</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="search supplier" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <button id="btt1">Add supplier</button>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Supplier ID</div>
        <div class="table-header-data row">Name</div>
        <div class="table-header-data row">E-mail</div>
        <div class="table-header-data row">Mobile</div>
      </div>
      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php';
        $result = $conn->query("SELECT * FROM `supplier` WHERE 1");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent pop'>";
            echo "<div class='table-cell row'>" . $row['suppier_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['suppier_name'] . "</div>";
            echo "<div class='table-cell row'>" . $row['suppier_email'] . "</div>";
            echo "<div class='table-cell row'>" . $row['suppier_mobile'] . "</div>";
            echo "</div>";
          }
        } else echo "<div class='table-row parent'> No records found </div>";
        ?>
      </div>
    </div>
  </section>

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