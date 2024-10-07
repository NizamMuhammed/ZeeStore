<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Dashboard</title>
  <?php require_once '../php/styles.php' ?>
  <?php 
    require_once '../php/DbConnect.php'; // Assuming this file includes your database connection
    // Fetching data from the database

    // Query for brands
    $brands_query = "SELECT COUNT(*) as brand_count FROM brand";
    $brands_result = mysqli_query($conn, $brands_query);
    $brands_count = mysqli_fetch_assoc($brands_result)['brand_count'];

    // Query for categories
    $categories_query = "SELECT COUNT(*) as category_count FROM category";
    $categories_result = mysqli_query($conn, $categories_query);
    $categories_count = mysqli_fetch_assoc($categories_result)['category_count'];

    // Query for products
    $products_query = "SELECT COUNT(*) as product_count FROM products";
    $products_result = mysqli_query($conn, $products_query);
    $products_count = mysqli_fetch_assoc($products_result)['product_count'];

    // Query for total sales
    // Assuming you have already established the database connection with $conn

// Query to calculate total sales
$sales_query = "SELECT SUM(total) as total_sales FROM orders"; // Changed 'total_amount' to 'total'
$sales_result = mysqli_query($conn, $sales_query);

// Fetch total sales
$total_sales = mysqli_fetch_assoc($sales_result)['total_sales'];

// Handle case when there are no sales records
if (is_null($total_sales)) {
    $total_sales = 0; // Set total sales to 0 if no records found
}

// Output total sales
echo "Total Sales: " . number_format($total_sales, 2); // Format the total sales to two decimal places


    // Query for total amount collected
    $collected_query = "SELECT SUM(collected_amount) as total_collected FROM payments";
    $collected_result = mysqli_query($conn, $collected_query);
    $total_collected = mysqli_fetch_assoc($collected_result)['total_collected'];

    // Query for total customers
    $customers_query = "SELECT COUNT(*) as customer_count FROM user";
    $customers_result = mysqli_query($conn, $customers_query);
    $total_customers = mysqli_fetch_assoc($customers_result)['customer_count'];

    // Query for total orders
    $orders_query = "SELECT COUNT(*) as order_count FROM orders";
    $orders_result = mysqli_query($conn, $orders_query);
    $total_orders = mysqli_fetch_assoc($orders_result)['order_count'];

    // Query for due amount
    $due_query = "SELECT SUM(due_amount) as total_due FROM payments WHERE status = 'Pending'";
    $due_result = mysqli_query($conn, $due_query);
    $total_due = mysqli_fetch_assoc($due_result)['total_due'];


  ?>
</head>

<body>
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="dashboard.php" class="active">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Catagory</a></li>
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

  <div class="container">
    <h1>Quick view of the Marketplace</h1>

    <div class="pad">
      <div class="row">
        <div class="cell">
          <p>Number of brands (on going)</p>
          <h2><?php echo $brands_count; ?></h2>
        </div>
        <div class="cell">
          <p>Number of categories (on going)</p>
          <h2><?php echo $categories_count; ?></h2>
        </div>
        <div class="cell">
          <p>No. of unique products (available)</p>
          <h2><?php echo $products_count; ?></h2>
        </div>
      </div>
      <div class="row">
        <div class="cell half">
          <p>Total sales till date (Rs.)</p>
          <h2><?php echo number_format($total_sales, 2); ?></h2>
        </div>
        <div class="cell half">
          <p>Total amount collected (Rs.)</p>
          <h2><?php echo number_format($total_collected, 2); ?></h2>
        </div>
      </div>
      <div class="row">
        <div class="cell">
          <p>Our total customers</p>
          <h2><?php echo $total_customers; ?></h2>
        </div>
        <div class="cell">
          <p>Number of orders till date</p>
          <h2><?php echo $total_orders; ?></h2>
        </div>
        <div class="cell">
          <p>Due (amount yet to be collected)</p>
          <h2><?php echo number_format($total_due, 2); ?></h2>
        </div>
      </div>
    </div>
  </div>


  <!--quick view   

  <div class="container">
    <h1>Rising Trends</h1>
    <div class="box">
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Top Products</h1>
    <div class="box">
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
    </div>
  </div> -->

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>

</body>

</html>