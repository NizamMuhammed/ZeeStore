


<?php

$server="localhost";
$dbusername="root";
$password="";
$dbname="zee_store";

//connect with DB
$con=mysqli_connect($server,$dbusername,$password,$dbname);

//check the connection
   
    if(mysqli_connect_errno($con))
	{
		echo "faild to connect with database!" .mysqli_connect_error();
		die();
		
	}
    else
	//{
	//	echo "Done";
	//}

?>
    
