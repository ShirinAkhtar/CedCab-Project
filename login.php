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
    $Registration = new Registration();
    if (isset($_POST['submit'])) {
        $Uname = isset($_POST['Uname'])?$_POST['Uname']:'';
        $pswd = isset($_POST['pswd'])?$_POST['pswd']:'';
        echo  $Registration->regLogin($Uname,$pswd);
	}
	
?>
	<html>

	<head>
		<title> Login form </title>
		<link type="text/css" rel="stylesheet" href="style.css"> </head>

	<body style="padding-left:0px;">
		<div id="message">
			<?php echo $message; ?>
		</div>
		<div id="error">
			<?php if (sizeof($error)>0 ) : ?>
				<ul>
					<?php foreach($error as $error1): ?>
						<li>
							<?php echo $error1['msg']; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif;?>
		</div>
		<h1 class="header">Login</h1>
		<form id="SignUp Form" action="login.php" method="POST">
			<label for="Uname">Username<input type="text" name="Uname"></label><br>
			<label for="pswd">Password<input type="password" name="pswd"></label><br>
			<p><input type="submit" name="submit" value="LOGIN"></p>
		</form><a class="a4" href="password.php?action=pass&id=<?php echo $_SESSION['userdata']['userid'];?>">Forget Password?</a> <a href="reg.php" class="a2" role="button" aria-pressed="true">Register Now</a> </body>
	</body>
</html>