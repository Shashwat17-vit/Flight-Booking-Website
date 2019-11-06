<html>

<head>
    <title>Add a New Flight</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Front with CSS.css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-orange.min.css" />
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <script src="gen_validatorv4.js" type="text/javascript"></script>
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


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        
        <br><br>
            <div class="page-content"><center>
            <div class="demo-card-wide mdl-card mdl-shadow--16dp" style="width:400px">
                        <div class="mdl-shadow--16dp" style="background-color:#000000"><br>
                            <h3 style="color:white">
                                Add a New Flight
                            </h3>
                        </div>
                <br><br>
                <form action="Add_Flight.php" method="POST" id="addflight">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="Flight_no" name="Flight_no" required>
                                <label class="mdl-textfield__label" for="Flight_No">Flight No.</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" id="Source" name="Source" required>
      <option value="000" selected="selected">Choose Departure City</option>
      <option value="Delhi">Delhi</option>
      <option value="Mumbai">Mumbai</option>
      <option value="Chennai">Chennai</option>
      <option value="Bangalore">Bangalore</option>
    </select>
    <label class="mdl-textfield__label" for="Source">Source</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" id="Destination" name="Destination" required>
      <option value="000" selected="selected">Destination</option>
      <option value="Delhi">Delhi</option>
      <option value="Mumbai">Mumbai</option>
      <option value="Chennai">Chennai</option>
      <option value="Bangalore">Bangalore</option>
    </select>
    <label class="mdl-textfield__label" for="Destination">Destination</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <br>
                                <input class="mdl-textfield__input" type="Date" id="Departure"  name="Date" required>
                                <label class="mdl-textfield__label" for="Departure">Departure Date</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                                <br>
                                <input class="mdl-textfield__input" type="time" id="Arrival" name="Time" required >
                                <label class="mdl-textfield__label" for="Arrival">Time</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                            
                                <input class="mdl-textfield__input" type="text" id="Fare" name="Fare" required>
                                <label class="mdl-textfield__label" for="Fare">Fare</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                                <input class="mdl-textfield__input" type="Number" id="Fare" name="Type" required>
                                <label class="mdl-textfield__label" for="Fare">Type</label>
                            </div>
                            <div class="mdl-shadow--16dp" style="background-color:#000000"><br>
                            <input type="Submit" name="Add_Flight" value="Add a new flight" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                <br><br></div>
        
            
            </form>


<script  type="text/javascript">
 var frmvalidator = new Validator("addflight");
 frmvalidator.addValidation("Flight_no","req","Please enter the Flight No.");
 frmvalidator.addValidation("Flight_no","minlen=3","Flight No. Too short, Please Enter a better one!");
 frmvalidator.addValidation("Source","dontselect=000","Please enter the Departure City");
 frmvalidator.addValidation("Destination","dontselect=000","Please enter the arrival city");
 frmvalidator.addValidation("Country","dontselect=000");
 frmvalidator.addValidation("Fare","greaterthan=0","Sorry We cant provide flights for free.");
 frmvalidator.addValidation("Fare","lessthan=25000","Whoops! The Fare is too high!");
</script>
            </div>
            </center>
            </div>
            </main>

<?php 
$FirstName="";$LastName="";$Email="";
$PhoneNo=0; $Age=0;
if(isset($_POST["Add_Flight"])==true&& $_SERVER["REQUEST_METHOD"]=="POST")
{
    echo "<script>alert('Request Accepted')</script>";
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
if(isset($_POST["Add_Flight"]))
{
$FlightId=$_POST["Flight_no"];
$Depature=$_POST["Source"];
$Arrival=$_POST["Destination"];
$Date=$_POST["Date"];
$Time=$_POST["Time"];
$Fare=$_POST["Fare"];
$Type=$_POST["Type"];

$query ="INSERT INTO flights VALUES('$FlightId','$Depature','$Arrival','$Date','$Fare','$Type','$Time')"; 
}
$result =mysqli_query($conn,$query) or die("query failed:".mysqli_error());
if(! $result ) {
die('Could not enter data: ' . mysqli_error());
}
else 
{
echo "<script>alert('Flight Added Successfully')</script>";
header('Location: http://localhost/Project/operaton.php');
exit();
}
}
?>

            </body>
            </html>