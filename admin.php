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
require 'header1.php';
require 'class.php';
if(!isset($_SESSION['userdata'])) 
{
	header('Location:login.php');
}
$Registration = new Registration();  
$store1 = $Registration->userRequest();

$Ride = new Ride();  
$store2 = $Ride->avilable_rides();
foreach($store2 as $key=> $value)
{
	if($value['status'] == 1)
	{
		$total = $total + $value['tfare'];
	}
}
$Location = new Location();  
$loc = $Location->location_avilable();
?>
<html>
<head>
	<title>Dashboard</title>
	<link type="text/css" rel="stylesheet" href="style.css">
		<style>
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

			.header7 {
				padding: 65px;
				text-align: center;
				background-color: #34495e;
				color: white;
				font-size: 10px;
			}
			
			body {
				padding-left: 200px;
				background-color: #d0cbd0;
			}
			
			.a1:link,
			.a1:visited {
				background-color: #f44336;
				color: white;
				float: none;
				padding: 8px 15px;
				margin-top: 5px;
				text-align: center;
				text-decoration: none;
				display: inline;
			}
			
			.a1:hover,
			.a1:active {
				background-color: grey;
			}
			
			.topnav-right {
				float: right;
			}
		</style>
</head>

	<body style="background-color:black">
		<div class="topnav-right">
			<select name="dropDown" onchange="location = this.value;">
				<option value="admin.php">Admin</option>
				<option value="adminPass.php">Password</option>
				<option value="logout.php"><a href="logout.php">Logout</a></option>
			</select>
		</div>
		<div class="grid-container">
			<div onclick="location.href='completedRide.php'">
				<div class="header7">
					<h1>Rs. <?php echo $total ?></h1>
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
			<div onclick="location.href='completedRide.php'">
				<div class="header4">
					<h1><i class="fa fa-car" aria-hidden="true" style="font-size:36px;"></i></h1>
					<h3>Completed Ride</h3>
				</div>
			</div>
			<div onclick="location.href='location.php'">
				<div class="header5">
					<h1><?php echo sizeof($loc);?></h1>
					<h3>Total Locations</h3> 
				</div>
			</div>
			<div onclick="location.href='analysis.php'">
				<div class="header6">
					<h1><i class="fa fa-bar-chart" aria-hidden="true" style="font-size:36px;"></i></h1>
					<h3>Report Analysis</h3> 
				</div>
			</div>
		</div>
	</body>
</html>