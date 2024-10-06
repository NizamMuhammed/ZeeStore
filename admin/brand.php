<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Brands</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="brand.php" class="active">Brands</a></li>
        <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="orders.php">Orders</a></li>  <!-- Added Orders tab -->
        <li><a href="payments.php">Payments</a></li>  <!-- Added Payments tab -->
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

  <?php
require_once '../php/DbConnect.php';
$ghr = "";

// Retrieve data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get image file info
    $image = $_FILES['image']['tmp_name'];
    $iimage_type = $_FILES['image']['type'];
    $image_name = $_FILES['image']['name'];

    // Read the image as a binary string
    $image_data = addslashes(file_get_contents($image));

    // Input data to db
    $sql = "INSERT INTO `brand`(`brand_name`,`image`, `image_type`) VALUES ('" . $_POST['name'] . "','$image_data', '$iimage_type')";
    $result1 = $conn->query("SELECT * FROM brand WHERE brand_name = '" . $_POST['name'] . "';");
    
    if ($result1->num_rows > 0) {
        $ghr = "Brand already exists";
    } elseif ($conn->query($sql)) {
        $ghr = "Process successfully done";
    } else {
        $ghr = "Invalid data detected";
    }
}
  ?>

  <div class="popup <?php if ($ghr == "") echo "hide"; ?>">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <span>Inventory Managment System</span>
      <h2>Add new brand</h2>
      <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
      <div class="form-body">
        <div class="image"><img src="../svg/image.svg" class="display" /></div>
        <div class="fields">
          <div class="message <?php if ($ghr == "") echo "pop"; ?>">
            <i class="fa-solid fa-circle"></i>
            <?php echo $ghr ?>
          </div>
          <div class="inputs">
            <label>Name</label>
            <input type="text" name="name" id="" placeholder="name..." required />
          </div>
          <div class="inputs">
            <label>Logo</label>
            <input
              type="file"
              name="image"
              id="image_input"
              accept=".jpg, .jpeg, .png, .img"
              title="edit properly before uploading, transparent background"
              required />
          </div>
          <button type="submit">Submit</button>
        </div>
      </div>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>" ?>
  </div>
  <!-- popup -->

  <section
    class="hero-wrap hero-wrap-2"
    style="background-image: url('../images/shopping.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div
        class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Manage Brands</h1>
          <p class="breadcrumbs">
            <span class="mr-2">
              <a href="index.html">
                Dashboard
                <i class="ion-ios-arrow-forward"></i>
              </a>
            </span>
            <span>
              Brands
              <i class="ion-ios-arrow-forward"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- header -->

  <section class="admin-table">
    <h2>Product brand table</h2>
    <span>view and manage product brand information</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="search brand..." />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <button id="btt1">Add Brand</button>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Brand ID</div>
        <div class="table-header-data row">Name</div>
        <div class="table-header-data row">No. of Products</div>
      </div>
      <div class="table-data">
        <?php
        // Make sure this file contains a valid connection object
        require_once '../php/DbConnect.php';

        $query = "
    SELECT b.brand_id, b.brand_name, b.image, b.image_type, 
           COUNT(p.product_id) AS product_count
    FROM brand b
    LEFT JOIN products p ON b.brand_id = p.brand_id
    GROUP BY b.brand_id
";

$result = $conn->query($query);

// Check if any brands are found
if ($result->num_rows > 0) {
    // Loop through each brand and display its details in the table
    while ($row = $result->fetch_assoc()) {
        echo "<div class='table-row parent'>";
        echo "<div class='table-cell row'>" . htmlspecialchars($row['brand_id']) . "</div>";
        echo "<div class='table-cell row'>";
        echo htmlspecialchars($row['brand_name']);
        echo "<div class='logo'>";
        echo '<img src="data:' . htmlspecialchars($row['image_type']) . ';base64,' . base64_encode($row['image']) . '" alt="Image" />';
        echo "</div>";
        echo "</div>";
        echo "<div class='table-cell row'>" . htmlspecialchars($row['product_count']) . "</div>"; // Show product count
        echo "</div>";
    }
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