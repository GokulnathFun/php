<?php

if (isset($_POST["submit"])) {
$servername = "localhost";
$username = "root";
$password = "";

try {
//Creating connection for mysql
$conn = new PDO("mysql:host=$servername;dbname=master", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = $_POST["username"];
$pass = $_POST["pass"];
$detail = $_POST["detail"];

$hash = password_hash($pass, PASSWORD_DEFAULT);
password_verify($pass, $hash);

$count=$conn->prepare("select * from user");
$count->execute();
$no=$count->rowCount();
$no += 1;	

if ($no >= 10){
	$id = 'RR' . '0' . $no;
}
else if ($no >= 100) {
	$id = 'RR' . $no;
} else {
	$id = 'RR00' . $no;
}

echo " No of records = ".$no; 

echo "<br>";

echo $id;

$sql = "INSERT INTO user (id, username, password, detail) VALUES ('$id','$user', '$hash', '$detail')";
    // use exec() because no results are returned



if($conn->query($sql)){
	echo "success";
}
else{
	echo "<script> alert('Failed'); </script>";
}

$conn  = null;

}

catch(PDOException $e){
	
	echo "Connection failed: " . $e->getMessage();
}
	
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<form action="" method="post">
	
	<label>Username : </label>
	<input type="text" name="username" required="required username">
	<br>
	<label>Password : </label>
	<input type="password" name="pass" required="Enter password">
	<br>
	<label>detail :</label>
	<input type="text" name="detail" required="details">
<br>


	<input type="submit" value="submit" name="submit">
</form>

</body>
</html>	