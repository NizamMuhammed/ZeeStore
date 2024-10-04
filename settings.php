<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Settings Page</title>
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 120px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5); /* Dark background with opacity */
        }

        .modal-content {
            background-color: #fff; /* White background for the modal */
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border-radius: 20px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 500px; /* Maximum width for larger screens */
        }

        h2 {
            font-size: 1.8em; /* Larger title font size */
            color: #FF6A13; /* Orange color for title */
        }

        label {
            font-weight: bold; /* Bold labels */
        }

        input[type="text"], input[type="email"], input[type="file"], input[type="date"] {
            width: 100%;
            padding: 5px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em; /* Increased font size for better readability */
        }

        select{
            width: 100%;
            padding: 5px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em; /* Increased font size for better readability */
        }

        button {
            background-color: #FF6A13; /* Button background color */
            color: #fff; /* Button text color */
            padding: 10px 20px; /* Button padding */
            border: none; /* Remove border */
            border-radius: 10px; /* Rounded button corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 1.1em; /* Slightly larger font for button */
        }

        button:hover {
            background-color: #e55b11; /* Darker shade on hover */
        }

    
        .section li {
            margin-bottom: 0; /* Remove bottom margin */
        }

        .section ul li::before {
            content: "\2022"; /* Unicode for bullet */
            color: #FF6A13;  /* Orange color for the bullet */
            font-weight: bold; /* Make the bullet bold */
            display: inline-block; 
            width: 1em; /* Space between bullet and text */
            margin-left: -1em; /* Adjust the position */
        }

        a {
            text-decoration: none; /* Remove underline */
            color: #0066cc; /* Link color */
        }

        a:hover {
            text-decoration: none; /* Underline on hover */
        }

    </style>
</head>

<body style="margin-top: -30px">

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
          <li><a href="aboutus.html">About Us</a></li>
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
        <h1>Settings</h1>
        
        <section class="section">
            <h2>Personal information</h2>
            <ul>
                <li><a href="#" id="uploadPictureBtn">Upload picture</a></li>
                <li><a href="#" id="editProfileBtn">Edit profile</a></li>
                <li><a href="#" id="editAddressBtn">Address/Location</a></li>
                <li><a href="deleteacc.php">Delete account</a></li>
            </ul>
        </section>
        
        <section class="section">
            <h2>Security Information</h2>
            <ul>
                <li><a href="#">Change password</a></li>
            </ul>
        </section>
    
    </div>

    <?php
include("DBconnect.php");

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];
    
    $sql = "SELECT * FROM user WHERE user_id = $userID";
    $res = mysqli_query($con, $sql);
    
    if ($res == TRUE) {
        $row = mysqli_fetch_assoc($res);
        
        $userName = $row["name"];
        $userEmail = $row["email"];
        $dob = $row["dob"];
        $userCNum = $row["mobile"];
    }
}

if (isset($_POST['submit'])) {
    $userID = $_POST['userID'];
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $dob = $_POST['date'];
    $userCNum = $_POST['contact'];
    
    $sql = "UPDATE user SET
            name = '$userName',
            email = '$userEmail',
            dob = '$dob',
            mobile = '$userCNum'
            WHERE userID = $userID";
    
    $res = mysqli_query($con, $sql);
    
    if ($res == TRUE) {
        // Update successful
        //  $_SESSION['update'] = "<div class='success'><h3>User Updated Successfully..!</h3></div>";
      echo("<h3>User Updated Successfully....!</h3>");
        header("location: usersmanage.php");
    } else {
        // Update failed
        $_SESSION['update'] = "<div class='error'><h3>Failed to Update User..!</h3></div>";
        header("location: usersmanage.php");
    }
}
?>

    <!-- Modal for Edit Profile -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Profile</h2>
            <form id="editProfileForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name..." required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email..." required>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" placeholder="Enter your Birth of date..." required>
                
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" placeholder="Enter your contact number..." required>
                
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Modal for Upload Picture -->
    <div id="uploadPictureModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeUploadModal">&times;</span>
            <h2>Upload Picture</h2>
            <form id="uploadPictureForm">
                <label for="picture">Select a picture:</label>
                <input type="file" id="picture" name="picture" accept="image/*" required>
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>

    <!-- Modal for Edit Address -->
