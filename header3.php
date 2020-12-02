
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
</style>

</head>
<body>

<div class="sidenav">
<nav class="navbar navbar-inverse nav-pills flex-column flex-sm-row navbar-expand-md">
    <div class="container-fluid">
			<div class="navbar-header"> <img src="logo1.png" id="img2" />
    </div>
  </div>
  </nav>

<a href="index.php">Home</a>
<a href="history.php">All Ride Record</a>
<a href="logout.php">Logout</a>
</div>
