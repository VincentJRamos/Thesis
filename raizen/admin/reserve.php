<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang = "en">
	<head>
		<title>Raizen Travel and Tours</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<!-- <link rel = "stylesheet" type = "text/css" href = "../css/style.css" /> -->
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Raizen Travel and Tours</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "glyphicon glyphicon-user"></i> <?php echo $name;?></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>	
	<?php include ("header.php"); ?>
	<br/>
	<div class = "container-fluid">	
		<div class = "panel panel-default">
			<?php
				$q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction`") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
				$f_ci = $q_ci->fetch_array();
			?>
			<div class = "panel-body">
				<a href="reserve.php?status=All" class = "btn btn-success"><span class = "badge"><?php echo $f_p['total']?></span> All</a>
				<a href="reserve.php?status=Pending" class = "btn btn-danger"> Pending</a>
				<a href="reserve.php?status=Confirmed" class = "btn btn-primary"> Confirmed</a>
				<a href="reserve.php?status=Closed" class = "btn btn-info"> Closed</a>
				<!-- <a class = "btn btn-info" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a> -->
				<!-- <a class = "btn btn-warning" href = "checkout.php"><i class = "glyphicon glyphicon-eye-open"></i> Check Out</a> -->
				<br/>
				<br/>
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Tour #</th>
							<th>Name</th>
							<th>Contact No.</th>
							<th>Tour Type</th>
							<th>Reserved Date</th>
							<th>Total</th>
							<th>Payment</th>
							<th>Pending Payment</th>
							<th>Status</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php

							$status = $_GET['status'];

							$mysql_query = "SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `tour` INNER JOIN tour_type ON tour_type.id = tour.tour_type";

							if ($status != 'All') 
							{
								$mysql_query .= " WHERE `status` = '$status'";
							}

							$query = $conn->query($mysql_query) or die(mysqli_error());
							while($fetch = $query->fetch_array()){
								$pending = $fetch['bill'] - $fetch['payment'];
						?>
						<tr>
							<th><?php echo $fetch['transaction_id']?></th>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['contactno']?></td>
							<td><?php echo $fetch['tour_type_name']?></td>
							<td><strong><?php if($fetch['checkin'] <= date("Y-m-d", strtotime("+8 HOURS"))){echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>";}else{echo "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>";}?></strong></td>
							<td>PHP <?php echo $fetch['bill']?>.00</td>
							<td>PHP <?php echo $fetch['payment']?>.00</td>
							<td>PHP <?php echo $pending?>.00</td>
							<td><?php echo $fetch['status']?></td>
                            <td>
                            	<center>
                            		<button type="button" class="btn btn-warning get_book_details" data-toggle="modal" data-target="#update_payment_modal" data-id="<?php echo $fetch['transaction_id']?>">
									<i class = "glyphicon glyphicon-edit"></i> Update payment
									</button>

									<button type="button" class="btn btn-info mark_closed_trans" data-toggle="modal" data-target="#mark_closed_modal" data-id="<?php echo $fetch['transaction_id']?>">
									Mark closed
									</button>

	                            	<!-- <a class = "btn btn-success" href = "confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class = "glyphicon glyphicon-check"></i> Check In</a> -->

	                            	<a class = "btn btn-danger" onclick = "confirmationDelete(); return false;" href = "delete_pending.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class = "glyphicon glyphicon-trash"></i> Discard</a>
                            	</center>
                            </td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include ("footer.php"); ?>

	<div class="modal fade" id="mark_closed_modal" tabindex="-1" role="dialog" aria-labelledby="mark_closed_modal_label" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title text-primary">Mark as Closed | Transaction no.: <span id="display_transaction_id"></span></h5>
	      </div>
	      <div class="modal-body">

	      	<p class="text-warning">Are you sure you want to mark this transaction as closed?</p>

	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" id="mark_closed_btn" data-dismiss="modal">Yes</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      </div>
	    </div>
	  </div>
	</div>


	<div class="modal fade" id="update_payment_modal" tabindex="-1" role="dialog" aria-labelledby="update_payment_modal_label" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title text-primary" id="book_detail_modal_label"><strong>Update payment</strong></h5>
	      </div>
	      <div class="modal-body">
	      	<div class="container">
	      		<div class="row">
	      			<div class="col">
	      				<p class="text-primary">Transaction #: <span id="display_tour_no"></span></p>
	      				<p>Payment: <span id="display_payment" class="text-success"></span></p>
	      				<p>Total: <span id="display_bill" class="text-success"></span></p>
	      				<p>Pending payment: <span id="display_pending_payment" class="text-danger"></span></p>
	      			</div>
	      		</div>
	      	</div>
	      	<label for="payment_input">Payment:</label>
	      	<input type="text" id="payment_input" class="form-control form-control-sm"><br/>
	      	<label for="status_input">Status:</label>
	      	<select id="status_input" class="form-control form-control-sm">
	      		<option value="Confirmed">Confirmed</option>
	      		<option value="Pending">Pending</option>
	      	</select><br/>
	      	<label for=""><small>Send email notification to guest?</small></label>
	      	<select id="bool_send_mail" class="form-control form-control-sm">
	      		<option value="Yes">Yes</option>
	      		<option value="No">No</option>
	      	</select>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" id="update_payment_btn" data-dismiss="modal">Update</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();

		$(".mark_closed_trans").click(function(){
			let transaction_id = $(this).attr('data-id');

			$.ajax({
				url: '../client/request/get_transaction_details.php',
				type: 'POST',
				dataType: 'json',
				data: {'transaction_id': transaction_id},
				success:function(data) {
					$('#display_transaction_id').html(data['transaction_id']);
				}
			});

		});

		$("#mark_closed_btn").click(function(){
			let transaction_id = $('#display_transaction_id').html();

			$.ajax({
				url: '../client/request/mark_closed.php',
				type: 'POST',
				dataType: 'json',
				data: {'transaction_id': transaction_id},
				success:function(data) {
					alert(data);
					window.location.reload();
				}
			});

		});

		$(".get_book_details").click(function(){
			let transaction_id = $(this).attr('data-id');

			$.ajax({
				url: '../client/request/get_transaction_details.php',
				type: 'POST',
				dataType: 'json',
				data: {'transaction_id': transaction_id},
				success:function(data) {
					$('#display_tour_no').html(data['transaction_id']);
					$('#display_payment').html(data['payment']);
					$('#display_bill').html(data['bill']);

					let pending_payment = data['bill'] - data['payment'];

					$('#display_pending_payment').html(pending_payment);
				}
			});

		});

		$("#update_payment_btn").click(function(){
			let transaction_id = $('#display_tour_no').html();
			let payment_input = $('#payment_input').val();
			let status_input = $('#status_input').val();
			let bool_send_mail = $('#bool_send_mail').val();

			if (!payment_input) {
				payment_input = 0;
			}

			$.ajax({
				url: '../client/request/update_payment_details.php',
				type: 'POST',
				dataType: 'json',
				data: {'transaction_id': transaction_id,
					   'payment_input': payment_input,
					   'status_input': status_input,
					   'bool_send_mail': bool_send_mail,},
				success:function(data) {
					alert(data);
					window.location.reload();
				}
			});

		});
	});
</script>
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
</html>