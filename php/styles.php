<link
  rel="icon"
  type="image/x-icon"
  href="../svg/logo.png"
  media="(prefers-color-scheme: light)" />
<link
  rel="icon"
  type="image/x-icon"
  href="../svg/logo.png"
  media="(prefers-color-scheme: dark)" />
<meta charset="utf-8" />
<meta
  name="viewport"
  content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css" />
<link rel="stylesheet" href="../css/owl.carousel.min.css" />
<link rel="stylesheet" href="../css/owl.theme.default.min.css" />
<link rel="stylesheet" href="../css/magnific-popup.css" />
<link rel="stylesheet" href="../css/aos.css" />
<link rel="stylesheet" href="../css/ionicons.min.css" />
<link rel="stylesheet" href="../css/animate.css" />
<link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
<link rel="stylesheet" href="../css/jquery.timepicker.css" />
<link rel="stylesheet" href="../css/flaticon.css" />
<link rel="stylesheet" href="../css/icomoon.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/style2.css" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />

<?php
function navigation(int $n)
{
  echo ($n == 1) ? "<li><a class='active' href='dashboard.php'>Dashboard</a></li>" : "<li><a href='dashboard.php' >Dashboard</a></li>";
  echo ($n == 2) ? "<li><a class='active' href='brand.php'>Brands</a></li>" : "<li><a href='brand.php'>Brands</a></li>";
  echo ($n == 3) ? "<li><a class='active' href='catagory.php'>Catagory</a></li>" : "<li><a href='catagory.php'>Catagory</a></li>";
  echo ($n == 4) ? "<li><a class='active' href='supplier.php'>Suppliers</a></li>" : "<li><a href='supplier.php'>Suppliers</a></li>";
  echo ($n == 5) ? "<li><a class='active' href='product.php'>Product</a></li>" : "<li><a href='product.php'>Product</a></li>";
  echo ($n == 6) ? "<li><a class='active' href='orders.php'>Orders</a></li>" : "<li><a href='orders.php'>Orders</a></li>";
  echo ($n == 7) ? "<li><a class='active' href='payments.php'>Payments</a></li>" : "<li><a href='payments.php'>Payments</a></li>";
}
?>