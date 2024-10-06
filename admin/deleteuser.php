<?php
include("../php/DbConnect.php");
session_start();

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];
    
    $sql = "DELETE FROM user WHERE user_id = $userID";
    
    $res = mysqli_query($conn, $sql);
    
    if ($res == TRUE) {
        // Deletion successful
        $_SESSION['delete'] = "<div class='success'><h3>User Deleted Successfully..!</h3></div>";
        header("location: manageaccount.php");
    } else {
        // Deletion failed
        $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete User..!</h3></div>";
        header("location: manageaccount.php");
    }
} else {
    header("location: manageaccount.php");
}
?>