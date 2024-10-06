<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  require_once '../php/DbConnect.php'; // Make sure this file contains a valid connection object
  $sql2 = "UPDATE `orders` SET `status` = 'complete' WHERE `orders`.`order_id` = " . $_GET['id'] . ";";
  $conn->query($sql2);
  header("Location:orders.php");
  exit();
}
