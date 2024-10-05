<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Orders</title>
  <?php
  require_once '../php/styles.php';
  require_once '../php/DbConnect.php'; // Database connection
  ?>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #dddddd;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>

<body>
  <!-- Old Header Bar -->
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <?php navigation(6) ?>
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
  <!-- End of Header -->

  <section class="hero-wrap hero-wrap-2" style="background-image: url('../images/shopping.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Manage Orders</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="index.html">Dashboard <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Orders <i class="ion-ios-arrow-forward"></i></span>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- header -->

  <section class="admin-table">
    <h2>Product table</h2>
    <span>View and manage product details</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="Search Orders" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <button id="btt1">update</button>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Order ID</div>
        <div class="table-header-data row">Customer Name</div>
        <div class="table-header-data row">Products</div>
        <div class="table-header-data row">Quantity</div>
        <div class="table-header-data row">Amount</div>
        <div class="table-header-data row">Date</div>
        <div class="table-header-data row">Status</div>
      </div>


      <div class="table-data">
        <?php
        // Fetch orders from the database
        $result = $conn->query("SELECT * FROM orders");

        // Check if any orders are found
        if ($result && $result->num_rows > 0) {

          // Loop through each order and display its details in the table
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['customer_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['product_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['quantity'] . "</div>";
            echo "<div class='table-cell row'>" . $row['total_amount'] . "</div>";
            echo "<div class='table-cell row'>" . $row['order_date'] . "</div>";
            $status = $row['quantity'] > 0 ? 'Active <i class="fa-solid fa-circle-check" style="margin-left:5px"></i>' : 'Out of stock';
            echo "<div class='table-cell row'>" . $status . "</div>";
            echo "</div>";
          }
        } else {
          echo "<div class='table-row parent'>No orders found</div>";
        }
        ?>
      </div>
    </div>
  </section>

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>