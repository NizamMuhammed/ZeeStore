<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Payments</title>
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
      </div>
    </div>
  </nav>

  <?php
  require_once '../php/DbConnect.php'; // Database connection

  // Fetch payments from the database
  $result = $conn->query("SELECT p.payment_id, o.order_id, p.amount, p.payment_method, p.payment_date, p.status FROM payments p JOIN orders o ON p.order_id = o.order_id");

  // Check if any payments are found
  ?>

  <section class="admin-table">
    <h2>Payment Table</h2>
    <div class="table">
      <div class="table-header parent">
        <div class="table-header-data row">Payment ID</div>
        <div class="table-header-data row">Order ID</div>
        <div class="table-header-data row">Amount</div>
        <div class="table-header-data row">Payment Method</div>
        <div class="table-header-data row">Payment Date</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['payment_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['order_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['amount'] . "</div>";
            echo "<div class='table-cell row'>" . $row['payment_method'] . "</div>";
            echo "<div class='table-cell row'>" . $row['payment_date'] . "</div>";
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
