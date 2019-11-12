<?php
session_start();
require_once('client_class.php');
$error_message = '';

$client = new Client();
$email = $client->user_get_email($_SESSION['guestId']);

if (isset($_POST['activate'])) {

	$activation_code = $_POST['activation_code'];
	$result = $client->activate_account($_SESSION['guestId'], $activation_code);

	if ($result == False) {
		$error_message = 'Activation code does not match. Please try again.';
	}
}

// $is_activated = $client->check_account_if_active($_SESSION['guestId']);

// if ($is_activated == True) {
// 	header('location:../index.php');
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Activation - Raizen</title>
	<meta charset = "utf-8" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
	<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
	<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md offset-md-4">
				<h3 class="text-success">
					We have sent a verification code to your email <strong><?php echo $email; ?></strong>.
				</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-md">
				<form action="activate_account.php" method="POST">
					<?php
						if ($error_message != '') {
							echo '<p class="text-danger">'. $error_message .'</p>';
						}
					?>
					<label for="activation_code"> Enter activation code: </label>
					<input type="text" class="form-control" name="activation_code"><br/>
					<button type="submit" class="btn btn-success btn-sm" name="activate">Submit</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>