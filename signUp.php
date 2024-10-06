<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Sign Up</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
  <nav>
    <a href="index.html" class="brand"> ZeeStore </a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php" class="active">SignUp</a></li>
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
  require_once 'php/DbConnect.php';
  require_once 'php/sendMail.php';
  $ghr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result1 = $conn->query("SELECT * FROM user WHERE mobile = '" . $_POST['mobile'] . "' ;");
    $result2 = $conn->query("SELECT * FROM user WHERE username = '" . $_POST['uname'] . "';");
    $result3 = $conn->query("SELECT * FROM user WHERE email = '" . $_POST['email'] . "';");

    if ($result1->num_rows > 0)  $ghr = "Mobile nomber already used";
    elseif ($result2->num_rows > 0)  $ghr = "Username already used";
    elseif ($result3->num_rows > 0)  $ghr = "Email already used";
    elseif ($_POST['password'] != $_POST['password2'])  $ghr = "Passwords don't match";
    else {
      $newuser = [
        "name" => $_POST['name'],
        "address" => $_POST['address'],
        "mobile" => $_POST['mobile'],
        "email" => $_POST['email'],
        "day" => $_POST['day'],
        "uname" => $_POST['uname'],
        "otp" => "" . rand(99999, 999999),
        "password" => $_POST['password']
      ];
      $body = "Hi " . $_POST['name'] . ",<br/><br/>

              Thank you for signing up with ZeeStore! To complete your registration, please enter the One-Time Password (OTP) below:<br/><br/>
              
              <b>Your OTP Code: " . $newuser['otp'] . "</b><br/><br/>
              
              This code is valid for the next 10 minutes. If you did not request this code, please ignore this email.<br/><br/>
              
              If you encounter any issues or need further assistance, feel free to reach out to our support team at galleryCafe@gmail.com .<br/><br/>
              
              Welcome aboard!<br/><br/>
              
              Best regards,";
      $newuser_json = json_encode($newuser);
      setcookie("newUser", $newuser_json, time() + 3600, "/");
      sendMail($_POST['email'], $_POST['name'], 'Email Verification', $body);
      header("Location: verification.php");
    }
  }

  ?>
  <section class="ftco-section ftco-no-pt ftco-no-pb" style="margin: 93px 0">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-5 ftco-animate img img-2" style="background-image: url(svg/logo.png)"></div>
        <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
          <div class="heading-section ftco-animate mb-5">
            <span class="subheading">Sign up for Exclusive Discounts!</span>
            <h2 class="mb-4">Create a new account</h2>
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formi" method="post">
            <div class="row">
              <?php if ($ghr) echo "<div class='message'><i class='fa-solid fa-circle'></i>$ghr</div>"; ?>
              <div class="col-md-6 form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="name" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Address</label>
                <input type="text" name="address" class=" form-control" placeholder="address" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Contact Number</label>
                <input type="text" minlength="9" maxlength="10" pattern="\d+" title="Only Numbers ( 0-9 )" class="form-control" name="mobile" placeholder="mobile" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Birth day</label>
                <input type="date" name="day" class="form-control" placeholder="Date" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="email" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="uname" placeholder="username" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="password" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Retype password</label>
                <input type="password" name="password2" class="form-control" placeholder="retype password" required />
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-primary py-3 px-5" />
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
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
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