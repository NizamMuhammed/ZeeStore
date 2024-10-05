<?php
// DBconnect.php

// Database connection parameters
$servername = "localhost";
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "zee_store";    // Replace with your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    // Instead of mysqli_connect_errno(), you can use $conn->connect_errno
    die("Connection failed: " . $con->connect_error);
}

// Optionally check for connection errors
if ($con->connect_errno) {
    echo "Connection error: " . $con->connect_errno; // This will show the error code
    exit();
}

// Your further code here

?>
