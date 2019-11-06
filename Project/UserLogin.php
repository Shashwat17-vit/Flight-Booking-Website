<html>
<body>


  <div class="back-image">
    <img id="img1" src="Login.jpg">
    </img>
  </div>
</div>
    <div class="login-box">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
            <form name="loginform" method="POST" action="login.php">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="#">Forget Password</a><br>
            <a href="Register.php">New User</a>    
            </form>
        </div>

<?php
if(isset($_POST['submit'])==true) 
{
	$count=0;
?>
<?php
if (empty($_POST["username"])) {
	$message="Enter the Username";
  echo "<script type='text/javascript'>alert('$message');</script>";
  }
 else if (!preg_match("/^[a-zA-Z]*$/",$_POST["username"])) {
 	$message="Enter only Alphabets";
 echo "<script type='text/javascript'>alert('$message');</script>";
 }
 else {
 $username = $_POST["username"];
 $count=$count+1;
}
if (empty($_POST["password"])) {
	$message="Enter the password";
 echo "<script type='text/javascript'>alert('$message');</script>";
  }
 else {
 $password = $_POST["password"];
 $count=$count+1;
}

if($count>1)
{
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$db = mysqli_select_db($conn,"paradise") or die("could not select database");
$query ="SELECT * FROM `userlogin` WHERE `First Name`='$username'AND`Password` = '$password'";
$result =mysqli_query($conn,$query) or die("query failed:".mysql_error());
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



</body>
</html>