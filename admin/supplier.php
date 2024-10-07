<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Suppliers</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php" class="active">Suppliers</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="orders.php">Orders</a></li>  <!-- Added Orders tab -->
        <li><a href="payments.php">Payments</a></li>  <!-- Added Payments tab -->
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

  <?php
  require_once '../php/DbConnect.php';
  $ghr = "";

  // retreve data if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // input data to db
    $sql = "INSERT INTO `supplier`(`suppier_name`, `suppier_email`, `suppier_mobile`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['mobile'] . "')";
    try {
      $conn->query($sql);
      $ghr = "Process successfully done";
    } catch (\Throwable $th) {
      $ghr = "Invalid data detected";
    }
  }
  ?>

  <div class="popup <?php if ($ghr == "") echo "hide"; ?>">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="min-width: 600px">
      <span>Inventory Managment System</span>
      <h2>Add new supplier</h2>
      <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
      <div
        class="form-body"
        style="flex-direction: column; align-items: flex-start">
        <div class="message <?php if ($ghr == "") echo "pop"; ?>" style="margin: -12px 0">
          <i class="fa-solid fa-circle"></i>
          <?php echo $ghr ?>
        </div>
        <div class="fields">
          <div class="inputs">
            <label>Name</label>
            <input type="text" name="name" placeholder="name..." required />
          </div>
          <div class="inputs">
            <label>Email</label>
            <input type="email" name="email" placeholder="email..." required />
          </div>
          <div class="inputs">
            <label>Mobile</label>
            <input type="tel" name="mobile" placeholder="mobile..." maxlength="14" pattern="\d+" required />
          </div>
        </div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
  <!-- popup -->
  <section class="admin-table">
  <br><br><h2>Manage Suppliers</h2>
      <span>view and manage supplier information</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="search supplier" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <button id="btt1">Add supplier</button>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Supplier ID</div>
        <div class="table-header-data row">Name</div>
        <div class="table-header-data row">E-mail</div>
        <div class="table-header-data row">Mobile</div>
      </div>
      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php';
        $result = $conn->query("SELECT * FROM `supplier` WHERE 1");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent pop'>";
            echo "<div class='table-cell row'>" . $row['suppier_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['suppier_name'] . "</div>";
            echo "<div class='table-cell row'>" . $row['suppier_email'] . "</div>";
            echo "<div class='table-cell row'>" . $row['suppier_mobile'] . "</div>";
            echo "</div>";
          }
          echo '<div class="flip parent close2" style="height: 60px; line-height: 60px;"><div class="row">No items found</div></div>';
        } else echo "<div class='table-row parent'> No records found </div>";
        ?>
      </div>
    </div>
  </section>

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>