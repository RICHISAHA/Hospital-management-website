<?php
 define('DB_HOST', 'localhost'); 
 define('DB_NAME', 'training');
 define('DB_USER','root');
 define('DB_PASSWORD',''); 
 $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
 $db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
 function NewUser()
{
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['add'];
	$gender = $_POST['gen'];
	$dob = $_POST['dob'];
	move_uploaded_file($_FILES['img']['tmp_name'],"uploads/".$_FILES['img']['name']);
	$path = "uploads/".$_FILES['img']['name'];
	$password =  md5($_POST['pass']);
	$query = "insert into users(Name,Email,Phone,Address,Gender,DOB,Image,Password) values('$name','$email','$phone','$address','$gender','$dob','$path','$password')";
	$data = mysqli_query($conn,$query)or die("Error: ".mysqli_error($conn));
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	print "<script>alert('Registration Complete');</script>";
	print "<script>window.location.href='login.html'</script>";
	}
}
function SignUp()
{
	$x=$_POST['email'];
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
if(!empty($x))   
{   

    $sql="SELECT * FROM users WHERE Email = '$x'"; 
	$query = mysqli_query($conn,$sql);
	if(!$row = mysqli_fetch_array($query))
	{
		newuser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>