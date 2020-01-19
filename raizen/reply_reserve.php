<?php
session_start();

$fullname = $_SESSION['fullName'];
$email = $_SESSION['email'];
$amount = $_GET['amount'];
// make default payment to half
$amount = $amount / 2;

$invoice_no = $_GET['invoice_no'];
$remarks = $_GET['remarks'];

$dragonpay_url = 'https://test.dragonpay.ph/GenPay.aspx?merchantid=SAMPLEGEN&amount='.$amount.'&invoiceno='.$invoice_no.'&name='.$fullname.'&email='.$email.'&remarks='.$remarks;

echo $dragonpay_url;

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
		<title>Raizen Travel and Tours</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet" >	
	<link href="css/font-awesome.min.css" rel="stylesheet">	
	<link href="css/prettyPhoto.css" rel="stylesheet">
	
	<link href="css/theme.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/colors/golden.css" rel="stylesheet" class="colors">
	</head>
<body>
<?php include ("header.php"); ?>
	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3 style = "color:#000000;">Congratulations. Your book is successful!</h3></strong>
				<strong><h3 style = "color:#000000;">To confirm your book. Please make a downpayment.</h3></strong>
				<br />

			
				<div class = "well col-md-12">

					<center><h3 style = "color:#000000;">How to make a downpayment.</h3></center>
					<br />

					<h3 style = "color:#000000;">You can pay using DRAGON PAY <a href="<?php echo $dragonpay_url; ?>" target="_blank">here</a>.</h3>
					<br/>
					<h3 style = "color:#000000;">Manual Remittance or Over the bank payment.</h3>
					<br/>
					<center><h5 style = "color:#000000;"><i>Please read carefully. PHP200.00 per head deposit is needed. Remaining balance can be settled on the tour.</i></h5></center>

					<center><h4 style = "color:#000000;">Step 1: Pay via bank deposit or fund transfer to this account.</h4></center>
					<center>
						<h5 style="color:red"><i>
						PSBank - Gma Cavite (Savings Account)
						Account Name: Steve Raymond Llasus Bucsit
						Account Number: 227361003843
						</i></h5>

					<center>
						<h4 style = "color:#000000;">or you can pay through any of this Remittance Center:</h4>
						<ul style="color:red">
							<li>Palawan express</li>
							<li>Western Union</li>
							<li>LBC Kwarta Padala</li>
							<li>Cebuana</li>
						</ul>
						<h5 style="color:red"><i>
						Receiver: Steve Raymond Llasus Bucsit<br/>
						Address: Paliparan 1, Dasmarinas City, Cavite
						</i></h5>	
					</center>
					<hr/>
					<center><h4 style = "color:#000000;">Step 2: Send a picture of the receipt/screenshot of the payment to raizen.test@gmail.com together with your Full Name and Transaction #.</h4></center>
					<br />
					<center><a href = "book.php" class = "btn btn-success"><i class = "glphyicon glyphicon-check" style = "color:#000000;"></i>Book Another Tour</a></center>
				</div>
				<div class = "col-md-4"></div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<?php include ("footer.php"); ?>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>