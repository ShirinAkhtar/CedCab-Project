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
//require 'header4.php';
$error = array();
$message = '';
$id = $_REQUEST["id"];
$Registration = new Registration();
$Registration->get_val($id);
 
if (isset($_POST['submit']))
{
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $Sdate = isset($_POST['Sdate']) ? $_POST['Sdate'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';

	$Registration->set_val($id, $name, $mobile);
	//echo "<script>alert('Record Updated!')</script>";
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

<body style="background-color:white;padding-left:0px;">
	<div id="message">
		<?php echo $message; ?>
	</div>
	<div id="error">
		<?php if (sizeof($error)>0 ) : ?>
		<ul>
			<?php foreach($error as $error1): ?>
			<li>
				<?php echo $error1[ 'msg']; ?>
			</li>
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
                <li><a href="password.php" id="wel">Change Password</a></li>
                <li><a href="history.php" id="all" class="flex-sm-fill text-sm-center">All Ride Records</a> </li>
                <li><a href="userPending.php" id="all" class="flex-sm-fill text-sm-center">Pending Ride</a> </li>
                <li><a href="userApprove.php" id="all" class="flex-sm-fill text-sm-center">Completed Ride</a> </li>
                <li><a href="logout.php"><button type="button" class="btn btn-primary" id="rcorners2">Logout</button></a></li>
                </ul>
			</div>
		</div>
	</nav>


	<h1 class="header">Update Record CedCab</h1>
	<?php //print_r($_SESSION[ 'userdata']); ?>
	<form id="Update Form" method="POST">
		<label for="name">Name<br><input type="text"  onkeypress="return /[a-z\s]/i.test(event.key)" name="name" value="<?php echo $_SESSION['userdata']['dataname'] ?>" required/></label><br>
		<label for="mobile">Mobile<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name="mobile" value="<?php echo $_SESSION['userdata']['datamobile'] ?>" required/></label><br>
		<p><input type="submit" name="submit" value="Update Record" required></p>
	</form> 
<!--	<a href="password.php" class="a4" role="button" aria-pressed="true">Change Password</a>
	<a href="index.php" class="a3" role="button" aria-pressed="true">Dashboard</a> -->
</body>
<?php require 'footer.php' ?>
</html>