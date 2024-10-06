<!DOCTYPE html>
<html lang="en">
<head>
  <title>ZeeStore - Orders</title>
  <?php require_once '../php/styles.php'; ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
            <ul id="navbar">
                <li><a href="index.php" >Home</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="cart.php" class="active">Cart</a></li>
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
  
  

      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php';
        // Fetch orders from the database
        $result = $conn->query("SELECT * FROM orders");

        // Check if any orders are found
        if ($result && $result->num_rows > 0) {
          // Loop through each order and display its details in the table
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['order_id'] . "</div>";
            echo "<div class='table-cell row'>" . htmlspecialchars($row['address']) . "</div>";
            echo "<div class='table-cell row'>" . htmlspecialchars($row['phone']) . "</div>";
            echo "<div class='table-cell row'>" . number_format((float)$row['total'], 2, '.', '') . "</div>";
            echo "<div class='table-cell row'>" . date('Y-m-d H:i:s', strtotime($row['order_date'])) . "</div>";
            echo '<div class="table-cell row"><a href="orderC.php?id=' . $row['order_id'] . '">' . htmlspecialchars($row['status']) . '</a></div>';
            echo '<div class="table-cell row"><a href="deleteOrder.php?id=' . $row['order_id'] . '" onclick="return confirm(\'Are you sure you want to delete this order?\');">Delete</a></div>';
            echo "</div>";
          }
        } else {
          echo "<div class='table-row parent'>No records found</div>";
        }
        ?>
      </div>
    </div>
  </section>
  
  <section class="customer-order-status">
    <br><br>
    <h2>Your Order Status</h2>
    <span>View the status of your ordered products</span>
    <div class="table" style="max-width:1400px; width:1100px">
      <div class="table-header parent">
        <div class="table-header-data row">Order ID</div>
        <div class="table-header-data row">Total Price</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        // Fetch order status from the database
        $result = $conn->query("SELECT order_id, total, status FROM orders");

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
</body>
</html>
