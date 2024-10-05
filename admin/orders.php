<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Orders</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body>
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Categories</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="orders.php" class="active">Orders</a></li>
        <li><a href="payments.php">Payments</a></li>
        <li class="user" id="user">
          <div class="circle"></div>
          <i class="fa fa-user"></i>
        </li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
      <div id="userbar">
        <li><a href="settings.php">Setting</a></li>
        <li><a href="../login.php">Logout</a></li>
      </div>
    </div>
  </nav>

  <?php
  require_once '../php/DbConnect.php'; // Database connection

  // Fetch orders from the database
  $result = $conn->query("SELECT o.order_id, p.product_name, o.quantity, o.order_date, o.status FROM orders o JOIN products p ON o.product_id = p.product_id");

  // Check if any orders are found
  ?>

  <section class="admin-table">
    <h2>Order Table</h2>
    <div class="table">
      <div class="table-header parent">
        <div class="table-header-data row">Order ID</div>
        <div class="table-header-data row">Product Name</div>
        <div class="table-header-data row">Quantity</div>
        <div class="table-header-data row">Order Date</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['order_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['product_name'] . "</div>";
            echo "<div class='table-cell row'>" . $row['quantity'] . "</div>";
            echo "<div class='table-cell row'>" . $row['order_date'] . "</div>";
            echo "<div class='table-cell row'>" . $row['status'] . "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='table-row parent'> No records found </div>";
        }
        ?>
      </div>
    </div>
  </section>

  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>
