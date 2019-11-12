<?php
require_once "client_class.php";
$error_message = '';

if (isset($_POST['register'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];

	$client = new Client();
	$data = $client->register($username, $password, $firstname, $middlename, $lastname, $address, $contact, $email);

	if ($data) {
		header('location: activate_account.php');
		// if (isset($_SESSION['oldUrl'])) {
		// 	header("location:". $_SESSION['oldUrl']);
		// }else{
		// 	header('location:../index.php');
		// }
	} else {
		$error_message = 'Username already exist, Please choose another one.';
	}

}

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Raizen Travel and Tours - Registration</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<div class = "container">

		<!-- pwede hinding br to pero minamadali ko na kasi hahaha -->
		<br/>
		<br/>
		<br/>
		<div class = "col-md">
			<?php 
				if ($error_message != '') {
					echo '<span class="text-danger font-weight-bold">'. $error_message . '</span>';
				}
			?>
			<div class = "panel-heading">
				<h4>Registration Page</h4>
			</div>

			<form method="POST" action="register.php">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="Username">Username</label>
			      <input type="text" class="form-control" name="username" id="Username" placeholder="Email" required>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="Password">Password</label>
			      <input type="password" class="form-control" name="password" id="Password" placeholder="Password" required>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="form-group col-md-4">
			      <label for="Firstname">First Name</label>
			      <input type="text" class="form-control" name="firstname" id="Firstname" placeholder="Firstname" required>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="Middlename">Middle Name</label>
			      <input type="text" class="form-control" name="middlename" id="Middlename" placeholder="Middlename" required>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="Lastname">Last Name</label>
			      <input type="text" class="form-control" name="lastname" id="Lastname" placeholder="Lastname" required>
			    </div>
			  </div>
			  
			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="Address">Address</label>
			      <input type="text" class="form-control" name="address" id="Address" required>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="Contact">Contact No.</label>
			      <input type="text" class="form-control" name="contact" id="Contact" required>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="Email">Email</label>
			      <input type="email" class="form-control" name="email" id="Email" required>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="form-group col-md-6">
			  		<input type="submit" class="btn btn-primary" name="register" value="Register Me">
			  		<a href="../index.php" class="btn btn-danger">Cancel</a>
			  	</div>
			  </div>
			</form>
		</div>

	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>