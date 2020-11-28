<?php
	//session_start();
	require 'class.php';
$Location = new Location();  
$lo = $Location->location_avilable();
	//if(isset($_POST['submit'])) {
		//print_r($_POST);
		//if(!isset($_SESSION)) {
		//	header("Location: http://localhost/cabride/login.php"); 
			//session_destroy();
		//}
	//}
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
		<link rel="stylesheet" href="cab.css"> </head>

	<body>
		<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
			<div class="container-fluid">
				<div class="navbar-header"> <img src="logo1.png" id="img2" />
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-border-width" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" /> </svg>
					</button>
				</div>
				<div class="collapse navbar-collapse text-sm-center" id="collapsibleNavbar">
					<ul class="nav navbar-nav navbar-right text-center">
						<li><a href="dashboard.php">Welcome <?php $_SESSION['userdata']['username']?> </a></li>
						<li><a href="history.php" class="flex-sm-fill text-sm-center">All Ride Records</a> </li>
						<li>
							<a href="login.php">
								<button type="button" class="btn btn-primary" id="rcorners2">Logout</button>
							</a>
						</li>
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
									<select id="msg4" class="custom-select form-control">
										<option selected>Current Location</option>
										<?php	foreach($lo as $key=> $value){
								?>
											<option value="<?php echo $value['Lname']; ?>">
												<?php echo $value['Lname']; ?>
											</option>
											<?php } ?>
									</select>
								</div>
								<div class="input-group"> <span class="input-group-addon">DROP</span>
									<select id="msg3" class="custom-select form-control">
										<option selected>Enter drop for ride estimate</option>
										<?php foreach($lo as $key=> $value){
								?>
											<option value="<?php echo $value['Lname']; ?>">
												<?php echo $value['Lname']; ?>
											</option>
											<?php } ?>
									</select>
								</div>
								<div class="input-group"> <span class="input-group-addon">CAB TYPE</span>
									<select id="msg2" class="custom-select form-control ms2">
										<option selected>Drop down to select CAB Type</option>
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
		});
		e.preventDefault();
	});
	$('#cabff').on("click", function(e) {
		//document.getElementById("cabff").style.display = "block";
		//document.getElementById("cabf").style.display = "none";
		var pick = $("#msg4").val();
		var drop = $("#msg3").val();
		var cabType = $("#msg2").val();
		var lug = $("#msg1").val();
		var action = 1;
		console.log(pick);
		console.log(drop);
		console.log(cabType);
		console.log(action);
		$.ajax({
			method: 'POST',
			url: 'cab.php',
			dataType: 'html',
			data: {
				pick: pick,
				drop: drop,
				cabType: cabType,
				lug: lug,
				action: action
			},
			success: function(response) {
				$("#res").html(response);
			}
		});
		e.preventDefault();
	});
	</script>

	</html>