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
$Ride = new Ride();  
$store1 = $Ride->avilable_rides();
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
    //header('Location: request.php');
}
if(isset($_POST['filter'])) {
	$startdate = isset($_POST['startdate'])?$_POST['startdate']:'';
    $endate = isset($_POST['endate'])?$_POST['endate']:'';
    $store1 = $Ride-> ride_filterByDate($startdate,$endate);
    //header('Location: request.php');
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
						<h3 class="panel-title"><center>Ride Request List</center></h3> </div>
				</div>
			</div>
			
			<div class="card-body">
				<div class="table-responsive">
				
					<form method="post">
						<table id="exam_data_table" class="table table-bordered table-striped table-hover">
						
							<thead>
							<tr>
								<th>
									<input type="submit" name="date" value="Date" class="input" />
									<input type="submit" name="distance" value="Distance" class="input" />
									<input type="submit" name="fare" value="Total Fare" class="input" />
									<input type="date" name="startdate"/>
									<input type="date" name="endate"/>
  									<input type="submit" name="filter" value="Filter"/>
								</th>
							</tr>
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
										
									<th>
								</tr>
							</thead>
							<?php 
            					foreach($store1 as $key=> $value){
               						$total = $total + $value['tfare'];?>
								<tr>
									<td>
										<?php echo $value['Rid'] ?>
									</td>
									<?php $date = $value['Rdate'];
									  $createDate = new DateTime($date);
									  $strip = $createDate->format('Y-m-d');?>
									<td>
										<?php echo $value['Rdate']; ?>
									</td>
									<td>
										<?php echo $value['Rfrom']; ?>
									</td>
									<td>
										<?php echo $value['Rto']; ?>
									</td>
									<td>
										<?php echo $value['tdistance']; ?>
									</td>
									<td>
										<?php echo $value['cabtype']; ?>
									</td>
									<td>
										<?php echo $value['lug']; ?>
									</td>
									<td>
										<?php echo $value['tfare']; ?>
									</td>
									<td>
										<?php echo $value['status']; ?>
									</td>

									

									<td> <a href="deleteRide.php?action=edit&id=<?php echo $value['Rid'];?>" onClick="return confirm('Are you sure you want to delete?')" class="del_btn">Delete</a> </td>
								</tr>
								<?php
         }?>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">

    $(document).ready(function(){
		document.getElementById("btn1").style.display = "none";
        $('#cabf').on("click", function(e) {
			document.getElementById("btn1").style.display = "block";
		});
    });
</script>
	</html>