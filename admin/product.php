<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Product</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body style="margin-top: -30px">
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
        <li><a href="product.php" class="active">Products</a></li>
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
  require_once '../php/DbConnect.php'; // Make sure this file contains a valid connection object

  $ghr = ""; // Message variable for feedback

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get image file info
    $image = $_FILES['image']['tmp_name'];
    $iimage_type = $_FILES['image']['type'];
    $image_name = $_FILES['image']['name'];

    // Read the image as a binary string
    $image_data = addslashes(file_get_contents($image));

    // input data to db
    $sql = "INSERT INTO `products`(`product_name`, `brand_id`, `category_id`, `description`, `price`, `quantity`, `image`, `image_type`) 
            VALUES ('" . $_POST['product_name'] . "','" . $_POST['brand_id'] . "','" . $_POST['category_id'] . "','" . $_POST['description'] . "','" . $_POST['price'] . "','" . $_POST['quantity'] . "','$image_data','$iimage_type')";

    $result1 = $conn->query("SELECT * FROM products WHERE product_name = '" . $_POST['product_name'] . "' ;");
    if ($result1->num_rows > 0)  $ghr = "Product already exists";
    elseif ($conn->query($sql)) {
      $ghr = "Process successfully done";
    } else $ghr = "Invalid data detected";
  }
  ?>

  <div class="popup <?php if ($ghr == "") echo "hide"; ?>">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" style="width: 1140px">
      <span>Inventory Managment System</span>
      <h2>Add new product</h2>
      <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
      <div class="form-body">
        <div class="image" style="height: 510px">
          <img
            src="../svg/image.svg"
            class="display"
            style="max-width: 420px; max-height: 420px" />
        </div>
        <div class="fields">
          <!-- Display any messages -->
          <div class="message <?php if ($ghr == "") echo "pop"; ?>">
            <i class="fa-solid fa-circle"></i>
            <?php echo htmlspecialchars($ghr); ?>
          </div>

          <div class="fields" style="width: 580px">
            <div class="inputs">
              <label for="product_name">Product Name</label>
              <input type="text" name="product_name" id="product_name" placeholder="Product name..." required />
            </div>

            <div class="inputs">
              <label for="price">Price</label>
              <input type="number" step="0.01" name="price" id="price" placeholder="Enter product price" required />
            </div>

            <div class="inputs">
              <label for="brand">Brand</label>
              <select name="brand_id" id="brand" required>
                <?php
                // Fetching brands from the database
                $result = $conn->query("SELECT brand_id, brand_name FROM brand");
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="inputs">
              <label for="category">Category</label>
              <select name="category_id" id="category" required>
                <?php
                // Fetching categories from the database
                $result = $conn->query("SELECT category_id, category_name FROM category");
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="inputs">
              <label>Quantity</label>
              <input type="text" name="quantity" pattern="\d+" title="Only Numbers ( 0-9 )" id="" placeholder="name..." required />
            </div>
            <div class="inputs">
              <label>Product image</label>
              <input
                type="file"
                name="image"
                id="image_input"
                accept=".jpg, .jpeg, .png, .img"
                title="edit properly before uploading"
                required />
            </div>
            <div class="inputs">
              <label>Description</label>
            </div>
          </div>
          <textarea
            name="description"
            id=""
            rows="3"
            cols="64"
            placeholder="Enter product description"
            required
            style="
                margin-top: 20px;
                background: #fff !important;
                color: #000000 !important;
                font-size: 16px;
                max-width:530px ;
                border-radius: 2px;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: 1px solid rgba(0, 0, 0, 0.1);
                margin-bottom: 2rem;
                padding: 6px 0 0 6px;
                outline: none;
                resize: none;
              "></textarea>
          <button type="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <!-- popup -->
<section class="admin-table">
<br><br><h2>Manage Product</h2>
    <span>View and manage product details</span>
    <div class="table">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="Search product" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <button id="btt1">Add product</button>
      </div>
      <div class="table-header parent">
        <div class="table-header-data row">Product ID</div>
        <div class="table-header-data row">Name</div>
        <div class="table-header-data row">Quantity</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        // Fetch products from the database
        $result = $conn->query("SELECT * FROM products");

        // Check if any products are found
        if ($result && $result->num_rows > 0) {

          // Loop through each product and display its details in the table
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['product_id'] . "</div>";
            echo "<div class='table-cell row'>";
            echo $row['product_name'];
            echo "<div class='logo'>";
            echo '<img src="data:' . $row['image_type'] . ';base64,' . base64_encode($row['image']) . '" alt="Image" />';
            echo "</div>";
            echo "</div>";
            echo "<div class='table-cell row'>" . $row['quantity'] . "</div>";
            $status = $row['quantity'] > 0 ? 'Active<i class="fa-solid fa-circle-check" style="margin-left:5px"></i>' : 'Out ofstock'; // Set product status
            echo '<div class="table-cell row"><a>' . $status . '</a></div>';
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