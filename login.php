<?php
 define('DB_HOST', 'localhost'); 
 define('DB_NAME', 'training');
 define('DB_USER','root');
 define('DB_PASSWORD',''); 
 $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
 $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

 function SignIn() { 
		$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
        $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
		$x=$_POST['email'];
		$y=md5($_POST['pass']);
		if(!empty($x)) 
		       { 
		         $sql="SELECT * FROM users where Email ='$x' AND Password ='$y'";
				 session_start();
		         $query = mysqli_query($con,$sql); 
				 $row = mysqli_fetch_array($query); 
			if(!empty($row['Email']) AND !empty($row['Password'])) 
			   {
				   $_SESSION['eid']=$row['Email'];
				   //echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...   ";
				   header("location:loggeduser.php");
			   } 
			else 
			  { 
			     echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	   		  } 
			 } 
			 } 
	   if(isset($_POST['submit'])) 
	       { 
	          SignIn(); 
		    } 
?>

