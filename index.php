<?php
$time = $_SERVER['REQUEST_TIME'];
//echo $time;
$timeout_duration = 180;
require 'class.php';
$Location = new Location();  
$lo = $Location->location_avilable();
//print_r($_SESSION['userdata']);
//session_destroy();
if(isset($_SESSION['booking'])){
$Ride = new Ride();
$ride_store = $Ride->store_ride( $_SESSION['userdata']['userid'],$_SESSION['booking']['pick'], $_SESSION['booking']['drop'], $_SESSION['booking']['dist'], $_SESSION['booking']['cabType'], $_SESSION['booking']['lug'], $_SESSION['booking']['amt'],  $_SESSION['booking']['status']);
unset($_SESSION['booking']);}
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    unset($_SESSION['booking']);
    session_destroy();
    session_start();
}
$_SESSION['LAST_ACTIVITY'] = $time;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Book Your Cab Ride</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="cab.css"> 
    </head>
	<body>
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
						<?php if(isset($_SESSION['userdata'])) {?>
						<li><a href="dashboard.php" id="wel">Welcome <?php echo $_SESSION['userdata']['username'] ?> </a></li>
						<li><a href="history.php" id="all" class="flex-sm-fill text-sm-center">All Ride Records</a> </li>
						<li>
							<a href="logout.php">
								<button type="button" class="btn btn-primary" id="rcorners2">Logout</button>
							</a>
						</li>
						<?php } else { ?>
							<li><a href="#"  id="wel">Welcome Guest </a></li>
							<li><a href="login.php"  id="all" class="flex-sm-fill text-sm-center">Login</a> </li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
		<section id="wallpaper">
			<div class="image">
				<div class="container py-3">
					<div class="row " style="text-align:center;">
						<div class="head">
							<h1 class="flex-sm-fill text-sm-center">Book a city taxi to your destination in town</h1> </div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<form method="post">
								<h4><button>City Taxi</button></h4>
								<h5>Your Everyday Travel Patner</h5>
								<h6>AC cabs from point to point location</h6>
								<div class="input-group"> <span class="input-group-addon">PICK UP</span>
									<select id="msg4" class="custom-select form-control" required>
										<option selected >Current Location</option>
										<?php	foreach($lo as $key=> $value){
											if($value['Lavilable'] == 0 ){ ?>
											<option value="<?php echo $value['Lname']; ?>">
												<?php echo $value['Lname']; ?>
											</option><?php } ?>
											<?php } ?>
									</select>
								</div>
								<div class="input-group"> <span class="input-group-addon">DROP</span>
									<select id="msg3" class="custom-select form-control" required>
										<option selected >Enter drop for ride estimate</option>
										<?php foreach($lo as $key=> $value) { 
											if($value['Lavilable'] == 0 ){ ?>
											<option value="<?php echo $value['Lname']; ?>">
												<?php echo $value['Lname']; ?>
											</option><?php } ?>
											<?php } ?>
									</select>
								</div>
								<div class="input-group"> <span class="input-group-addon">CAB TYPE</span>
									<select id="msg2" class="custom-select form-control ms2" required>
										<option selected >Drop Down to select CAB Type</option>
										<option value="CedMicro">CedMicro</option>
										<option value="CedMini">CedMini</option>
										<option value="CedRoyal">CedRoyal</option>
										<option value="CedSUV">CedSUV</option>
									</select>
								</div>
								<div class="input-group"> <span class="input-group-addon">LUGGAGE</span>
								<input id="msg1" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control ms1" placeholder="Enter weight in kg"> </div>
								<button id="cabf" class="btn btn-default form-control" type="submit" name="submit">Calculate Your Fair</button>
								<button id="cabff" style="display:none;" class="btn btn-default form-control" type="submit" name="submit">Book Now</button>
								<div id="res"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div id="footer">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="p1"><span class="fa fa-heart" style="font-size:8px;color: rgb(253, 250, 44);"></span> Created by Shirin Akhtar</p>
			</div>
		</div>
	</body>
	<script>
	$('#msg2').change(function() {
		if($(this).val() == 'CedMicro') {
			$('#msg1').prop("disabled", true);
		} else {
			$('#msg1').prop("disabled", false);
		}
	});
	$('#cabf').on("click", function(e) {
		document.getElementById("cabff").style.display = "block";
		document.getElementById("cabf").style.display = "none";
		var pick = $("#msg4").val();
		var drop = $("#msg3").val();
		var cabType = $("#msg2").val();
		var lug = $("#msg1").val();
		console.log(pick);
		console.log(drop);
		console.log(cabType);
		if(pick == drop)
		{
			alert("Pick and Drop location should be different!");
		}
		else if(pick =="Current Location" || drop == "Enter drop for ride estimate" || cabType == "Drop Down to select CAB Type")
		{
			alert("Pick Select valid input!");
		}
		else {
		$.ajax({
			method: 'POST',
			url: 'cab.php',
			dataType: 'html',
			data: {
				pick: pick,
				drop: drop,
				cabType: cabType,
				lug: lug
			},
			success: function(response) {
				$("#res").html(response);
			}
		}); }
		e.preventDefault();
		});

        $('#cabff').on("click", function(e) {
		
		var pick = $("#msg4").val();
		var drop = $("#msg3").val();
		var cabType = $("#msg2").val();
		var lug = $("#msg1").val();
		var action = 1;
		console.log(pick);
		console.log(drop);
		console.log(cabType);
		console.log(action);
		if(pick == drop)
		{
			alert("Pick and Drop location should be different!");
		}
		else if(pick =="Current Location" || drop == "Enter drop for ride estimate" || cabType == "Drop Down to select CAB Type")
		{
			alert("Pick Select valid input!");
		}
		else {
		<?php if(isset($_SESSION['userdata'])) {?>
		
        $.ajax({
            method: 'POST',
            url: 'cab.php',
            dataType: 'html',
            data: {
                pick: pick,
                drop: drop,
                cabType: cabType,
                lug: lug,
                action: 1
            },
            success: function(response) {
				$("#res").html(response);
				console.log($text);
				
            }
		});
		<?php }
		else { ?>
			$.ajax({
            method: 'POST',
            url: 'cab.php',
            dataType: 'html',
            data: {
                pick: pick,
                drop: drop,
                cabType: cabType,
                lug: lug,
                action: 2
            },
            success: function(response) {
                window.location.href = "login.php";
            }
		});
	<?php } ?> }
		e.preventDefault();
	});
</script>

</html>