<?php
	session_start();
	$_SESSION['oldUrl'] = $_SERVER['REQUEST_URI'];
	require_once('check_login.php');
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
	<?php 
		require_once 'admin/connect.php';
		$query = $conn->query("SELECT * FROM `tour` INNER JOIN `tour_type` ON tour.tour_type = tour_type.id WHERE `tour_id` = '$_REQUEST[tour_id]'") or die(mysql_error());
		$fetch = $query->fetch_array();
	?>
	<div style = "margin-left: 85;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<a href="book.php" class="btn btn-secondary w-100">Back</a>
				<strong><h3 style = "color:#000000; font-weight: bold;"><?php echo $fetch['tour_type_name']?></h3></strong>
				<br />
				
				<div style = "height:300px; width:1080px;">
					<div style = "float:left;">
						<img src = "photo/<?php echo $fetch['photo']?>" height = "300px" width = "550px">
					</div>
					<div style = "margin-left:25px;">
						<h4 style="color:#000000">Price: <span style = "color:#cc9966; font-weight: bold"><?php echo "Php. ".$fetch['price'].".00";?></span></h4>
						<h4 style="color:#000000; margin-top:25px">Days: <span style = "color:#cc9966; font-weight: bold"><?php echo $fetch['no_of_days']." Day/s";?></span></h4>
						<h4 style="color:#000000; margin-top:25px">Packages Inclusions: <span style = "color:#cc9966; font-weight: bold"><?php echo $fetch['package_inclusions'];?></span></h4>
						<h4 style="color:#000000; margin-top:25px">Sites to visit: <span style = "color:#cc9966; font-weight: bold"><?php echo $fetch['sites_to_visit'];?></span></h4>
						<h4 style="color:#000000; margin-top:25px">Others: <span style = "color:#cc9966; font-weight: bold"><?php echo $fetch['remarks'];?></span></h4>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-6" style = "color:#000000;">
					<form method = "POST" enctype = "multipart/form-data" autocomplete="off">
						<div class = "form-group">
							<label>Book Date</label>
							<input type = "text" class = "form-control datepicker" name = "date" required = "required" /><br/>
							<label for="no_of_participants">No. of participants</label>
							<input type = "number" class = "form-control" name = "no_of_participants" required = "required" />
						</div>
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "add_guest"><i class = "glyphicon glyphicon-save"></i>Submit</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
	<br />
	<br />
		<?php include ("footer.php"); ?>

		<?php 

// get the dates blocked from database for specific tour
$query = $conn->query("SELECT block_date FROM tour_closed_dates WHERE tour_id = '$_REQUEST[tour_id]'") or die(mysql_error());

$disabled_dates = '';

while($fetch_date = $query->fetch_array()){
	$disabled_dates .= "'". $fetch_date['block_date'] . "', ";
	//array_push($start_date, $fetch_dates['date_start']);
}

?>
</body>


<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {

  	var array = [<?php echo $disabled_dates; ?>]

    $( ".datepicker" ).datepicker({
    	minDate: 0,
    	beforeShowDay: function(date){
	        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
	        return [ array.indexOf(string) == -1 ]
    	}
    });
  } );
</script>
</html>