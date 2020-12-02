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
if (!isset($_SESSION['userdata'])) {
    header('Location: login.php');
}
$Ride = new Ride();  
$id = $_SESSION['userdata']['userid'];
$store1 = $Ride->ride_history($id);
?>
<html>
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
</head>
<body style="background-color:white">
<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
		<div class="container-fluid">
			<div class="navbar-header"> <img src="logo1.png" id="img2" onclick="window.open('index.php', '_blank');"/>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-border-width" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" /> </svg>
				</button>
			</div>
			<div class="collapse navbar-collapse text-sm-center" id="collapsibleNavbar">
				<ul class="nav navbar-nav navbar-right text-center">
                <li><a href="index.php">Home</a></li>
				<li><a href="userPending.php">Pending Ride</a></li>
				<li><a href="userApprove.php" class="flex-sm-fill text-sm-center">Approved Rides</a> </li>
					
					<li>
					<a href="logout.php"><button type="button" class="btn btn-primary" id="rcorners2">Logout</button></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="exam_data_table" 
            class="table table-bordered table-striped table-hover">
            <thead><tr><th>1.Pending List<th></tr>
                <tr>
                    <th>Ride Date and Time</th>
                    <th>Ride From</th>
                    <th>Ride To</th>
                    <th>Total Distance</th>
                    <th>Cab Type</th>
                    <th>Luggage</th>
                    <th>Total Fare</th>
                   
                </tr>
            </thead>
            <?php 
            foreach($store1 as $key=> $value){
                if($value['status'] == 1) {
            ?> 
            <tr>
            
            <td><?php echo $value['Rdate']; ?></td>
            <td><?php echo $value['Rfrom']; ?></td>
            <td><?php echo $value['Rto']; ?></td>
            <td><?php echo $value['tdistance']; ?></td>
            <td><?php echo $value['cabtype']; ?></td>
            <td><?php echo $value['lug']; ?></td>
            <td><?php echo $value['tfare']; ?></td>        
        </tr><?php
         }?><?php
        }?>
        </table>
    </div>
    
</div>
</div>
</body>
</html>