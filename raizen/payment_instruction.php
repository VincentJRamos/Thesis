<?php
session_start();
require_once('client/client_class.php');

$guestId = $_SESSION['guestId'];

$client = new Client();
$book_list = $client->get_book_list($guestId, 'Pending');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Instruction - Raizen Travel and Tours</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet" >	
	<link href="css/font-awesome.min.css" rel="stylesheet">	
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col">
				<h3>You have pending reservations from the list. Please make a downpayment first.</h3> 
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h3>Please pay first the minimum payment to continue reserving.</h3>
				<a href="index.php" class="btn btn-warning btn-sm">Back to home</a>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#down_payment_modal" >
					How to make a down payment?
				</button><br/><br/> 
			</div>
		</div>

		<div class="row">
			
			<?php

				while($row = mysqli_fetch_assoc($book_list))
				{

			?>
					<div class="col-4">
						<div class="card" style="width: 18rem;">
						  <img src = "photo/<?php echo $row['photo']?>" height = "250" width = "350" alt="tour_photo"/>
						  <div class="card-body">
						    <h5 class="card-title text-primary"><strong><?php echo $row['tour_type'] ?></strong></h5>
						    <p class="card-text">
						    	<?php
						    		echo "Transaction #: ". $row['transaction_id']. "<br/>";
						    		echo "Days: ". $row['days']. "<br/>";
						    		echo "Payment made: ". $row['payment']. "<br/>";
						    		echo "Price: ". $row['price']. "<br/>";
						    		echo "Status: ". $row['status']. "<br/>";
						    		$transaction_id = $row['transaction_id'];
						    	?>
						    </p>
						    
						  </div>
						</div>
					</div><br/>
			<?php
				}
			?>
		</div>


	</div>

    <div class="modal fade" id="down_payment_modal" tabindex="-1" role="dialog" aria-labelledby="down_payment_modal_label" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title text-primary"><strong>How to make down payment</strong></h5>
	      </div>
	      <div class="modal-body">
	      	<div class="container">
	      		PALAGAY DTO INSTRUCTION HOW TO MAKE A DOWN PAYMENT <br/>

	      		step 1: magbigay ng account # ng company <br/>
	      		step 2: email ung ticket ksama ung transaction # pati fullname ng user sa ganitong email <br/>
	      		step 3: wait na maconfirm ni admin kung nareceive na ung payment <br/>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	
</body>
</html>