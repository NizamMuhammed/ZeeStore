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

  <section
    class="hero-wrap hero-wrap-2"
    style="background-image: url('../images/shopping.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div
        class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Manage Product Catagorise</h1>
          <p class="breadcrumbs">
            <span class="mr-2">
              <a href="index.html">
                Dashboard
                <i class="ion-ios-arrow-forward"></i>
              </a>
            </span>
            <span>
              Catagory
              <i class="ion-ios-arrow-forward"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- header -->

  <?php
  require_once '../php/DbConnect.php';
  $ghr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO `category`(`category_name`) VALUES ('" . $_POST['name'] . "')";
    $result1 = $conn->query("SELECT * FROM category WHERE category_name = '" . $_POST['name'] . "' ;");
    if ($result1->num_rows > 0)  $ghr = "Catagory already exists";
    elseif ($conn->query($sql)) {
      $ghr = "Process successfully done";
    } else $ghr = "Invalid data detected";
  }
  ?>

  <section class="admin-table">
    <h2>Product catagory table</h2>
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
        <div class="table-header-data row">NO_Products</div>
      </div>
      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php';
        $result = $conn->query("SELECT * FROM `category` WHERE 1; ");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            echo "<div class='table-cell row'>" . $row['category_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['category_name'] . "</div>";
            echo "<div class='table-cell row'>" . 20 . "</div>";
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