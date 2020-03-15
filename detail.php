<?php

include 'db.php';

if($conn){

	$sql = "SELECT * FROM user";
	$stm = $conn->query($sql);

	$users = $stm->fetchAll();


}					


?>


<!DOCTYPE html>
<html>
<head>
	<title>display</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>
<body>
<br><br>
<div class="container">

<?php foreach ($users as $row) { ?>
<div class="row">
	<div class="col">

		<div class="card">
		  <div class="card-header">
		    <?php echo $row["id"] ?>
		  </div>
		  <div class="card-body">
		    <blockquote class="blockquote mb-0">
		      <p>  <?php echo $row["username"] ?> </p>
		      <footer class="blockquote-footer">
		      	<cite title="Source Title">
		      		<?php echo $row["detail"] ?> 
		      	</cite>
		      </footer>
		    </blockquote>
		  </div>
		</div>
	</div>
</div>

<br>
<?php }  ?>

</div>
</body>
</html>




















