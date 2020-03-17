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
    
	<div style = "margin-left:80px;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h2 style = "color:#000000; font-weight: bold;">Choose your Tour</h2></strong>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `tour` INNER JOIN tour_type ON tour.tour_type = tour_type.id ORDER BY `price` ASC") or die(mysql_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "well" style = "height:300px; width:100%;">
						<div style = "float:left;">
							<img src = "photo/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3 style = "color:#000000; font-weight: bold;"><?php echo $fetch['tour_type_name']?></h3>
							<h4 style="color:#000000;">Price: <span style="color:#cc9966; font-weight: bold;"><?php echo "Php. ".$fetch['price'].".00"?></span></h4>
							<br /><br /><br /><br /><br /><br />
							<button style = "margin-left:450px;" type="button" class="btn btn-info get_other_details" data-toggle="modal" data-target="#get_tour_details_modal" data-id="<?php echo $fetch['tour_id']?>">View details</button>
							<a href = "add_reserve.php?tour_id=<?php echo $fetch['tour_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i>Book Now!</a>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
    </div>

    <div class="modal fade" id="get_tour_details_modal" tabindex="-1" role="dialog" aria-labelledby="get_tour_details_modal_label" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" style="background: #cc9966;">
	        <h3 class="modal-title" style="font-weight: bold;"><span id="display_tour_type"></span></h3>
	        <h4 style="font-weight: bold;"><span id="display_price"></span></h4>
	        <h4 style="font-weight: bold;"><span id="display_no_of_days"></span></h4>
	      </div>
	      <div class="modal-body">
	      	
	      	<div class="content">
	      		<label for="display_package_inclusions" style="color: #cc9966;">Package inclusions:</label>
	      		<textarea id="display_package_inclusions" cols="15" rows="15" class="form-control" disabled></textarea>

	      		<label for="display_sites_to_visit" style="color: #cc9966;">Sites to visit:</label>
	      		<textarea id="display_sites_to_visit" cols="15" rows="15" class="form-control" disabled></textarea>

	      		<label for="display_remarks" style="color: #cc9966;">Others:</label>
	      		<textarea id="display_remarks" cols="15" rows="15" class="form-control" disabled></textarea>
	      	</div>

	      </div>
	      <div class="modal-footer" style="background: #cc9966;">
	        <button type="button" class="btn btn-light" id="testqwe" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<?php include ("footer.php"); ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.min.js"></script>	
	<script src="js/waypoints.min.js"></script>	
	<script src="js/jquery.countTo.js"></script>
	<script src="js/jquery.mixitup.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>	
	<script src="js/jquery.knob.min.js"></script>	
	<script src="js/jquery.validate.min.js"></script>
    <script src="js/custom.js"></script>

    <script type = "text/javascript">
    	$(document).ready(function(){

			$(".get_other_details").click(function(){
				let tour_id = $(this).attr('data-id');

				$.ajax({
					url: 'client/request/get_tour_details.php',
					type: 'POST',
					dataType: 'json',
					data: {'tour_id': tour_id},
					success:function(data) {
						console.log(data);

						let price = 'PHP ' + data['price'] + '.00';
						let days = data['no_of_days'] + ' Days'
						$('#display_tour_type').html(data['tour_type_name']);
						$('#display_price').html(price);
						$('#display_no_of_days').html(days);
						$('#display_package_inclusions').html(data['package_inclusions']);
						$('#display_sites_to_visit').html(data['sites_to_visit']);
						$('#display_remarks').html(data['remarks']);
					}
				});
			});

		});
    </script>

</body>	
</html>