<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Catagory</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php" class="active">Catagory</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
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

  <!-- header -->

  <?php
require_once '../php/DbConnect.php';
$ghr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the statement to check if category exists
    $stmt = $conn->prepare("SELECT * FROM category WHERE category_name = ?");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();
    $result1 = $stmt->get_result();

    if ($result1->num_rows > 0) {
        $ghr = "Category already exists";
    } else {
        // Prepare and execute the INSERT statement
        $stmt = $conn->prepare("INSERT INTO category (category_name) VALUES (?)");
        $stmt->bind_param("s", $_POST['name']);
        
        if ($stmt->execute()) {
            $ghr = "Process successfully done";
        } else {
            // Output the error message for debugging
            $ghr = "Invalid data detected: " . $conn->error;
        }
    }
    // Close the statement
    $stmt->close();
}
?>


  <section class="admin-table">
  <br><br><h2>Product catagory table</h2>
    <span>view and manage product catagory information</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="search catagory" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="message <?php if ($ghr == "") echo "hide"; ?>">
            <i class="fa-solid fa-circle"></i>
            <?php echo $ghr ?>
          </div>
          <input
            type="text"
            pattern="[A-Za-z]+"
            title="Please enter only letters."
            name="name"
            required
            placeholder="new catagory" />
          <button type="submit">Add catagory</button>
        </form>
        <?php if (isset($error)) echo "<p>$error</p>" ?>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Catagory ID</div>
        <div class="table-header-data row">Name</div>
        <div class="table-header-data row">No. of Products</div>
      </div>
      <div class="table-data">
      <?php
require_once '../php/DbConnect.php';
$result = $conn->query("
  SELECT c.category_id, c.category_name, COUNT(p.product_id) AS product_count 
  FROM category c 
  LEFT JOIN products p ON c.category_id = p.category_id 
  GROUP BY c.category_id
");

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='table-row parent'>";
    echo "<div class='table-cell row'>" . $row['category_id'] . "</div>";
    echo "<div class='table-cell row'>" . $row['category_name'] . "</div>";
    echo "<div class='table-cell row'>" . $row['product_count'] . "</div>";
    echo "</div>";
  }
  echo '<div class="flip parent close2" style="height: 60px; line-height: 60px;"><div class="row">No items found</div></div>';
} else {
  echo "<div class='table-row parent'> No records found </div>";
}
?>

      </div>
    </div>
  </section>

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>
</body>

</html>