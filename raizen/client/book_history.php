<?php
session_start();
require_once('../check_login.php');
require_once('client_class.php');

$guest_id = $_SESSION['guestId'];
$username = $_SESSION['username'];

$client = new Client();
$book_list = $client->get_book_list($guest_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Book History - Raizen Travel and Tours</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">

</head>
<body>

	<div class="container">

		<div class="row">
			<div class="col-md">
				<h2 class="title">My Book History</h2>
				<h2 class="username">Username: <span class="text-success"><?php echo $username; ?></span></h2>
				<a href="../index.php" class="btn btn-warning btn-sm">Back to home</a><br/><br/>
			</div>
		</div>

		<table id="book_history_table" class="table">
			<thead>
				<tr>
					<th>Transaction #</th>
					<th>Tour type</th>
					<th>Days</th>
					<th>Price</th>
					<th>Total Downpayment</th>
					<th>Status</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
				<?php

					while($row = mysqli_fetch_assoc($book_list))
					{
						echo "<tr>";
						echo "<td>".$row['transaction_id']."</td>";
						echo "<td>".$row['tour_type']."</td>";
						echo "<td>".$row['days']."</td>";
						echo "<td>".$row['price']."</td>";
						echo "<td>".$row['payment']."</td>";
						echo "<td>".$row['status']."</td>";
						echo '<td>
								<button type="button" class="btn btn-primary get_book_details" data-toggle="modal" data-target="#book_detail_modal" data-id="'.$row['transaction_id'].'">
									More detais
								</button>
							  </td>';
						echo "</tr>";
					}

				?>
			</tbody>
		</table>

	</div>

	<div class="modal fade" id="book_detail_modal" tabindex="-1" role="dialog" aria-labelledby="book_detail_modal_label" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title text-primary" id="book_detail_modal_label"><strong>Details</strong></h5>
	      </div>
	      <div class="modal-body">
	      	<div class="container">
	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Tour type:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_tour_type"></p>
	      			</div>
	      		</div>

	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Days:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_days"></p>
	      			</div>
	      		</div>

	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Extra participant:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_extra"></p>
	      			</div>
	      		</div>

	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Price:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_price"></p>
	      			</div>
	      		</div>

	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Checkin Date:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_checkin_date"></p>
	      			</div>
	      		</div>

	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Checkin Time:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_checkin_time"></p>
	      			</div>
	      		</div>

				<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Status:</p>
	      			</div>
	      			<div class="col">
	      				<p id="display_status"></p>
	      			</div>
	      		</div>

	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	

	<script src = "../js/jquery.js"></script>
	<script src = "../js/bootstrap.js"></script>
	<script src = "../js/jquery.dataTables.js"></script>
	<script src = "../js/dataTables.bootstrap.js"></script>	

	<script type = "text/javascript">
		$(document).ready(function(){
			$("#book_history_table").DataTable();


			$(".get_book_details").click(function(){
				let transaction_id = $(this).attr('data-id');

				$.ajax({
					url: 'request/get_transaction_details.php',
					type: 'POST',
					dataType: 'json',
					data: {'transaction_id': transaction_id},
					success:function(data) {
						$('#display_tour_type').html(data['tour_type']);
						$('#display_days').html(data['days']);
						$('#display_extra').html(data['extra_participant']);
						$('#display_price').html(data['price']);
						$('#display_checkin_date').html(data['checkin']);
						$('#display_checkin_time').html(data['checkin_time']);
						$('#display_status').html(data['status']);
					}
				});

			});
		});
	</script>

</body>
</html>