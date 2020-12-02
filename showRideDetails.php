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
require 'header2.php';
require 'class.php';
$id = $_REQUEST["id"];
$Ride = new Ride();  
$store1 = $Ride->avilable_rides2($id);
$total=0;
if(isset($_POST['date'])) {
    $store1 = $Ride-> rides_sortByDate();
    //header('Location: request.php');
}
if(isset($_POST['distance'])) {
    $store1 = $Ride-> ride_sortByDistance();
    //header('Location: request.php');
}
if(isset($_POST['fare'])) {
    $store1 = $Ride-> ride_sortByFare();
    
}
?>
<html>
	<head>
		<title>CedCab</title>
	</head>
	<body style="background-color:white;"><br/>
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-9">
						<h3 class="panel-title"><center>Invoices</center></h3> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<form method="post">
						<table id="exam_data_table" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>User Name</th>
									<th>Ride Date</th>
									<th>Ride From</th>
									<th>Ride To</th>
									<th>Total Distance</th>
									<th>Cab Type</th>
									<th>Luggage</th>
									<th>Total Fare</th>
									
								</tr>
							</thead>
							<?php foreach($store1 as $key=> $value){
                					//if($value['Uid'] == $_SESSION['userdata']['userid']){
                   						$total = $total + $value['tfare']; ?>
										<tr>
											<td><?php echo $_SESSION['userdata']['dataname'] ?></td>
											<td><?php echo $value['Rdate']; ?></td>
											<td><?php echo $value['Rfrom']; ?></td>
											<td><?php echo $value['Rto']; ?></td>
											<td><?php echo $value['tdistance']; ?></td>
											<td><?php echo $value['cabtype']; ?></td>
											<td><?php echo $value['lug']; ?></td>
											<td><?php echo $value['tfare']; ?></td>
						
										<?php //}?>
									</tr>
								<?php }?>
								<tr>
								<td><?php echo "Total Earnings:".$total; ?></td>
								</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>