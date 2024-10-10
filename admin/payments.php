<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Payemnts</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <?php navigation(7) ?>
        <li><a href="manageaccount.php">Accounts</a></li>  
        <li class="user" id="user">
          <div class="circle"></div>
          <i class="fa fa-user"></i>
        </li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
      <div id="userbar">
        <li><a href="../login.php">Logout</a></li>
        <li><a href="newusercreate.php">Create Account</a></li>
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

 

  <section class="admin-table">
  <br><br><h2>Manage Payments</h2>
      <span>View and manage payment details</span>
    <div class="table" style="max-width:1400px; width:1300px">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="Search payments" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Payment ID</div>
        <div class="table-header-data row">Order ID</div>
        <div class="table-header-data row">Colected Ammount</div>
        <div class="table-header-data row">Due Ammount</div>
        <div class="table-header-data row">Date</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php'; // Make sure this file contains a valid connection object

        // Fetch products from the database
        $result = $conn->query("SELECT * FROM `payments`");

        // Check if any products are found
        if ($result && $result->num_rows > 0) {

          // Loop through each product and display its details in the table
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['payment_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['order_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['collected_amount'] . "</div>";
            echo "<div class='table-cell row'>" . $row['due_amount'] . "</div>";
            echo "<div class='table-cell row'>" . $row['payment_date'] . "</div>";
            echo "<div class='table-cell row'><a>" . $row['status'] . "</a></div>";
            echo "</div>";
          }
          echo '<div class="flip parent close2" style="height: 60px; line-height: 60px;"><div class="row">No items found</div></div>';
        } else echo "<div class='table-row parent'> No records found </div>";
        ?>
      </div>
    </div>
  </section>
  <!-- table -->

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>