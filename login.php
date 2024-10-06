<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Login</title>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link
    rel="icon"
    type="image/x-icon"
    href="svg/logo.png"
    media="(prefers-color-scheme: light)" />
  <link
    rel="icon"
    type="image/x-icon"
    href="svg/logo.png"
    media="(prefers-color-scheme: dark)" />
  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/aos.css" />
  <link rel="stylesheet" href="css/ionicons.min.css" />
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="css/jquery.timepicker.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/icomoon.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/style2.css" />
  <link
    rel="stylesheet"
    href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <style>
    body {
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }

    input {
      min-width: 250px;
    }

    .col-md-12,
    .col-md-12 .mt-3 {
      min-width: 0;
    }
  </style>
</head>

<body>
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php" class="active">Login</a></li>
        <li><a href="signUp.php">SignUp</a></li>
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


  <?php
  require_once './php/DbConnect.php';
  $ghr = false;

  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data and confirm with data base
    $result = $conn->query("SELECT * FROM user WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "' AND is_active = true;");
    if ($result->num_rows > 0) {

      // set session varieble username
      $_SESSION['username'] = $_POST['username'];

      // create uswer data array json
      while ($row = $result->fetch_assoc()) {
        $user_data = [
          'name' => $row['name'],
          'user_id' => $row['user_id'],
          'is_admin' => $row['is_admin'],
          'is_staff' => $row['is_staff'],
          'is_customer' => $row['is_customer']
        ];
      }
      $user_data_json = json_encode($user_data);

      // Set session variable
      if (!isset($_SESSION['username'])) {
        header("Location: login.php"); //Redirect to login page if not logged in 
        exit();
      }

      setcookie('user_data', $user_data_json, time() + (86400 * 30), "/"); // set cockie
      if ($user_data['is_admin']) header("Location: admin/dashboard.php");
      else if ($user_data['is_customer']) header("Location: index.php");
      exit();
    }
    $ghr = true;
  }
  ?>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
      <div class="row d-flex">
        <div
          class="col-md-5 ftco-animate img img-2"
          style="background-image: url(svg/logo.png)"></div>
        <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
          <div class="heading-section ftco-animate mb-5">
            <span class="subheading">Unlock Savings: </span>
            <h2 class="mb-4">Login for Exclusive Deals!</h2>
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formi" method="post">
            <div class="row">
              <?php if ($ghr) echo "<div class='message'> <i class='fa-solid fa-circle'></i> Wrong username or password </div>"; ?>
              <div class="col-md-6 form-group">
                <label>Username</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="username"
                  name="username"
                  required />
              </div>
              <div class="col-md-6 form-group"></div>
              <div class="col-md-6 form-group">
                <label>Password</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="password"
                  name="password"
                  required />
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-group">
                  <input
                    type="submit"
                    value="Login"
                    class="btn btn-primary py-3 px-5" />
                </div>
              </div>
              <div class="col-md-12 mt-3" style="margin: -50px 0;">
                <div class="form-group">
                  <p><a href="signUp.php">Sing up now</a></p>
                </div>
              </div>
            </div>
          </form>
          <?php if (isset($error)) echo "<p>$error</p>" ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Form -->

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