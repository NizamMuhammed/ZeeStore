<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Store Zee - Supplier</title>
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
          <li><a href="catagory.php">Catagory</a></li>
          <li><a href="supplier.php" class="active">Supplier</a></li>
          <li><a href="product.html">Product</a></li>
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

    <?php
    include("DBconnect.php");
    session_start();
	
	if(isset($_POST["submit1"]))
	{
        $Name=$_POST["name"];
        $Email=$_POST["email"];
        $Mobile=$_POST["mobile"];
        
		
		if(($Name!="")&&($Email!="")&&($Mobile!=""))
		{
			$supplierResgistration="INSERT INTO supplier_details(name,email,mobile)values('$Name','$Email','$Mobile')";
			
			echo $supplierResgistration;
			
			$res1 = mysqli_query($con,$supplierResgistration);
            		if ($res1 == TRUE)
			{
				
				echo("<h1>New Supplier Added Successfully....!</h1>");
                // $_SESSION['added'] = "<div class='success'><h3>New User Create Successfully....!</h3></div>";
        header("location: index.html");
                
			}
			else
			{
				echo("Error Occur...!".mysqli_error($con));
				die();
				
			}
		}
		else
		{
            // $_SESSION['empty'] = "<div class='error'><h3>Fields can not empty...!</h3></div>";
		    // header('refresh:2');
            //     $userType="";
            //     $userfName="";
            //     $userlName="";
            //     $userName="";
            //     $userEmail="";
            //     $userPsw="";
            //     $userCNum="";
		}
		
	}
	elseif(isset($_POST['submit1']))
	{
		header('url=index.html');
	}
	
?>
    <div class="popup hide">
      <form action="supplier.php" method="post" style="min-width: 600px">
        <div class="fields">
          <span>Inventory Managment System</span>
          <h2>Add new supplier</h2>
          <div class="message pop">
            <i class="fa-solid fa-circle"></i>
            Invalde data detected
          </div>
          <label>Name</label>
          <input type="text" name="name" id="name" placeholder="name..." />
          <label>Email</label>
          <input type="email" name="email" id="email" placeholder="name..." />
          <label>Mobile</label>
          <input type="tel" name="mobile" id="mobile" placeholder="name..." />
          <button type="submit" name="submit1">Submit</button>
        </div>
        <div class="xmark"><i class="fa-solid fa-xmark"></i></div>
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
            <h1 class="mb-2 bread">Manage Suppliers</h1>
            <p class="breadcrumbs">
              <span class="mr-2">
                <a href="index.html">
                  Dashboard
                  <i class="ion-ios-arrow-forward"></i>
                </a>
              </span>
              <span>
                Supplier
                <i class="ion-ios-arrow-forward"></i>
              </span>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- header -->

    <section class="admin-table">
      <h2>Supplier information table</h2>
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


    <?php

        $sql ="SELECT * FROM supplier_details";
        $res = mysqli_query($con, $sql);

        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);


            if ($count > 0) {
                $sn = 1; // Initialize serial number
                
                while ($row = mysqli_fetch_assoc($res)) {
                    $SupplierID = $row["supplierID"];
                    $Name = $row["name"];
                    $Email=$row["email"];
                    $Mobile=$row["mobile"];
                

                ?>

                <div class="table-data">
                  <div class="table-row parent">
                    <div class="table-cell row"><?php echo $SupplierID; ?></div>
                    <div class="table-cell row"><?php echo $Name; ?></div>
                    <div class="table-cell row"><?php echo $Email; ?></div>
                    <div class="table-cell row"><?php echo $Mobile; ?></div>
                  </div>
                </div>

                <?php
                }
            } else {
                // Handle case when there are no rows
                echo "<tr><td colspan='4'>No Supplier Found.</td></tr>";
            }
        } else {
            // Handle query error
            echo "<tr><td colspan='4'>Failed to retrieve data from database.</td></tr>";
        }
?>


        <!-- <div class="table-data">
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div>
          <div class="table-row parent">
            <div class="table-cell row">5</div>
            <div class="table-cell row">Sarah Brown</div>
            <div class="table-cell row">Brownie1234@yahoo.com</div>
            <div class="table-cell row">098 234 5222</div>
          </div> -->
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
