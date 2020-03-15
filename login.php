<?php
  session_start();
//Database Configuration File
//include('db.php');
//require_once 'db.php';

error_reporting(0);
  if(isset($_POST['submit']))
  {
echo "dj2";
$servername = "localhost";
$username = "root";
$password = "";

try {
//Creating connection for mysql
$conn = new PDO("mysql:host=$servername;dbname=rr", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo ";af;";
    // Getting username/ email and password
    $username=$_POST['username'];
    $password=$_POST['pass'];
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT username,password FROM admin_users WHERE (username=:username  and (password=:password))";
    $query= $conn -> prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    $_SESSION['userlogin']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
  } else{
    echo "<script>alert('Invalid Details');</script>";
  }
  $conn  = null;

}

catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
	
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>


<form action="" method="post">
	<label>Username : </label>	
	<input type="text" name="username">
	<br>

	<label>Password : </label>
	<input type="password" name="pass">
	<br>

	<input type="submit" name="submit" value="submit">
</form>

</body>
</html>