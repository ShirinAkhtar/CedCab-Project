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
    
    $error  = array();
    $message = '';
    if(!isset($_SESSION['userdata'])){
        header("Location:login.php");
    }
    $Registration = new Registration();
    if(isset($_REQUEST["id"]))
    {
        $id = $_REQUEST["id"];
        $Registration->get_pass($id);
    }
    
    if (isset($_POST['submit'])) {
        $oldPass = isset($_POST['oldPass'])?$_POST['oldPass']:'';
        $newPass = isset($_POST['newPass'])?$_POST['newPass']:'';
        $sid = $_SESSION['userdata']['userid'];
        if($oldPass == $newPass)
        {
            echo '<script>alert("Same Password!")</script>';
        }
        else {
            $Registration->update_pass($sid,$newPass);
            header('Location:login.php');}
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
    <style>
        form, .content {
        width: 30%;
        margin: 0px auto;
        padding: 20px;
        border: 5px solid #f7eb4f;
        background: white;
        border-radius: 0px 0px 10px 10px;
        }
    </style>
    </head>
    <body style="padding-left:0px;">
        <div id="message">
            <?php echo $message; ?>
        </div>
        <div id = "error">
            <?php if (sizeof($error)>0 ) : ?>
                <ul>
                    <?php foreach($error as $error1): ?>
                        <li> <?php echo $error1['msg']; ?> </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
        </div>
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
        <h1 class="header"><center>Change Password</center></h1><br><br><br>
        <form id="SignUp Form" action = "password.php" method = "POST">
            <label for="Uname">Previous Password<input type="text" name="oldPass" ></label><br>
            <label for="pswd">New Password<input type="password" name="newPass" ></label><br>
            <p><input type="submit" name="submit" value="Update Password"></p>
        </form>
        <?php if ($_SESSION['userdata']['username'] == "admin") { ?>
        <a href="admin.php" class="a5" role="button" aria-pressed="true">Dashboard</a>
        <?php } else if ($_SESSION['userdata']['username'] == "shirin") 
        	{ ?>
            <a href="cabhome1.php" class="a5" role="button" aria-pressed="true">Dashboard</a> <?php } ?>
    </body>
    <?php require 'footer.php' ?>
</html>