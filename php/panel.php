<?php
function panel($name, $id)
{
  echo '<div class="container">';
  echo "<h1>$name</h1>";
  echo '<div class="box">';

  //connect with DB
  $conn = mysqli_connect("localhost", "root", "", "zee_store");

  //check the connection  
  if (mysqli_connect_errno()) {
    echo "faild to connect with database!" . $conn->connect_errno;
    die("retry");
  }

  // Get the search query if it exists
  $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

  // Prepare a SQL query based on the search input
  if ($searchQuery) {
    // Search in both product_name and brand (assuming brand_id relates to a brand name or there's a brand table)
    $stmt = $conn->prepare("
        SELECT products.*, brand.brand_name 
        FROM `products` 
        JOIN `brand` ON products.brand_id = brand.brand_id
        WHERE `product_name` LIKE ? OR `brand_name` LIKE ?");
    $likeQuery = '%' . $searchQuery . '%';
    $stmt->bind_param('ss', $likeQuery, $likeQuery);
  } else {
    // Fetch all products if no search query is provided
    $stmt = $conn->prepare("SELECT brand.brand_name, products.* FROM products, brand WHERE brand.brand_id = products.brand_id AND brand.brand_id = $id;");
  }

  $stmt->execute();
  $result = $stmt->get_result();

  // Check if products are available
  if ($result->num_rows > 0) {
    // Loop through each product and display its details
    while ($row = $result->fetch_assoc()) {
      echo '<div class="product">';

      // Display the product image
      echo '<div class="pimage" style="background-image: url(\'data:' . $row['image_type'] . ';base64,' . base64_encode($row['image']) . '\');"></div>';

      // Display product description with brand and product name
      echo '<div class="des">';
      echo '<span>' . htmlspecialchars($row['brand_name']) . '</span>';
      echo '<h5>' . htmlspecialchars($row['product_name']) . '</h5>';
      echo '<h4>Rs.' . number_format($row['price'], 2) . '</h4>';
      echo '</div>';

      // Add to cart button
      echo '<a href="login.php" onclick="handleCartClick(event)">';
      echo '<img src="svg/shopping-cart-svgrepo-com.svg" style="width: 24px; height: 24px;" />';
      echo '</a>';

      echo '</div>'; // Close product div
    }
  } else {
    echo '<p>No products found.</p>';
  }

  $stmt->close();

  echo '</div>';
  echo '</div>';
}
