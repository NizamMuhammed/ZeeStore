<?php


require_once '../php/DbConnect.php';
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $dob = $_POST['day'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $usertype = $_POST['usertype'];

    // Validate if the user already exists by checking mobile, username, and email
    $result1 = $conn->query("SELECT * FROM user WHERE mobile = '" . $conn->real_escape_string($mobile) . "';");
    $result2 = $conn->query("SELECT * FROM user WHERE username = '" . $conn->real_escape_string($username) . "';");
    $result3 = $conn->query("SELECT * FROM user WHERE email = '" . $conn->real_escape_string($email) . "';");

    if ($result1->num_rows > 0) {
        $error = "Mobile number already used";
    } elseif ($result2->num_rows > 0) {
        $error = "Username already used";
    } elseif ($result3->num_rows > 0) {
        $error = "Email already used";
    } elseif ($_POST['password'] != $_POST['password2']) {
        $error = "Passwords don't match";
    } else {
        // Set user role flags based on the user type
        $is_admin = ($usertype == 'admin') ? 1 : 0;
        $is_staff = ($usertype == 'Staff') ? 1 : 0;
        $is_customer = ($usertype == 'customer') ? 1 : 0;

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       // Prepare an SQL query to insert the new user into the database
       $stmt = $conn->prepare("INSERT INTO user (name, address, dob, username, password, email, mobile, is_active, is_admin, is_staff, is_customer) 
       VALUES (?, ?, ?, ?, ?, ?, ?, 1, ?, ?, ?)");
        $stmt->bind_param("sssssssiii", $name, $address, $dob, $username, $hashed_password, $email, $mobile, $is_admin, $is_staff, $is_customer);

        // Execute the query
        if ($stmt->execute()) {
        echo "<p>User created successfully!</p>";
        } else {
        $error = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();



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
            <h2 class="mb-4">Create User Account</h2>
          </div>
          <form action="#" class="formi" method="post">
            <div class="row">
            <div class="col-md-6 form-group">
              <label>User Type</label>
              <select name="usertype" id="usertype" placeholder="User Type"required>
                    <option value="admin">Admin</option>
                    <option value="Staff">Staff</option>
                    <option value="customer">Customer</option>
              </select>
            </div>
              
              <div class="col-md-6 form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="User Full Name" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Address</label>
                <input type="text" name="address" class=" form-control" placeholder="Address" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required />
              </div>
              <div class="col-md-6 form-group">
                <label>Contact Number</label>
                <input type="text" name="mobile" class="form-control" name="mobile"  placeholder="Contact number"required />
              </div>
              <div class="col-md-6 form-group">
                <label>Birth day</label>
                <input type="date" name="day" class="form-control" placeholder="Date of birth" required />
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
              <form action="newusercreate.php" class="formi" method="post">
                <!-- User type, name, address, email, mobile, dob, username, password fields as defined in your code -->
                <div class="col-md-12 mt-3">
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary py-3 px-5" />
                </div>
                </div>
              </form>

              
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