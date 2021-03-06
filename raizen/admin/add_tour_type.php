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
				<div class = "alert alert-info">Transaction / Tour / Add Tour type</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Tour type name </label>
							<input type = "text" class = "form-control" name = "tour_type_name" />
						</div>
						<div class = "form-group">
							<button name = "add_tour_type" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i>Saved</button>
						</div>
					</form>
					<?php require_once 'add_query_tour_type.php'?>
				</div>
			</div>
		</div>
	</div>
	<?php include ("footer.php"); ?>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</html>