<?php require 'dash.php'; ?>
	<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
		<div class="container-fluid">
			<div class="navbar-header"> <img src="logo1.png" id="img2" onclick="window.open('index.php', '_blank');" />
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
<section>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="panel-title"><center><h2>Welcome <?php echo $_SESSION['userdata']['dataname']; ?></h2></center</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
        <div class="table-responsive">
        	<table id="exam_data_table" class="table table-bordered table-striped table-hover">
				<tr><td>User Id:-</td><td><?php echo $_SESSION['userdata']['userid']; ?></td></tr>
				<tr><td>Your Username:-</td><td><?php echo $_SESSION['userdata']['username']; ?></td></tr>
				<tr><td>Your Name:-</td><td><?php echo $_SESSION['userdata']['dataname']; ?></td></tr>		
				<tr><td>Your Mobile Number:-</td><td><?php echo $_SESSION['userdata']['datamobile']; ?></td></tr>		
				<tr><td><a class="button" href="update.php?action=edit&id=<?php echo $_SESSION['userdata']['userid'];?>"> Edit Your Profile </a></td></tr>
			</table>
		</div>
	</div>
</div>
</body>
<?php require 'footer.php' ?>
</html>