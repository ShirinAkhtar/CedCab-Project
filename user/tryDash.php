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
			
		}
		.card-body
		{
			
			padding:20px;
        }
        .grid-container {
				display: grid;
				height: 700px;
				align-content: center;
				grid-template-columns: auto auto auto;
				grid-gap: 20px;
				background-color: black;
				padding: 20px;
			}
			
			.grid-container > div {
				background-color: rgba(255, 255, 255, 0.8);
				text-align: center;
				padding: 20px 0;
				font-size: 30px;
				opacity: 0.8;
				height: 200px;
				border-radius: 10px;
				cursor: pointer;
			}
			
			div {
				border-radius: 10px;
			}
			
			.header1 {
				padding: 65px;
				text-align: center;
				background:  #8e44ad  ;
				color: white;
				font-size: 10px;
			}
			
			.header2 {
				padding: 65px;
				text-align: center;
				background:  #27ae60 ;
				color: white;
				font-size: 10px;
			}
			
			.header3 {
				padding: 65px;
				text-align: center;
				background: #c0392b;
				color: white;
				font-size: 10px;
			}
			
			.header4 {
				padding: 65px;
				text-align: center;
				background: #FF5733;
				color: white;
				font-size: 10px;
			}
			
			.header5 {
				padding: 65px;
				text-align: center;
				background-color:  #f39c12;
				color: white;
				font-size: 10px;
			}
			
			.header6 {
				padding: 65px;
				text-align: center;
				background-color: #07c3f5;
				color: white;
				font-size: 10px;
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
					<li><a href="logout.php"><button type="button" class="btn btn-primary" id="rcorners2">Logout</button></a></li>
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
    <div class="grid-container">
			<div onclick="location.href='completedRide.php'">
				<div class="header7">
					<h1>Rs.</h1>
					<h3>Total Earning</h3>
				</div>
			</div>
			<div onclick="location.href='all.php'">
				<div class="header2">
					<h1><i class="fa fa-database" style="font-size:36px;" aria-hidden="true"></i></h1>
					<h3>All Records</h3> 
				</div>
			</div>
			<div onclick="location.href='pendingRide.php'">
				<div class="header3">
					<h1><i class="fa fa-bus" aria-hidden="true" style="font-size:36px;"></i></h1>
					<h3>Pending Ride</h3> 
				</div>
			</div>
			<div onclick="location.href='analysis.php'">
				<div class="header6">
					<h1><i class="fa fa-bar-chart" aria-hidden="true" style="font-size:36px;"></i></h1>
					<h3>Report Analysis</h3> 
				</div>
			</div>
		</div>
</div>
</body>
</html>