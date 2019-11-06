<?php
echo "<script>alert('hello')</script>"; 
if(isset($_POST['submit1'])==true) 
{
	echo "<script>alert('hello')</script>"; 
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
}
mysqli_close($conn);
}
}
?>