<div id="editAddressModal" class="modal">
    <div class="modal-content">
    <span class="close" id="closeAddressModal">&times;</span>
        <h2>Edit Address</h2>
        <form id="editAddressForm">
            <label for="region">Select Region:</label>
            <select id="district" name="district" required>
                <option value="Southern" selected>Southern</option>
                <option value="Western" selected>Western</option>
                <option value="Northern" selected>Northern</option>
            </select>
            <label for="district">Select District:</label>
            <select id="district" name="district" required>
                <option value="Hambantota">Hambantota</option>
                <option value="Galle">Galle</option>
                <option value="Matara">Matara</option>
            </select>
            <label for="city">Select City:</label>
            <input type="text" id="city" name="city" placeholder="your city..." required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>

            <label for="code">Postal Code:</label>
            <input type="text" id="code" name="code" placeholder="Enter your postal code" required>
            <button type="submit">Save Address</button>
            <!-- <button type="button" id="closeAddressModal">Close</button> -->
        </form>
    </div>
</div>

<!-- <script>
    // Get modal elements
    const editAddressModal = document.getElementById("editAddressModal");
    
    // Get button elements
    const editAddressBtn = document.getElementById("editAddressBtn");

    
    // Get close button elements
    const closeAddressModal = document.getElementById("closeAddressModal");
    
    // Show Edit Address Modal
    editAddressBtn.onclick = function () {
        editAddressModal.style.display = "block";
    };
    
    
    // Close Edit Address Modal
    closeAddressModal.onclick = function () {
        editAddressModal.style.display = "none";
    };
    
    
    // Close modal when clicking outside of it
    window.onclick = function (event) {
        if (event.target == editAddressModal) {
            editAddressModal.style.display = "none";
        }
    };
</script> -->


    <script>
        // Get the modals
        var editModal = document.getElementById("editProfileModal");
        var uploadModal = document.getElementById("uploadPictureModal");
        var editAddressModal = document.getElementById("editAddressModal");

        // Get the buttons that open the modals
        var editBtn = document.getElementById("editProfileBtn");
        var uploadBtn = document.getElementById("uploadPictureBtn");
        var editAddressBtn = document.getElementById("editAddressBtn");

        // Get the <span> elements that close the modals
        var closeEditModal = document.getElementsByClassName("close")[0];
        var closeUploadModal = document.getElementById("closeUploadModal");
        var closeAddressModal = document.getElementById("closeAddressModal");

        // When the user clicks the Edit Profile button, open the modal 
        editBtn.onclick = function() {
            editModal.style.display = "block";
        }

        // When the user clicks the Upload Picture button, open the modal 
        uploadBtn.onclick = function() {
            uploadModal.style.display = "block";
        }

        // Show Edit Address Modal
        editAddressBtn.onclick = function () {
            editAddressModal.style.display = "block";
        };

        // When the user clicks on <span> (x), close the edit modal
        closeEditModal.onclick = function() {
            editModal.style.display = "none";
        }

        // When the user clicks on <span> (x), close the upload modal
        closeUploadModal.onclick = function() {
            uploadModal.style.display = "none";
        }

        // Close Edit Address Modal
        closeAddressModal.onclick = function () {
            editAddressModal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
            if (event.target == uploadModal) {
                uploadModal.style.display = "none";
            }
            if (event.target == editAddressModal) {
            editAddressModal.style.display = "none";
        }
        }

        // Handle form submission for edit profile (for demonstration purposes)
        document.getElementById("editProfileForm").onsubmit = function(e) {
            e.preventDefault(); // Prevent the form from submitting
            alert("Profile updated successfully!");
            editModal.style.display = "none"; // Close the modal
        }

        // Handle form submission for upload picture (for demonstration purposes)
        document.getElementById("uploadPictureForm").onsubmit = function(e) {
            e.preventDefault(); // Prevent the form from submitting
            alert("Picture uploaded successfully!");
            uploadModal.style.display = "none"; // Close the modal
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