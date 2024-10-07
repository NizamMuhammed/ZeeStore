<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Account - Manage</title>
  <?php require_once '../php/styles.php' ?>
  <?php
	session_start();
?>
</head>
<style>
    /* CSS for Edit and Delete links */
.table-cell a {
    padding: 10px 15px;
    margin: 5px;
    text-decoration: none;
    color: white; /* Default text color to white */
    border-radius: 5px;
    font-weight: bold;
}

.table-cell a:hover {
    opacity: 0.8; /* Slight opacity change on hover */
}

/* Specific style for Edit (Green) */
.table-cell a[href*='updateuser.php'] {
    background-color: #28a745; /* Green color */
}

/* Specific style for Delete (Red) */
.table-cell a[href*='deleteuser.php'] {
    background-color: #dc3545; /* Red color */
}

</style>

<body style="margin-top: -30px">
<nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="brand.php">Brands</a></li>
        <li><a href="catagory.php">Catagory</a></li>
        <li><a href="supplier.php">Suppliers</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="orders.php">Orders</a></li>  <!-- Added Orders tab -->
        <li><a href="payments.php">Payments</a></li>  <!-- Added Payments tab -->
        <li><a href="manageaccount.php" class="active">Accounts</a></li>  
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
    <br><br><h2>Users Table</h2>
    <span>View And Manage User Details</span>
    <div class="table" style="max-width:1400px; width:1300px">
      <div class="searchAddS">
        <section class="search">
          <input type="text" id="search" placeholder="Search User Name" />
          <button id="search-bt">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </section>
        <div>
            <?php
                    if(isset($_SESSION['create']))
                    {
                    echo $_SESSION['create'];
                    unset($_SESSION['create']);
                    }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
        </div>
        <button id="btt1">Add New User</button>
      </div>
      <div class="table-header parent">
        <!-- <div class="table-header-data row">User ID</div> -->
        <div class="table-header-data row">User Name</div>
        <div class="table-header-data row">Email</div>
        <div class="table-header-data row">Address</div>
        <div class="table-header-data row">Contact</div>
        <div class="table-header-data row">Status</div>
      </div>

      <div class="table-data">
        <?php
        require_once '../php/DbConnect.php'; // Make sure this file contains a valid connection object

        // Fetch products from the database
        $result = $conn->query("SELECT * FROM `user`");

        // Check if any products are found
        if ($result && $result->num_rows > 0) {

          // Loop through each product and display its details in the table
          while ($row = $result->fetch_assoc()) {
            echo "<div class='table-row parent'>";
            // echo "<div class='table-cell row'>" . $row['user_id'] . "</div>";
            echo "<div class='table-cell row'>" . $row['name'] . "</div>";
            echo "<div class='table-cell row'>" . $row['email'] . "</div>";
            echo "<div class='table-cell row'>" . $row['address'] . "</div>";
            echo "<div class='table-cell row'>" . $row['mobile'] . "</div>";
    

      // Add the Edit & Delete link
      echo "<div class='table-cell row'>";
      echo "<a href='updateuser.php?user_id=" . $row['user_id'] . "' onclick='return confirm(\"Are you sure you want to Edit this user?\")'>Edit</a>";
      echo "<a href='deleteuser.php?user_id=" . $row['user_id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>";
      echo "</div>";

                
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
  <script>
    document.getElementById("btt1").addEventListener("click", function() {
        window.location.href = "newusercreate.php";
    });
</script>

</body>

</html>