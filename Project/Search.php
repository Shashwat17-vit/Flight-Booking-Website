<?php 
session_start();
$_SESSION['Fid']="none";
$_SESSION['dep']="none";
$_SESSION['Arr']="none";
?>
<html>
<head>
	<title>
		Search Flights
	</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="Stylesheet" href="Search1.css">
    <script type="text/javascript" src="Search.js"></script>
</head>
<body onload=display_ct()>
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
    <script>
function display_c(){
var refresh=1000;
mytime=setTimeout('display_ct()',refresh)
}
function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
    </script>
<center><h2 id="ct" style="top:5px;background-color:#d9d9d9"><center> Timer</center></h2>
 <p><h2><center>Logged in as
    <?php  echo $_SESSION['login_user'] ?> </center></h2></p>
 

    <div class="row" style="border:1px solid">
  <div class="back-image">
 
    <img id="img1" src="BackSearch.jpg">
    </img>
  
 <div class="login-box">
    
        <h1>Search For Flights</h1>
            <form name="searchform" method="POST" action="Search.php">
            <p><input type="radio" name="type" value="0">Domestic
            <input type="radio" name="type" value="1">International
            </p>
            <p>Arrival City</p><input type="text" name="arrival" placeholder="Enter City Travelling To..">
            <p>Departure City</p>
            <input type="text" name="departure" placeholder="Enter City Departuring From.. ">
            <p><input type="radio" name="way" value="One" onclick="disable()">One-Way
            <input type="radio" name="way" value="Return" onclick="enable()">Return
            </p>
            <p>Select date of Departure:<input type="date" name="going"></p>
            <p>Select date of Return:<input id="ad" type="date" name="return"></p>
            <p id="info" style="padding:0px;margin:0px"></p>

            <input type="submit" name="submit" value="Search" onclick="submit()">
            <script>
             function submit()
             {
                alert("Login to Book Flights");
             }
            </script>
            <a href="Login.php">Login</a><br>
            <a href="EmployeeLogin.php">Employee Login</a>    
            </form>

        </div>
</div>
<?php
if(isset($_POST['submit'])==true && isset($_POST['departure'])==true && isset($_POST['arrival'])==true && isset($_POST['going'])==true) {
              
              $from = $_POST['departure'];
              $to = $_POST['arrival'];
              $departdate = $_POST['going'];
              $type=$_POST["type"];
?>
<div class="searched">
<h2>Available Flights</h2>
<?php

$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
$query ="SELECT * FROM `flights` WHERE `Departure`='$from' AND `Arrival` = '$to' AND `Date` ='$departdate' AND Type='$type'";
$result =mysqli_query($conn,$query) or die("query failed:".mysqli_error($conn));
echo "<table>
    <tr><th>FlightID
    </th>
    <th>
    Depature From    
    </th>
    <th>
        Arrival At
    </th>
    <th>
      Date  
    </th>
    <th>
      Flight Fee
    </th>
    <th>
      Time
    </th>
    <th>
      Book?
    </th>";
if(mysqli_num_rows($result)==0)
{
echo "No Flights" ;
}
While($row = mysqli_fetch_array($result))
{
echo "<tr><td>$row[0]</td>
                   <td>$row[1]</td>
                   <td>$row[2]</td>
                   <td>$row[3]</td>
                   <td>$row[4]</td>
                   <td>$row[6]</td>
                   <td><a href='Book.php' value='Book' >Book</a></td>";

}
echo"</table>";
mysqli_close($conn);
}
?>
</div>


</body>
<!--<script>
$(document).ready(function(){
  $("button").click(function(){
    $.ajax({url: "Search.php", success: function(result){
      $_SESSION['Fid']=$row[0];
      $_SESSION['dep']=$row[1];
      $_SESSION['Arr']=$row[2];
      <?php echo '<script type="text/javascript">alert("Going To Booking");(window.location = "Book.php");</script>';
        ?>
    }});
  });
});-->
</script>
</html>