<html>

<head>
    <title>Cancel Flight</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Front with CSS.css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-orange.min.css" />
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="Search.js"></script>
        <link rel="Stylesheet" href="Search1.css">
</head>


<body background="airplane.jpg">

    <div class="navbar" style="background:#000;opacity:0.8; padding: 10px">
        <nav>
            <ul>
                <li><a class="name" href="Index.php">Paradise Airlines</a></li>
                <li><a href="Search.php">Search</a></li>
                <li><a href="Book.php">Book</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
                <li><a href="operaton.php">Back</a></li>
            </ul>
            </nav>
    </div>
            <div class="page-content"><center>
                <br><br>
                <center>
        <br><br><br>
        <div class="mdl-card mdl-shadow--16dp" style="width:800px">
        <div class="mdl-shadow--16dp" style="background-color:#000000">
                        <br>
                        <div class="mdl-typography--title" style="color:#ffffff">Search Results</div>
                        <br>
                        </div>
        <br><br>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp">
  <thead>
    <tr>
      <th>Flight No.</th>
      <th>Origin</th>
      <th>Destination</th>
      <th>Departure Date</th>
      <th>Fare</th>
      <th>Time</th>
      <th>Select Flight</th>
    </tr>
  </thead>
  <tbody>
        <form action='Cancel_Flight.php' method="POST">
            <?php



if(isset($_POST["cancel"])==true&& $_SERVER["REQUEST_METHOD"]=="POST")
{
$Flight=$_POST['cancel_flight'];
echo "<script>alert('$Flight')</script>";

$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
mysqli_select_db($conn,"paradise") or die("could not select database");
$query="DELETE FROM flights WHERE 'Flight Id'=$Flight";
$result = mysqli_query($conn,$query)or die("query failed:".mysqli_error($conn));
if(!$result)
{
    echo "<script>alert('Something Wrong')</script>";
}
else if($result)
{
 echo'<script type="text/javascript">alert("Flight Successfully Removed");(window.location = "operaton.php");</script>';   
}
mysqli_close($conn);
} 




            echo "<script>alert('Cancel Request Accepted')</script>";
          $conn = mysqli_connect("localhost","root","") or die("could not connect to server");
          $db = mysqli_select_db($conn,"paradise") or die("could not select database");
                $sql = "SELECT * from flights";
                $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
	            while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td><b>" .$row['Flight Id'] . "</b></td>";
                    echo "<td>" . $row['Departure'] . "</td>";
                    echo "<td>" . $row['Arrival'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Flight Fee'] . "</td>";
                    echo "<td>" . $row['Time'] . "</td>";
                    echo "<td><label class=\"mdl-radio mdl-js-radio mdl-js-ripple-effect\" for=\"".$row['Flight Id']."\">
                    <input type=\"radio\" id=\"".$row['Flight Id']."\" class=\"mdl-radio__button\" name=\"cancel_flight\" value=\"".$row['Flight Id']."\">
                    </label></td>";
                    echo "</tr>";
                }
            
	        ?>



            </tbody>
</table>
<br><br>
<div class="mdl-shadow--16dp" style="background-color:#212121"><br>
<input type="Submit" name="cancel" value="Cancel the selected Flight" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                
                    </button>
                    <br><br>
                    </div>
                    </div>
                    <br><br><br>
                    </div>
        </form>
        </div>
        </center>
            </div>


        </main>
    </body>
</html>
