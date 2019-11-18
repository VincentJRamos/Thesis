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
				<strong><h3 style = "color:#000000;">BOOK YOUR TOUR</h3></strong>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `tour` ORDER BY `price` ASC") or die(mysql_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "well" style = "height:300px; width:100%;">
						<div style = "float:left;">
							<img src = "photo/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3 style = "color:#000000;"><?php echo $fetch['tour_type']?></h3>
							<h4 style = "color:#00ff00;"><?php echo "Price: Php. ".$fetch['price'].".00"?></h4>
							<br /><br /><br /><br /><br /><br />
							<a style = "margin-left:580px;" href = "add_reserve.php?tour_id=<?php echo $fetch['tour_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i>Book Now!</a>
						</div>
					</div>
				<?php
					}
				?>
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

</body>	
</html>