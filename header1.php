
<!DOCTYPE html>
<html>
<head>
	<title>CedCab</title>
  <link type = "text/css" rel = "stylesheet" href = "style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#img2 {
	width: 120px;
	border-radius: 25px;
}
</style>

</head>
<body>

<div class="sidenav">
<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
    <div class="container-fluid">
			<div class="navbar-header"> <img src="logo1.png" id="img2" onclick="window.open('index.php', '_blank');" />
    </div>
  </div>
  </nav>
<a href="admin.php">Dashboard</a>
<a href="request.php">All Users</a>
<a href="requestApproved.php">Approved Users</a>
<a href="Disapp.php">Requested Users</a>
<a href="location.php" class="dropbtn">Locations</a>
<a href="addlocation.php">Add Locations</a>
<a href="ride.php" class="dropbtn">Ride</a>
<a href="pendingRide.php">Pending Rides</a>
<a href="completedRide.php">Completed Rides</a> 
<a href="all.php">All Data</a>
<a href="analysis.php">Analysis Report</a>
<a href="logout.php">Logout</a>
</div>
