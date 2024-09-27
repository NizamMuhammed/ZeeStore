<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Store Zee - Product</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="svg/logo2.png"
      media="(prefers-color-scheme: light)"
    />
    <link
      rel="icon"
      type="image/x-icon"
      href="svg/logo1.png"
      media="(prefers-color-scheme: dark)"
    />
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/jquery.timepicker.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style2.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body style="margin-top: -30px">
    <nav>
      <a href="index.html" class="brand">Store Zee</a>
      <div>
        <ul id="navbar">
          <li><a href="index.html">Dashboard</a></li>
          <li><a href="brand.html">Brand</a></li>
          <li><a href="catagory.html">Catagory</a></li>
          <li><a href="supplier.html">Supplier</a></li>
          <li><a href="product.html" class="active">Product</a></li>
          <li class="user" id="user">
            <div class="circle"></div>
            <i class="fa fa-user"></i>
          </li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul>
        <div id="userbar">
          <li><a href="singup1.html">Settings</a></li>
          <li><a href="login.html">Logout</a></li>
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

    <div class="popup hide">
      <form action="" method="post" style="width: 980px">
        <span>Inventory Managment System</span>
        <h2>Add new product</h2>
        <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
        <div class="form-body">
          <div class="image" style="height: 380px">
            <img
              src="svg/image.svg"
              class="display"
              style="max-width: 320px; max-height: 320px"
            />
          </div>
          <div class="fields">
            <div class="message pop">
              <i class="fa-solid fa-circle"></i>
              Invalde data detected
            </div>
            <div class="fields" style="width: 580px">
              <div class="inputs">
                <label>Name</label>
                <input type="text" name="" id="" placeholder="name..." />
              </div>
              <div class="inputs">
                <label>Brand</label>
                <select name="" id="" required>
                  <option value="" selected>Breakfast</option>
                  <option value="">MSI</option>
                  <option value="">HP</option>
                  <option value="">Lenovo</option>
                  <option value="">Asus</option>
                </select>
              </div>
              <div class="inputs">
                <label>Product image</label>
                <input
                  type="file"
                  name=""
                  id="image_input"
                  accept=".jpg, .jpeg, .png, .img"
                  title="edit properly before uploading"
                />
              </div>
              <div class="inputs">
                <label>Description</label>
                <textarea
                  name=""
                  id=""
                  rows="3"
                  placeholder="description..."
                ></textarea>
              </div>
            </div>
            <button type="submit">Submit</button>
          </div>
        </div>
        <!-- 
        <div class="fields">



    

          
        </div>
         -->
      </form>
    </div>
    <!-- popup -->

    <section
      class="hero-wrap hero-wrap-2"
      style="background-image: url('images/shopping.jpg')"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
        >
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Manage Products</h1>
            <p class="breadcrumbs">
              <span class="mr-2">
                <a href="index.html">
                  Dashboard
                  <i class="ion-ios-arrow-forward"></i>
                </a>
              </span>
              <span>
                Products
                <i class="ion-ios-arrow-forward"></i>
              </span>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- header -->

    <section class="admin-table">
      <h2>Product table</h2>
      <span>view and manage product deatils</span>
      <div class="table">
        <div class="searchAddS">
          <section class="search">
            <input type="text" id="search" placeholder="search product" />
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
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">12</div>
            <div class="table-cell row"><a>Active</a></div>
          </div>
        </div>
      </div>
    </section>

    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#F96D00"
        />
      </svg>
    </div>
    <!-- loader -->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    <script src="js/home.js"></script>
  </body>
</html>
