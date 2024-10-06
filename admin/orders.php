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
        <?php navigation(6); ?>
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

  <section class="hero-wrap hero-wrap-2" style="background-image: url('../images/shopping.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Manage Product Orders</h1>
          <p class="breadcrumbs">
            <span class="mr-2">
              <a href="index.html">
                Dashboard
                <i class="ion-ios-arrow-forward"></i>
              </a>
            </span>
            <span>
              Orders
              <i class="ion-ios-arrow-forward"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- header -->

  <section class="admin-table">
        <h2>Product Orders Table</h2>
        <span>View and manage product orders details</span>
        <div class="table" style="max-width:1400px; width:1100px">
            <div class="searchAddS">
                <section class="search">
                    <input type="text" id="search" placeholder="Search orders" />
                    <button id="search-bt">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </section>
                <button id="btt1">Update</button>
            </div>
            <div class="table-header parent">
                <div class="table-header-data row">Order ID</div>
                <div class="table-header-data row">Customer Name</div>
                <div class="table-header-data row">Address</div>
                <div class="table-header-data row">Phone</div>
                <div class="table-header-data row">Total</div>
                <div class="table-header-data row">Order Date</div>
                <div class="table-header-data row">Status</div>
                <div class="table-header-data row">Action</div> <!-- Added Action column -->
            </div>

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

                        // Fetch customer name based on customer_id
                        if (isset($row['customer_id'])) {
                            $result2 = $conn->query("SELECT name FROM user WHERE user_id = " . (int)$row['customer_id']);
                            if ($row2 = $result2->fetch_assoc()) {
                                echo "<div class='table-cell row'>" . htmlspecialchars($row2['name']) . "</div>";
                            } else {
                                echo "<div class='table-cell row'>Unknown Customer</div>";
                            }
                        } else {
                            echo "<div class='table-cell row'>No Customer ID</div>";
                        }

                        // Display other order details
                        echo "<div class='table-cell row'>" . htmlspecialchars($row['address']) . "</div>";
                        echo "<div class='table-cell row'>" . htmlspecialchars($row['phone']) . "</div>";
                        echo "<div class='table-cell row'>" . number_format((float)$row['total'], 2, '.', '') . "</div>"; // Format total amount
                        echo "<div class='table-cell row'>" . date('Y-m-d H:i:s', strtotime($row['order_date'])) . "</div>";
                        echo '<div class="table-cell row"><a href="orderC.php?id=' . $row['order_id'] . '">' . htmlspecialchars($row['status']) . '</a></div>';
                        echo '<div class="table-cell row"><a href="deleteOrder.php?id=' . $row['order_id'] . '" onclick="return confirm(\'Are you sure you want to delete this order?\');">Delete</a></div>'; // Action links
                        echo "</div>";
                    }
                } else {
                    echo "<div class='table-row parent'>No records found</div>";
                }
                ?>
            </div>
        </div>
    </section>
  <!-- table -->

  <?php require_once '../php/loader.php'; ?>
  <?php require_once '../php/javaScripts.php'; ?>
</body>

</html>
