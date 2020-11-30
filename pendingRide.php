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
$Ride = new Ride();  
$store1 = $Ride->avilable_rides();
$total=0;

if(isset($_POST['date'])) {
    $store1 = $Ride-> rides_sortByDate();
}
if(isset($_POST['distance'])) {
    $store1 = $Ride-> ride_sortByDistance();
}
if(isset($_POST['fare'])) {
    $store1 = $Ride-> ride_sortByFare();
}
?>
<html>
	<head>
		<title>CedCab</title>
		<link type="text/css" rel="stylesheet" href="style.css"> 
	</head>
	<body style="background-color:white;"><br/>
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-9">
						<h3 class="panel-title"><center>Ride Request List</center></h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="exam_data_table" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Ride Id</th>
								<th>Ride Date</th>
								<th>Ride From</th>
								<th>Ride To</th>
								<th>Total Distance</th>
								<th>Cab Type</th>
								<th>Luggage</th>
								<th>Total Fare</th>
								<th>Status</th>
								<th>Action</th>
								<th>
									<input type="submit" name="date" value="Date" class="input" />
									<input type="submit" name="distance" value="Distance" class="input" />
									<input type="submit" name="fare" value="Total Fare" class="input" />
								</th>
							</tr>
						</thead>
						<?php foreach($store1 as $key=> $value){
                				if($value['status'] == 0){
                   					$total = $total + $value['tfare'];?>
						<tr>
							<td><?php echo $value['Rid'] ?></td>
							<td><?php echo $value['Rdate']; ?></td>
							<td><?php echo $value['Rfrom']; ?></td>
							<td><?php echo $value['Rto']; ?></td>
							<td><?php echo $value['tdistance']; ?></td>
							<td><?php echo $value['cabtype']; ?></td>
							<td><?php echo $value['lug']; ?></td>
							<td><?php echo $value['tfare']; ?></td>
							<td><?php echo $value['status']; ?></td>
							<td><a href="deleteRide.php?action=edit&id=<?php echo $value['Rid'];?>" onClick="return confirm('Are you sure you want to delete?')" class="del_btn">Delete</a> </td>
						</tr><?php } 
        					}?>
						<tr>
							<td><?php echo "Total Earnings:".$total; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>