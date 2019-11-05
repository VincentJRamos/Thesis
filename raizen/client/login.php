<?php
require_once "client_class.php";
$error_message = '';

if (isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$client = new Client();
	$login_success = $client->login_account($username, $password);

	if ($login_success == True) {
		if (isset($_SESSION['oldUrl'])) {
			header("location:". $_SESSION['oldUrl']);
		}else{
			header('location:../index.php');
		}
	}else {
		$error_message = 'Username or password is incorrect';
	}

}

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Raizen Travel and Tours</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Raizen Travel and Tours | Login</a>
			</div>
		</div>
	</nav>
	<div class = "container">
		<br />
		<br />
		<div class = "col-md-4"></div>
		<div class = "col-md-4">
			<div class = "panel panel-warning">
				<div class = "panel-heading">
					<h4>Please login your account to continue</h4>
				</div>
				<div class = "panel-body">
					<?php 
						if ($error_message != '') {
							echo '<span class="text-danger font-weight-bold">'. $error_message . '</span>';
						}
					?>
					<form method = "POST" action="login.php">
						<div class = "form-group">
							<label>Username</label>
							<input type = "text" name = "username" class = "form-control" required = "required" />
						</div>
						<div class = "form-group">
							<label>Password</label>
							<input type = "password" name = "password" class = "form-control" required = "required">
						</div>
						<br/>
						<div class = "form-group">
							<button name = "login" class = "form-control btn btn-primary"><i class = "glyphicon glyphicon-log-in">Login</i></button>
							<span>Dont have an account yet? <a href="register.php">Register Here!</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class = "col-md-4"></div>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>