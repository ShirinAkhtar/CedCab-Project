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
if(isset($_SESSION['userdata']) && ($_SESSION['userdata']['isAdmin'] == 0)) 
{
    if(isset($_SESSION['booking']))
    {
        echo '<script>alert("Successfully Booking Done!")</script>';
        $Ride = new Ride();
        $ride_store = $Ride->store_ride( $_SESSION['userdata']['userid'],$_SESSION['booking']['pick'], $_SESSION['booking']['drop'], $_SESSION['booking']['dist'], $_SESSION['booking']['cabType'], $_SESSION['booking']['lug'], $_SESSION['booking']['amt'],  $_SESSION['booking']['status']);
        unset($_SESSION['booking']);
        
    }

    $id = $_SESSION['userdata']['userid'];
    $Ride = new Ride();  
    $store1 = $Ride->ride_history($id);

    if(isset($_POST['date'])) {
        $store1 = $Ride-> rides_sortByDate1($id);
    }

    if(isset($_POST['Ddate'])) {
        $store1 = $Ride-> rides_sortByDateDESC();
    }
    if(isset($_POST['distance'])) {
        $store1 = $Ride-> ride_sortByDistance1($id);
    }
    if(isset($_POST['Ddistance'])) {
        $store1 = $Ride->ride_sortByDistanceDESC();    
    }
    if(isset($_POST['fare'])) {
        $store1 = $Ride-> ride_sortByFare1($id);
    }
    if(isset($_POST['Dfare'])) {
        $store1 = $Ride-> ride_sortByFareDESC();
    }

    if(isset($_POST['filter'])) {
        $id = $_SESSION['userdata']['userid'];
        $startdate = isset($_POST['startdate'])?$_POST['startdate']:'';
        $endate = isset($_POST['endate'])?$_POST['endate']:'';
        $store1 = $Ride-> ride_filterByDate1($startdate,$endate,$id);
    }
    if(isset($_POST['fare_filter'])) {
        $fare = isset($_POST['fare'])?$_POST['fare']:'';
        $Ride-> FareFilter($fare);
        $store1 = $Ride-> FareFilter($fare);
    }
    if(isset($_POST['cancel'])) {
        $id = isset($_POST['rideid'])?$_POST['rideid']:'';
        $Ride-> CancelRide($id);
        $store1 = $Ride->ride_history($_SESSION['userdata']['userid']);
        //print_r( $store1);
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

    
?>
<html>
<head>
    <title>CedCab</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="cab1.css"> 
</head>
<body style="background-color:white">
<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
		<div class="container-fluid">
			<div class="navbar-header"><img src="logo1.png" id="img2" onclick="window.open('index.php', '_blank');"/>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-border-width" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" /> </svg>
				</button>
			</div>
			<div class="collapse navbar-collapse text-sm-center" id="collapsibleNavbar">
				<ul class="nav navbar-nav navbar-right text-center">
                <li><a href="index.php">Home</a></li>
				<li><a href="" id="wel">Welcome <?php echo $_SESSION['userdata']['username'] ?> </a></li>
                <li><a href="dashboard.php" id="wel">Profile</a></li>
                <li><a href="history.php" id="all" class="flex-sm-fill text-sm-center">All Ride Records</a> </li>
                <li><a href="userPending.php" id="all" class="flex-sm-fill text-sm-center">Pending Ride</a> </li>
                <li><a href="userApprove.php" id="all" class="flex-sm-fill text-sm-center">Completed Ride</a> </li>
                <li><a href="logout.php"><button type="button" class="btn btn-primary" id="rcorners2">Logout</button></a></li>
                </ul>
			</div>
		</div>
	</nav>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
        <form method="post">
            <table id="exam_data_table" class="table table-bordered table-striped table-hover">
                <thead> 
                    <tr>
						<th>
                            <?php if (!isset($_POST['filter'])) {?>
                                <form method="post">
                                    <input type="date" name="startdate"/>
                                    <input type="date" name="endate"/>
                                    <input type="submit" name="filter" value="Filter Date"/>
                                </form>
                            <?php } else {?>
                                <input type="date" name="startdate"/>
                                <input type="date" name="endate"/>
                                <button><a href="history.php">Clear</a></button>
                            <?php } ?>
                        </th>
                        <th>
                        <?php if (!isset($_POST['fare_filter'])) {?>
                        <form method="post">
                            <input type="text" name="fare" id="s1"/>
                            <input type="submit" name="fare_filter" value="Filter Fare"/>
                        </form>
                        <?php } else {?>
                            <button><a href="history.php">Clear</a></button>
                            <?php } ?>
                        </th> 
					</tr>
                <tr>
                    <th>1.All List<th>
                </tr>
                <tr>
                    <th>Ride Date and Time
                    <form method="post">
                    <button type="submit" name="date" value="Date" class="input"><i class="fa fa-angle-up" aria-hidden="true" style="color:black;"></i></button>
                    <button type="submit" name="Ddate" value="Date" class="input"><i class="fa fa-angle-down" aria-hidden="true" style="color:black;"></i></button>
                    </form>   
                     </th>
                    <th>Ride From</th>
                    <th>Ride To</th>
                    <th>Total Distance
                    <form method="post">
                        <button type="submit" name="distance" value="Distance" class="input"><i class="fa fa-angle-up" aria-hidden="true" style="color:black;"></i></button>
                        <button type="submit" name="Ddistance" value="Distance" class="input"><i class="fa fa-angle-down" aria-hidden="true" style="color:black;"></i></button>
                    </form> 
                     </th>
                     <th>Cab Type
                        <form method="post">
                            <button type="submit" name="cabtype"  class="input"><i class="fa fa-angle-up" aria-hidden="true" style="color:black;"></i></button>
                            <button type="submit" name="Dcabtype"   class="input"><i class="fa fa-angle-down" aria-hidden="true" style="color:black;"></i></button>
                        </form></th>
                        <th>Luggage
                        <form method="post">
                            <button type="submit" name="lugg"   class="input"><i class="fa fa-angle-up" aria-hidden="true" style="color:black;"></i></button>
                            <button type="submit" name="Dlugg"   class="input"><i class="fa fa-angle-down" aria-hidden="true" style="color:black;"></i></button>
                        </form>
                        </th>
                    <th>Status</th>
                    <th>Total Fare<form method="post">
                    <button type="submit" name="fare"  class="input"><i class="fa fa-angle-up" aria-hidden="true" style="color:black;"></i></button>
                    <button type="submit" name="Dfare"  class="input"><i class="fa fa-angle-down" aria-hidden="true" style="color:black;"></i></button>
                </form></th>
                <th>Action</th>
                </tr>
            </thead>
            <?php 
            foreach($store1 as $key=> $value){
            ?> 
            <tr>
            <td><?php echo $value['Rdate']; ?></td>
            <td><?php echo $value['Rfrom']; ?></td>
            <td><?php echo $value['Rto']; ?></td>
            <td><?php echo $value['tdistance']; ?> km</td>
            <td><?php echo $value['cabtype']; ?></td>
            <td><?php echo $value['lug']; ?> kg</td>
            <td><?php if( $value['status']==2){ echo "Canceled"; } else if($value['status']==0){ echo "Pending"; } else{ echo "Completed"; }?></td>
            <td>Rs. <?php echo $value['tfare']; ?></td> 
            <td><?php if($value['status']==0){ ?><form method="post">
                <input type="number" name="rideid" value="<?php echo $value['Rid']; ?>" hidden/>
                <button type="submit" name="cancel" value="Cancel" onClick="return confirm('Are you sure you want to Cancel?')" class="input">Cancel</button></td>
            </form>	
            <?php } ?>		       
        </tr><?php
         }?>
        </table>
        </form>
    </div>
</div>
</div>
</body>
<?php require 'footer1.php' ?>
        </html><?php }
else
	{ 
		header('Location:login.php');
	} ?>