<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Payments</title>
  <?php 
  require_once '../php/styles.php'; 
  require_once '../php/DbConnect.php'; // Database connection
  ?>
</head>

<body>
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Category</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="payments.php" class="active">Payments</a></li>
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

  <div class="container">
    <h1>Payments Management</h1>

    <table>
      <thead>
        <tr>
          <th>Payment ID</th>
          <th>Order ID</th>
          <th>Collected Amount (Rs.)</th>
          <th>Due Amount (Rs.)</th>
          <th>Payment Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $payments_query = "SELECT * FROM payments";
        $payments_result = mysqli_query($conn, $payments_query);

        while ($row = mysqli_fetch_assoc($payments_result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['order_id']}</td>
                    <td>{$row['collected_amount']}</td>
                    <td>{$row['due_amount']}</td>
                    <td>{$row['payment_date']}</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>
