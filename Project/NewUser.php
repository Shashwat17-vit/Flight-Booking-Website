<?php 
session_start();
?>
<html>
<head>
	<title>
		New User
	</title>
	<link rel="Stylesheet" href="Login.css">
</head>
<body>
 <div class="navbar" style="background:#000;opacity:0.8">
    	<nav>
			<ul>
				<li><a class="name" href="Index.php">Paradise Airlines</a></li>
				<li><a href="Search.php">Search</a></li>
				<li><a href="Book.php">Book</a></li>
				<li><a href="Login.php">Login</a></li>
				
			</ul>
			</nav>
    </div>

  <div class="back-image">
    <img id="img1" src="Login.jpg" style="height: 100vh">
    </img>
  
</div>
    <div class="login-box" style="position:fixed; top:35vh;left:110vh">
    <img src="avatar.png" class="avatar">
        <h1>New User Sign Up </h1>
            <form name="loginform" method="POST" action="NewUser.php">
            <p>FirstName/UserName</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Last Name</p>
            <input type="text" name="last" placeholder="Last Name">
            <p>Date of Birth</p>
            <input type="Date" name="birth" placeholder="Enter DOB">
            <p>Age</p>
            <input type="Number" name="age" placeholder="Enter Age">
            <p>Phone</p>
            <input type="Number" name="Phone" placeholder="Enter Phone">
            <p>Email</p>
            <input type="Email" name="email" placeholder="Enter Email">
            <p>Gender</p>
            <input type="Text" name="Gender" placeholder="Enter Gender">
            <p>Passwprd</p>
            <input type="Password" name="Password" placeholder="Enter Password">
            <br>
            <input type="submit" name="submit" value="Login">
           <a href="login.php"> Already A User</a><br>
           <a href="EmployeeLogin.php">Employee Login</a>  
            </form>
        </div>


<?php
$FirstName="";$LastName="";$Date="";$age="";
$PhoneNo=0; $email="";$Gender="";$password="";
if(isset($_POST["submit"])==true&& $_SERVER["REQUEST_METHOD"]=="POST")
{
    echo "<script>alert('Request Accepted')</script>";
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
if(isset($_POST["submit"]))
{
$FirstName=$_POST["username"];
$LastName=$_POST["last"];
$Date=$_POST["birth"];
$PhoneNo=$_POST["Phone"];
$email=$_POST["email"];
$age=$_POST["age"];
$Gender=$_POST["Gender"];
$password=$_POST["Password"];

$query ="INSERT INTO userlogin VALUES('$FirstName','$LastName','$Date','$age','$PhoneNo','$email','$Gender','$password')"; 
}
$result =mysqli_query($conn,$query) or die("query failed:".mysqli_error($conn));
if(!$result ) {
die('Could not enter data: ' . mysqli_error($conn));
}
else 
{
echo '<script>alert("User Added Successfully Going to Login Page");(window.location = "Login.php");</script>';
exit();
}
}




?>

</body>
</html>