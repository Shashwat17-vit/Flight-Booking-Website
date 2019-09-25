<html>
<head>
	<title>
		Search Flights
	</title>
	<link rel="Stylesheet" href="Search.css">
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
				<li><a href="Contact.php">Contact Us</a></li>
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


    <div class="row" style="border:1px solid">
  <div class="back-image">
 
    <img id="img1" src="BackSearch.jpg">
    </img>
  </div>
 <div class="login-box">
    
        <h1>Search For Flights</h1>
            <form name="searchform" method="POST" action="Login.php">
            <p><input type="radio" name="type" value="Domestic">Domestic
            <input type="radio" name="type" value="International">International
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
            <a href="#">Employee Login</a>    
            </form>

        </div>

<?php
if(isset($_POST['submit'])==true && isset($_POST['departure'])==true && isset($_POST['arrival'])==true && isset($_POST['going'])==true) {
              
              $from = $_POST['departure'];
              $to = $_POST['arrival'];
              $departdate = $_POST['going'];
?>
<div class="searched">
Available Flights
<?php

$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
$query ="SELECT * FROM `flights` WHERE `Departure`='$from' AND `Arrival` = '$to' AND `Date` ='$departdate'";
$result =mysqli_query($conn,$query) or die("query failed:".mysql_error());
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
      Fee
    </th>";
While($row = mysqli_fetch_array($result))
{
echo "<tr><td>$row[0]</td>
                   <td>$row[1]</td>
                   <td>$row[2]</td>
                   <td>$row[3]</td>
                   <td>$row[4]</td>";

}
echo"</table>";

mysqli_close($conn);
}
?>
</div>


</body>
</html>