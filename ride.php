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
if(isset($_SESSION['userdata']) && ($_SESSION['userdata']['isAdmin'] == 1)) 
{
	$Ride = new Ride();  
	$store1 = $Ride->avilable_rides();
	$total=0;
	
	if(isset($_POST['Adate'])) {
		$store1 = $Ride-> rides_sortByDate();
	}

	if(isset($_POST['Ddate'])) {
		$store1 = $Ride-> rides_sortByDateDESC();
	}

	if(isset($_POST['distance'])) {
		$store1 = $Ride-> ride_sortByDistance();    
	}

	if(isset($_POST['Ddistance'])) {
		$store1 = $Ride->ride_sortByDistanceDESC();    
	}

	if(isset($_POST['fare'])) {
		$store1 = $Ride-> ride_sortByFare();
	}
	if(isset($_POST['Dfare'])) {
		$store1 = $Ride-> ride_sortByFareDESC();
	}

	if(isset($_POST['cabtype'])) {
		$store1 = $Ride-> ride_sortByCab();
	}
	if(isset($_POST['Dcabtype'])) {
		$store1 = $Ride-> ride_sortByCabDESC();
	}

	if(isset($_POST['lugg'])) {
		$store1 = $Ride-> ride_sortBylugg();
	}
	if(isset($_POST['Dlugg'])) {
		$store1 = $Ride-> ride_sortByDlugg();
	}

	if(isset($_POST['filter'])) {
		$startdate = isset($_POST['startdate'])?$_POST['startdate']:'';
		$endate = isset($_POST['endate'])?$_POST['endate']:'';
		//echo '<script>alert(' .$startdate. ' from '.$endate. ')</script>';
		
		echo $startdate.'<br>';
		echo $endate;
		$store1 = $Ride-> ride_filterByDate($startdate,$endate);
	}

	if(isset($_POST['fare_filter'])) {
		$fare = isset($_POST['fare'])?$_POST['fare']:'';
		$Ride-> FareFilter($fare);
		$store1 = $Ride-> FareFilter($fare);
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
						<h3 class="panel-title"><center>Ride Request List</center></h3>
					</div>
				</div>
			</div>
			
			<div class="card-body">
				<div class="table-responsive">
					
						<table id="exam_data_table" class="table table-bordered table-striped table-hover">
						<thead>
							<tr><th>Filter By Date:</th>
								<th>  <?php if (!isset($_POST['filter'])) {?>
								<form method="post">
									<input type="date" name="startdate"/></th>
								<th><input type="date" name="endate"/></th>
								  <th><input type="submit" name="filter" value="Filter"/>
								</form>
								<?php } else {?>
                                <button><a href="ride.php">Clear</a></button>
                            <?php } ?></th>
								</th>
								<th>Filter By Fare:</th>
								<th><?php if (!isset($_POST['fare_filter'])) {?>
								<form method="post">
									<input type="text" name="fare" id="s1"/></th>
								  	<th><input type="submit" name="fare_filter" value="Filter"/>
								</form>
								<?php } else {?>
                                <button><a href="ride.php">Clear</a></button>
                            <?php } ?></th>
							</tr>
								<tr>
									<th>Ride Id</th>
									<th>User Id</th>
									<form method="post">
										<th style="padding-right:25px">Ride Date<button type="submit" name="Adate" class="input">
										<i class="fa fa-angle-up" aria-hidden="true"></i></button>
										<button type="submit" name="Ddate" class="input">
										<i class="fa fa-angle-down" aria-hidden="true"></i></button>
										</th>
									</form>
									<th>Ride From</th>
									<th>Ride To</th>
									<th>Total Distance
									<form method="post">
										<button type="submit" name="distance"  class="input">
										<i class="fa fa-angle-up" aria-hidden="true"></i></button>
										<button type="submit" name="Ddistance" value="Total Fare" class="input">
										<i class="fa fa-angle-down" aria-hidden="true"></i></button>
									</form>
									</th>
									<th>Cab Type
									<form method="post">
										<button type="submit" name="cabtype" value="Total Fare" class="input"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
										<button type="submit" name="Dcabtype" value="Total Fare" class="input"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									</form></th>
									<th>Luggage
									<form method="post">
										<button type="submit" name="lugg" value="Total Fare" class="input"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
										<button type="submit" name="Dlugg" value="Total Fare" class="input"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									</form>
									</th>

									<th style="padding-right:25px">Total Fare
									<form method="post">
										
										<button type="submit" name="fare" value="Total Fare" class="input"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
										<button type="submit" name="Dfare" value="Total Fare" class="input"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									</form>	
								</th>
									
									<th>Action</th>
								</tr>
							</thead>
							<?php 
            					foreach($store1 as $key=> $value){
               						$total = $total + $value['tfare'];?>
								<tr>
									<td>
										<?php echo $value['Rid'] ?>
									</td>
									<td>
										<?php echo $value['Uid'] ?>
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
										<?php echo $value['tdistance']; ?> km
									</td>
									<td>
										<?php echo $value['cabtype']; ?>
									</td>
									<td>
										<?php echo $value['lug']; ?> kg
									</td>
									<td>
										<?php echo $value['tfare']; ?> Rupees
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
<?php require 'footer.php' ?>
</html>
<?php } else
{
	header('Location:login.php');
}?>