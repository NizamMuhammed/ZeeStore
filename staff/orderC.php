<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  require_once '../php/DbConnect.php'; // Make sure this file contains a valid connection object
  $result = $conn->query("SELECT `status` FROM `orders` WHERE `order_id` = " . $_GET['id'] . ";");
  while ($row = $result->fetch_assoc()) {
    if ($row['status'] == 'pending') $conn->query("UPDATE `orders` SET `status` = 'delevering' WHERE `orders`.`order_id` =" . $_GET['id'] . " ;");
    else if ($row['status'] == 'delevering') $conn->query("UPDATE `orders` SET `status` = 'delevered' WHERE `orders`.`order_id` = " . $_GET['id'] . ";");
  }
  header("Location:order.php");
  exit();
}
