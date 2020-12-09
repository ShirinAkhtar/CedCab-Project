
<!DOCTYPE html>
<html>
<head>
	<title>CedCab</title>
  <link type = "text/css" rel = "stylesheet" href = "style2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
body {
  font-family: "Lato", sans-serif;
}
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
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px;
  font-size: 20px; 
  padding: 0px 10px;
}

.active {
  background-color: green;
  color: white;
}
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

.fa-caret-down {
  float: right;
  padding-right: 8px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#img2 {
	width: 120px;
	border-radius: 25px;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
    color:black;
}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

</head>
<body>

  <!-- side bar section --->
<div class="sidenav">
  <nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
    <div class="container-fluid">
			<div class="navbar-header"> <img src="logo1.png" id="img2" onclick="window.open('index.php', '_blank');"/>
    </div>
  </div>
  </nav>
  <a href="admin.php">Dashboard</a>
  <div class="dropdown">
<a href="request.php" class="dropdown">All Users</a>
<div class="dropdown-content">
<a href="requestApproved.php">Approved Users</a>
<a href="Disapp.php">Requested Users</a>
  </div></div>
<a href="location.php" class="dropbtn">Locations</a>
<a href="addlocation.php">Add Locations</a>
<a href="ride.php" class="dropbtn">Ride</a>
<a href="pendingRide.php">Pending Rides</a>
<a href="completedRide.php">Completed Rides</a> 
<a href="adminPass.php">Change Password</a>
<a href="analysis.php">Analysis Report</a>
<a href="logout.php">Logout</a>
</div>
