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
//print_r($_SESSION['userdata']);
if(isset($_SESSION['userdata']) && ($_SESSION['userdata']['isAdmin'] == 1)) 
{
	
	$Registration = new Registration();  
	$store1 = $Registration->userRequest();
$total=0;
	$Ride = new Ride();  
	$store2 = $Ride->avilable_rides();
	foreach($store2 as $key=> $value)
	{
		if($value['status'] == 1)
		{
			$total = $total + $value['tfare'];
			//if($total)
		}
	}
	$Location = new Location();  
	$loc = $Location->location_avilable();
?><?php require 'adminHead.php';?>

	<body style="background-color:black">
	<!--	<div class="topnav-right">
			<select name="dropDown" onchange="location = this.value;">
				<option value="admin.php">Admin</option>
				<option value="adminPass.php">Password</option>
				<option value="logout.php"><a href="logout.php">Logout</a></option>
			</select>
		</div>-->
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
	<?php require 'footer.php' ?>
</html>
	<?php }
	else
	{ 
		header('Location:login.php');
	}
?>