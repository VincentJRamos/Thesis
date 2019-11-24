<?php
	require_once 'validate.php';
	require 'name.php';

	$tours = $conn->query("SELECT * FROM tour LEFT JOIN tour_type ON tour.tour_type = tour_type.id ORDER BY tour_id ASC") or die(mysqli_error());

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Raizen Travel and Tours - Add closed dates</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
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
			<div class = "panel-body">
				<div class = "alert alert-info">Transaction / Tour / Add closed dates</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" enctype = "multipart/form-data" autocomplete="off">
						<div class = "form-group">
							<label>Tour Selected</label>
							<select class = "form-control" required = required name = "tour">
								<option value = "">Choose an tour package</option>
								<?php
									while($row = mysqli_fetch_assoc($tours))
									{
										echo "<option value='".$row['tour_id']."'>".$row['tour_type_name']."</option>";
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="block_date">Date to closed</label>
							<input type="text" name="block_date" class="form-control datepicker">
						</div>

						<div class="form-group">
							<label for="remarks">Remarks</label>
							<input type="text" name="remarks" class="form-control">
						</div>

						<br />
						<div class = "form-group">
							<button name = "add_tour_closed_dates" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i>Saved</button>
						</div>
					</form>
					<?php require_once 'add_query_tour_closed_dates.php'?>
				</div>
			</div>
		</div>
	</div>
	<?php include ("footer.php"); ?>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
</script>

</html>