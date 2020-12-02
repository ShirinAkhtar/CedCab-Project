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
require 'header4.php';
$error = array();
$message = '';
$id = $_REQUEST["id"];
$Registration = new Registration();
//echo $id;
$Registration->get_val($id);
 
if (isset($_POST['submit']))
{
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $Sdate = isset($_POST['Sdate']) ? $_POST['Sdate'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';

	$Registration->set_val($id, $name, $mobile);
	echo "Record Updated!";
}
?>
<html>
<head>
	<title>Update form</title>
	<link type="text/css" rel="stylesheet" href="style.css">
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
	<h1 class="header">Update Record CedCab</h1>
	<?php //print_r($_SESSION[ 'userdata']); ?>
	<form id="Update Form" method="POST">
		<label for="name">Name<br><input type="text" name="name" value="<?php echo $_SESSION['userdata']['dataname'] ?>" required/></label><br>
		<label for="mobile">Mobile<input type="text" name="mobile" value="<?php echo $_SESSION['userdata']['datamobile'] ?>" required/></label><br>
		<p><input type="submit" name="submit" value="Update Record" required></p>
	</form> 
<!--	<a href="password.php" class="a4" role="button" aria-pressed="true">Change Password</a>
	<a href="index.php" class="a3" role="button" aria-pressed="true">Dashboard</a> -->
</body>
</html>