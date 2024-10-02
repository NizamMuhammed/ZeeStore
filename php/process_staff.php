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
			$staffResgistration="INSERT INTO users_details(role,name,address,mobile,bdate,email,username,password,rpassword)values('$Role','$Name','$Address','$Mobile','$Bdate','$Email','$Username','$Password','$Rpassword')";
			
			echo $staffResgistration;
			
			$res1 = mysqli_query($con,$staffResgistration);
            if ($res1 == TRUE)
			{
				
				echo("<h1>New User Added Successfully....!</h1>");
                // $_SESSION['added'] = "<div class='success'><h3>New User Create Successfully....!</h3></div>";
                // header("location: usersmanage.php");
                
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
		// header('url=admin.php');
	}
	
?>