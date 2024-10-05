<?php
session_start(); // Start the session to access session variables
require 'DBconnect.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Handle account deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM users WHERE id = ?"; // Assuming 'users' is your table name

    if ($stmt = $con->prepare($sql)) {
        // Bind the user ID to the statement
        $stmt->bind_param("i", $user_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Account deleted successfully
            session_destroy(); // Destroy the session
            header("Location: goodbye.php"); // Redirect to a goodbye or confirmation page
            exit();
        } else {
            // Error occurred during deletion
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Error preparing statement: " . $con->error;
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account Confirmation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="svg/logo2.png" media="(prefers-color-scheme: light)" />
    <link rel="icon" type="image/x-icon" href="svg/logo1.png" media="(prefers-color-scheme: dark)" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 100px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
            color: #FF6A13;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
            color: #333;
        }
        .warning {
            color: #e60000;
            font-weight: bold;
            margin-top: 20px;
        }
        .button-group {
            text-align: center;
            margin-top: 30px;
        }
        .button-group button {
            background-color: #FF6A13;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin: 0 15px;
            transition: background-color 0.3s ease;
        }
        .button-group button:hover {
            background-color: #e55b11;
        }
        .cancel-button {
            background-color: #cccccc;
        }
        .cancel-button:hover {
            background-color: #999999;
        }
    </style>
</head>
<body>


<nav>
      <a href="index.html" class="brand">Store Zee</a>
      <div>
        <ul id="navbar">
          <li><a href="#">Home</a></li>
          <li><a href="#">Signup</a></li>
          <li><a href="#">Cart</a></li>
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


<div class="container">
    <h1>Delete Account Confirmation</h1>
    <p>When you use ZeeStore, we collect and store your data to facilitate transactions with sellers and provide related services. If you choose to delete your personal account, all personal data associated with your account will be permanently deleted, and we will no longer be able to provide services to you.</p>
    
    <p><strong>Please note that the request to delete your account is irreversible and cannot be undone. We recommend you carefully consider this action before proceeding.</strong></p>
    
    <p>Additionally, this operation may invalidate other pending requests or applications associated with your account.</p>
    
    <p>Before processing your account deletion, we will assess the current status of your account. This includes reviewing whether deleting your account may impact any existing orders or legal obligations that could affect your rights or responsibilities.</p>
    
    <p class="warning">Are you sure you want to delete your account? This action is irreversible!</p>
    
    <form method="POST" action="">
        <div class="button-group">
            <button type="submit" class="delete-button" onclick="confirmDelete()">Yes, Delete My Account</button>
            <button type="button" class="cancel-button" onclick="cancelDelete()" onclick="window.location.href='settings.php'">No, Keep My Account</button>
        </div>
    </form>

    <?php if (isset($error_message)): ?>
        <p class="warning"><?php echo $error_message; ?></p>
    <?php endif; ?>

</div>

<script>
    function confirmDelete() {
        alert('Account deletion request has been submitted.');
        // Redirect or proceed with the account deletion request
    }

    function cancelDelete() {
        alert('Account deletion request has been canceled.');
        // Redirect to the previous page or account settings page
    }
</script>


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




