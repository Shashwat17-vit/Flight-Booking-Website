<?php 
session_start();
?>
<html>
<head>
	<title>
		Book Flight
	</title>
	<link rel="Stylesheet" href="Contact.css">
	<link rel="Stylesheet" href="Search1.css">
</head>

<body>
 <div class="navbar" style="background:#000;opacity:0.8">
    	<nav>
			<ul>
				<li><a class="name" href="Index.html">Paradise Airlines</a></li>
				<li><a href="Search.php">Search</a></li>
				<li><a href="Book.php">Book</a></li>
				<li><a href="Login.php">Login</a></li>
				
			</ul>
			</nav>
    </div>
    <p><h2><center>Logged in as
    <?php  echo $_SESSION['login_user'] ?> </center></h2></p>
    <p><h2><center>Flight Selected Details : Flight Id  
    <?php  echo $_SESSION['Fid'] ?> , Departure City <?php  echo $_SESSION['dep'] ?> , Arrival City <?php  echo $_SESSION['Arr'] ?> </center></h2></p>
  <div class="back-image">
    <img id="img1" src="Contact.jpg">
    </img>
<div class="login-box">
       
        <h2 style="padding:0px;margin:0px"><center>Book Flights</center></h2>
            <form method="post" action="Book.php">
            <p>First Name</p>
            <input type="text" name="first" placeholder="Enter First Name..">
            <p>Last Name</p>
            <input type="text" name="last" placeholder="Enter Last Name.. ">
            <p>
            <input type="radio" name="gender" value="Male" onclick="disable()">Male
            <input type="radio" name="gender" value="Female" onclick="enable()">Female
            </p>
            <p>Phone Number<input type="number" name="phone"placeholder="Enter Phone Number"></p>
            <p>Email<input type="text" name="email"placeholder="Enter Email Id"></p>
            <p>DOB<input id="ad" type="date" name="birth"></p>
            <p>FlightId<input id="id" type="Number" name="Fid" placeholder="Enter Flight Id"></p>
            <p id="info" style="padding:0px;margin:0px"></p>

            <input type="submit" name="submit1" value="Book" onclick="submit1()">
            <script>
             function submit1()
             { var prompt1=prompt("Are you Logged in?Y/N");
              if (prompt1== null || prompt1 == "N") {
               window.location = "Login.php";
                  } 
                
             }
            </script>
            <a href="Login.php">Login</a><br>   
            </form>
       </div>

 

  </div>
<?php 
$FirstName="";$LastName="";$Date="";
$PhoneNo=0; $email="";$Gender="";$FlightId="";
if(isset($_POST["submit1"])==true&& $_SERVER["REQUEST_METHOD"]=="POST")
{
    echo "<script>alert('Request Accepted')</script>";
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
if(isset($_POST["submit1"]))
{
$FirstName=$_POST["first"];
$LastName=$_POST["last"];
$Date=$_POST["birth"];
$PhoneNo=$_POST["phone"];
$email=$_POST["email"];
$Gender=$_POST["gender"];
$FlightId=$_POST["Fid"];

$query ="INSERT INTO Bookedflights VALUES('$FlightId','$FirstName','$LastName','$Gender','$PhoneNo','$email')"; 
}
$result =mysqli_query($conn,$query) or die("query failed:".mysqli_error($conn));
if(!$result ) {
die('Could not enter data: ' . mysqli_error($conn));
}
else 
{
echo '<script>alert("Flight Booked Successfully");(window.location = "Search.php");</script>';
exit();
}
}


?>


</body>
</html>