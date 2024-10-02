<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Staff Member</title>


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

  <?php
	include("DBconnect.php");
    session_start();
	
	if(isset($_POST["submit"]))
	{
        $Role=$_POST["role"];
        $Name=$_POST["name"];
        $Address=$_POST["address"];
        $Mobile=$_POST["mobile"];
        $Bdate=$_POST["bdate"];
        $Email=$_POST["email"];
        $Username=$_POST["username"];
		    $Password=md5($_POST["password"]);
        $RPassword=md5($_POST["rpassword"]);
        
		
		if(($Role!="")&&($Name!="")&&($Address!="")&&($Mobile!="")&&($Bdate!="")&&($Email!="")&&($Username!="")&&($Password!="")&&($RPassword!=""))
		{
			$staffResgistration="INSERT INTO process_staff(role,name,address,mobile,bdate,email,username,password,rpassword)values('$Role','$Name','$Address','$Mobile','$Bdate','$Email','$Username','$Password','$Rpassword')";
			
			echo $staffResgistration;
			
			$res1 = mysqli_query($con,$staffResgistration);
            if ($res1 == TRUE)
			{
				
				echo("<h1>New User Added Successfully....!</h1>");
                // $_SESSION['added'] = "<div class='success'><h3>New User Create Successfully....!</h3></div>";
        header("location: login.php");
                
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
	elseif(isset($_POST['submit']))
	{
		header('url=index.html');
	}
	
?>


</head>
<body>
    <!-- start nav -->
    <!-- <form action="" method="post">
    <nav>
        <a href="index.html" class="brand">Store Zee</a>
        <div>
          <ul id="navbar">
            <li><a href="index.html" class="active">Dashboard</a></li>
            <li><a href="brand.html">Brand</a></li>
            <li><a href="catagory.html">Catagory</a></li>
            <li><a href="supplier.html">Supplier</a></li>
            <li><a href="product.html">Product</a></li>
            <li class="user" id="user">
              <div class="circle"></div>
              <i class="fa fa-user"></i>
            </li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
          </ul>
          <div id="userbar">
            <li><a href="singup1.html">Settings</a></li>
            <li><a href="createstaffmember.html">Create Staff Member</a></li>
            <li><a href="login.php">Logout</a></li>
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
      </nav> -->
      <!-- END nav -->

      <?php
	        include("header.php");
      ?>

    <section class="ftco-section ftco-no-pt ftco-no-pb" style="margin: 93px 0">
        <div class="container">
          <div class="row d-flex">
            <div
              class="col-md-5 ftco-animate img img-2"
              style="background-image: url(images/bg_1.jpg)"
            ></div>
            <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
              <div class="heading-section ftco-animate mb-5">
                <span class="subheading">New Staff Member</span>
                <h2 class="mb-4">Create Account</h2>
              </div>
              <form action="createstaffmember.php" method="post" class="formi"></form>
                <div class="row">
                  <div class="message hide">
                     <i class="fa-solid fa-circle"></i>
                     Wrong username or password
                  </div>
                <!-- Role Selection -->
                <div class="col-md-6 form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Storekeeper">Storekeeper</option>
                    </select>
                </div>

                  <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input
                      type="text"
                      class="form-control"
                      name="name"
                      placeholder="name"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input
                      type="text"
                      class="form-control"
                      name="address"
                      placeholder="address"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Contact Number</label>
                    <input
                      type="number"
                      min="999999999"
                      class="form-control"
                      name="mobile"
                      placeholder="mobile"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Birth day</label>
                    <input
                      type="date"
                      class="form-control"
                      name="bdate"
                      placeholder="Date"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input
                      type="email"
                      name="email"
                      class="form-control"
                      placeholder="email"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Username</label>
                    <input
                      type="text"
                      class="form-control"
                      name="username"
                      placeholder="username"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Password</label>
                    <input
                      type='password'
                      class="form-control"
                      name="password"
                      placeholder="password"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Retype password</label>
                    <input
                      type="password"
                      class="form-control"
                      name="rpassword"
                      placeholder="retype password"
                      required
                    />
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Add User</button>
                      
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Form -->
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