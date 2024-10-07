<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Orders</title>
  <?php require_once '../php/styles.php'; ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.php" class="brand">
      <img src="../svg/logo.png" alt="ZeeStore Logo" class="logo" />
      ZeeStore
    </a>

    <style>
      .brand {
        display: flex;
        align-items: center;
      }

      .logo {
        width: 60px;
        height: auto;
        margin-right: 8px;
      }
    </style>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="order.php" class="active">Orders</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li class="user" id="user">
          <div class="circle"></div>
          <i class="fa fa-user"></i>
        </li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
      <div id="userbar">
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
  <section class="customer-order-status">
    <br><br><br>
    <h2 style="text-align: center;">Your Order Status</h2>
    <h5 style="text-align: center;">View the status of your ordered products</h5>
    <div class="table" style="max-width:1400px; width:1100px">
      <div class="table-header parent">
        <div class="table-header-data row">Order ID</div>
        <div class="table-header-data row">Total Price</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php';

        $user_data = json_decode($_COOKIE['user_data'], true);
        $user_id = $user_data['user_id'];

        // Fetch order status from the database
        $result = $conn->query("SELECT order_id, total, status FROM orders where customer_id = $user_id");

        // Check if any orders are found
        if ($result && $result->num_rows > 0) {
          // Loop through each order and display its details in the table
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . htmlspecialchars($row['order_id']) . "</div>";
            echo "<div class='table-cell row'>Rs." . number_format((float)$row['total'], 2, '.', '') . "</div>";
            echo "<div class='table-cell row'>" . htmlspecialchars($row['status']) . "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='table-row parent'>No orders found</div>";
        }
        ?>
      </div>
    </div>
  </section>

  <?php require_once '../php/loader.php'; ?>
  <?php require_once '../php/javaScripts.php'; ?>
</body><br>
<?php include '../footer.php'; ?>

</html>