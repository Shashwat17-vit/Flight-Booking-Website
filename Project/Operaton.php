<html>
<link rel="Stylesheet" href="Search1.css">
   
<body background="Airplane.jpg" style="margin:0px; padding:0px;background-width: 100vh;background-height: 100vh">

<div class="navbar" style="background:#000;opacity:0.8">
    	<nav>
			<ul>
				<li><a class="name" href="Index.php">Paradise Airlines</a></li>
				<li><a href="Search.php">Search</a></li>
				<li><a href="Book.php">Book</a></li>
				<li><a href="Login.php">Login</a></li>
				<li><a href="Contact.php">Contact Us</a></li>
			</ul>
			</nav>
    </div>
<?php
if(isset($_POST['submit1'])==true) 
{
 $count=0;
 $username = $_POST["username"];
 $count=$count+1;
$password = $_POST["password"];
$count=$count+1;

if($count>1)
{
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
$query ="SELECT * FROM employee WHERE User='$username'AND Password ='$password'";
$result=mysqli_query($conn,$query) or die("query failed:".mysql_error());
if(mysqli_num_rows($result)>0){
    echo "<script type='text/javascript'>alert('Welcome $username');</script>";
}
else{
echo "<script type='text/javascript'>alert('Incorrect Username/Password');</script>";
echo "<H1>Incorrect Username/Password<br><a href='EmployeeLogin.php'>Go Back</a></H1>";
exit();   
}
mysqli_close($conn);
}
}
 ?>
<br>
<br>
<br>
<div class="page-content" style="position :fixed;top:10vh;left:83vh "><center>
            <div class="demo-card-wide mdl-card mdl-shadow--26dp" style="width:400px">
                        <div class="mdl-shadow--16dp" style="background-color:#000000"><br>
                            <h3 style="color:white">
                                Flights
                            </h3>
                        </div>
                        <div class="mdl-shadow--16dp" style="background-color:#f4b342"><br>
                        <a class="mdl-navigation__link" href="add_flight.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>ADD FLIGHT</b></div></a>
                        <br>
                        </div>
                        <div class="mdl-shadow--16dp" style="background-color:#f4b342"><br>
                        <a class="mdl-navigation__link" href="cancel_flight.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>CANCEL FLIGHT</b></div></a>
                        <br>
                        </div>
                    <div class="mdl-shadow--16dp" style="background-color:#000000"><br>
                            <h3 style="color:white">
                                Users
                            </h3>
                        </div>
                        <div class="mdl-shadow--16dp" style="background-color:#f4b342"><br>
                        <a class="mdl-navigation__link" href="UserBookings.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>VIEW USER BOOKINGS</b></div></a>
                        <br>
                        </div>
                       
                    
            </div>
            </div></center>



</body>
</html>