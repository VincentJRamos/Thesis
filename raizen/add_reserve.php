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
	<div style = "margin-left: 85;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3 style = "color:#000000;">BOOK YOUR TOUR</h3></strong>
				<br />
				<?php 
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `tour` INNER JOIN `tour_type` ON tour.tour_type = tour_type.id WHERE `tour_id` = '$_REQUEST[tour_id]'") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src = "photo/<?php echo $fetch['photo']?>" height = "300px" width = "400px">
					</div>
					<div style = "float:left; margin-left:10px;">
						<h3 style = "color:#000000;"><?php echo $fetch['tour_type']?></h3>
						<h3 style = "color:#00ff00;"><?php echo "Php. ".$fetch['price'].".00";?></h3>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-4" style = "color:#000000;">
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Book Date</label>
							<input type = "date" class = "form-control" name = "date" required = "required" /><br/>
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
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>