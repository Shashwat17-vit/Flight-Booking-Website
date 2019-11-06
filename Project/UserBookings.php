<?php
session_start();
?>

<html>

<head>
    <title>User Bookings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Front with CSS.css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-orange.min.css" />
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="Stylesheet" href="Search1.css">
</head>


<body background="airplane.jpg">
<div class="navbar" style="background:#000;opacity:0.8">
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
        <br><
            <div class="page-content"><center>
                <br><br>
                <center>
        <br><br>
        <div class="mdl-card mdl-shadow--16dp" style="width:800px">
        <div class="mdl-shadow--16dp" style="background-color:#000000">
                        <br>
                        <div class="mdl-typography--title" style="color:#ffffff">All bookings</div>
                        <br>
                        </div>
        <br><br>
        <form method="POST" action="UserBookings.php">
        <center><input type="text" name="sea" placeholder="Enter User to be searched"><input type="submit" name="Go" value="Go"></center></form>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp">
  <thead>
    <tr>
      <th>Flight Id.</th>
      <th>Username</th>
      <th>Gender</th>
      <th>Phone Number</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
  <center>
        
            <?php
            if(isset($_POST['Go']))
            {
        $search=$_POST['sea'];
        echo 'Bookings Made By '.$search;
            $conn = mysqli_connect("localhost","root","") or die("could not connect to server");
            $db = mysqli_select_db($conn,"paradise") or die("could not select database");
                $sql = "SELECT * from bookedflights where User = '$search'";
                $result = mysqli_query($conn,$sql) or die("query failed:".mysqli_error($conn));
	            while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td><b>" . $row['FlightId'] . "</b></td>";
                    echo "<td>" . $row['User'] . "</td>";
                    echo "<td>" . $row['Gender'] . "</td>";
                    echo "<td>" . $row['Phone'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                }
            }
	        ?>
            </center>
            </tbody>
</table>
<br><br>
<div class="mdl-shadow--16dp" style="background-color:#212121"><br>
<div class="mdl-shadow--16dp" style="background-color:#f4b342"><br>
                        <a class="mdl-navigation__link" href="Operaton.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>Go Back</b></div></a>
                        <br>
                        </div>
                
                    </button>
                    <br><br>
                    </div>
                    </div>
                    <br><br><br>
                    </div>
        </div>
        </center>

            </div>
        </main>
    </body>
</html>