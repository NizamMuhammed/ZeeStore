<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Verification</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
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

    input[type="submit"] {
      min-width: 100px;
      margin-right: 500px
    }
  </style>
</head>

<body>
  <nav>
    <a href="index.html" class="brand"> ZeeStore </a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Verification</a></li>
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
  require_once 'php/maskEmail.php';
  $ghr = "";

  // mask email
  $user_data = json_decode($_COOKIE['newUser'], true);
  $email = maskEmail($user_data['email']);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $otp = $user_data['otp'];
    if ($code != $otp) $ghr = "Wrong code inserted";
    else {
      if (array_key_exists('name', $user_data))  $sql = "INSERT INTO `user` (`name`, `address`, `dob`, `username`, `password`, `email`, `mobile`,`is_customer`) VALUES ('" . $user_data['name'] . "', '" . $user_data['address'] . "', '" . $user_data['day'] . "', '" . $user_data['uname'] . "', '" . $user_data['password'] . "', '" . $user_data['email'] . "', '" . $user_data['mobile'] . "', '1') ";
      else  $sql = "UPDATE `user` SET `password`='" . $user_data['password'] . "' WHERE `username` = '" . $user_data['uname'] . "' AND `email` = '" . $user_data['email'] . "'; ";

      if ($conn->query($sql)) {
        setcookie("newUser", $newuser_json, time() - 3600, "/");
        header("Location:login.php");
        exit();
      }
    }
  }
  ?>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-5 ftco-animate img img-2 rtt" style="background-image: url(images/verify.jpg);" />
      </div>
      <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
        <div class="heading-section ftco-animate mb-5">
          <span class="subheading">Email Verification</span>
          <h2 class="mb-4">Enter Code</h2>
          <p>We have sent a 6 digit code for <?php echo $email ?></p>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formi" method="post">
          <div class="row">
            <?php if ($ghr)  echo "<div class='message'><i class='fa-solid fa-circle'></i> $ghr </div>"; ?>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="code" pattern="\d+" placeholder="code" maxlength="6" minlength="6" required />
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