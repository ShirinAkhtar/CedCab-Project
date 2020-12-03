<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

require 'class.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CedCab</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Book Your Cab Ride</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="cab.css">
		<style>
		* {
			box-sizing: border-box;
		}
		
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		
		header {
			background-color: grey;
			padding: 30px;
			text-align: center;
			font-size: 35px;
			color: white;
		}
		
		section {
			display: -webkit-flex;
			display: flex;
		}
		
		nav {
			-webkit-flex: 1;
			-ms-flex: 1;
			flex: 1;
			background: #ccc;
			padding: 20px;
		}
		
		nav ul {
			list-style-type: none;
			padding: 0;
		}
		
		article {
			-webkit-flex: 3;
			-ms-flex: 3;
			flex: 3;
			background-color: #f1f1f1;
			padding: 10px;
		}
		
		footer {
			background-color: black;
			padding: 10px;
			text-align: center;
			color: white;
		}
		
		@media (max-width: 600px) {
			section {
				-webkit-flex-direction: column;
				flex-direction: column;
			}
		}
		
		.button {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			background-color: #555555;
		}
		.card-header
		{
			margin-left: 400px;
		}
		.card-body
		{
			margin-left: 400px;
			padding:20px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
		<div class="container-fluid">
			<div class="navbar-header"> <img src="logo1.png" id="img2" onclick="window.open('index.php', '_blank');" />
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-border-width" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" /> </svg>
				</button>
			</div>
			<div class="collapse navbar-collapse text-sm-center" id="collapsibleNavbar">
				<ul class="nav navbar-nav navbar-right text-center">
					<li><a href="index.php">Home</a></li>
					<li><a href="dashboard.php">Welcome <?php $_SESSION['userdata']['username']?> </a></li>
					<li><a href="history.php" class="flex-sm-fill text-sm-center">All Ride Records</a> </li>
					<li>
						<a href="logout.php">
						<button type="button" class="btn btn-primary" id="rcorners2">Logout</button>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<section>
	<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="panel-title"><center><h2>Welcome <?php echo $_SESSION['userdata']['dataname']; ?></h2></center</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
        <div class="table-responsive">
        <table id="exam_data_table" class="table table-bordered table-striped table-hover">
			<tr><td>User Id:-</td><td><?php echo $_SESSION['userdata']['userid']; ?></td></tr>
			<tr><td>Your Username:-</td><td><?php echo $_SESSION['userdata']['username']; ?></td></tr>
			<tr><td>Your Name:-</td><td><?php echo $_SESSION['userdata']['dataname']; ?></td></tr>		
			<tr><td>Your Mobile Number:-</td><td><?php echo $_SESSION['userdata']['datamobile']; ?></td></tr>		
			<tr><td><a class="button" href="update.php?action=edit&id=<?php echo $_SESSION['userdata']['userid'];?>"> Edit Your Profile </a></td></tr>
	</table>
	</div>
	</div>
</div>
</body>

</html>