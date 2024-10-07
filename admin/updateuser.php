<?php
include("../php/DbConnect.php");
session_start();


if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];
    
    $sql = "SELECT * FROM user WHERE user_id = $userID";
    $res = mysqli_query($conn, $sql);
    
    if ($res == TRUE) {
        $row = mysqli_fetch_assoc($res);
        
        $userName = $row["name"];
        $address = $row["address"];
        $userEmail = $row["email"];
        $userCNum = $row["mobile"];
        $bod = $row["dob"];

    }
}

if (isset($_POST['submit'])) {
    $userName = $_POST['name'];
    $address = $_POST['address'];
    $userEmail = $_POST['email'];
    $userCNum = $_POST['mobile'];
    $bod = $_POST['day'];
    
    $sql = "UPDATE user SET
            name = '$userName',
            address = '$address',
            email = '$userEmail',
            mobile = '$userCNum',
            dob = '$bod'
            WHERE user_id = $userID";
    
    $res = mysqli_query($conn, $sql);
    
    if ($res == TRUE) {
        // Update successful
        $_SESSION['update'] = "<div class='success'><h3>User Updated Successfully..!</h3></div>";
        header("location: manageaccount.php");
    } else {
        // Update failed
        $_SESSION['update'] = "<div class='error'><h3>Failed to Update User..!</h3></div>";
        header("location: manageaccount.php");
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore-Update User Details</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php require_once '../php/styles.php' ?>
</head>

<style>
    
</style>

<body>
<nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
        <li><a href="product.php" class="active">Products</a></li>
        <li><a href="orders.php">Orders</a></li>  <!-- Added Orders tab -->
        <li><a href="payments.php">Payments</a></li>  <!-- Added Payments tab -->
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



  <section class="ftco-section ftco-no-pt ftco-no-pb" style="margin: 93px 0">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-5 ftco-animate img img-2" style="background-image: url(../svg/logo.png)"></div>
        <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
          <div class="heading-section ftco-animate mb-5">
            <h2 class="mb-4">User Account Update</h2>
          </div>
          <form action="#" class="formi" method="post">
            <div class="row">
              <div class="col-md-6 form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $userName; ?>" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Address</label>
                <input type="text" name="address" class=" form-control" value="<?php echo $address; ?>" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $userEmail; ?>" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Contact Number</label>
                <input type="text" name="mobile" class="form-control" name="mobile" placeholder="mobile" value="<?php echo $userCNum; ?>"required />
              </div>
              <div class="col-md-6 form-group">
                <label>Birth day</label>
                <input type="date" name="day" class="form-control" value="<?php echo $bod; ?>" required />
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-group">
                <input type="hidden" name="user_id" value="<?php echo $userID; ?>">
                <input type="submit" name="submit" value="Update User" class="btn-secondary1">
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

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>