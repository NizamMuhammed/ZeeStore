<?php
include("../php/DbConnect.php");
session_start();

if (isset($_GET['user_id'])) {
  $userID = $_GET['user_id'];

  $sql = "DELETE FROM orders WHERE orders_id = $userID";

  $res = mysqli_query($conn, $sql);

  if ($res == TRUE) {
    // Deletion successful
    $_SESSION['delete'] = "<div class='success'><h3>Order Deleted Successfully..!</h3></div>";
    header("location: orders.php");
  } else {
    // Deletion failed
    $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete Order..!</h3></div>";
    header("location: orders.php");
  }
} else {
  header("location: orders.php");
}
