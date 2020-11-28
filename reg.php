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
    $Isblock = 0;
    $isAdmin = 0;
    $Registration = new Registration();
    
if (isset($_POST['submit'])) {
        $Uname = isset($_POST['Uname'])?$_POST['Uname']:'';
        $name = isset($_POST['name'])?$_POST['name']:'';
        $Sdate = isset($_POST['Sdate'])?$_POST['Sdate']:'';
        $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
        $pswd = isset($_POST['pswd'])?$_POST['pswd']:'';
        $rpswd = isset($_POST['rpswd'])?$_POST['rpswd']:'';
            
   if (empty($_POST['Uname']) || empty($_POST['name']) || empty($_POST['mobile']) || empty($_POST['pswd'])) {
        $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields! ');
    }
    $Registration->reg($Uname,$name,$mobile,$Isblock,$pswd,$isAdmin);
    echo "registration success";
}
?>
<html>
    <head>
        <title>Register form </title>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
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
        <h1 class="header">Register Yourself with CedCab</h1>
       
        <form id="Register Form" action = "reg.php" method = "POST">
        <label for="Uname">Username<input type="text" name="Uname" required>
        </label><br>
        <label for="name">Name<br><input type="text" name="name" required>
        </label><br>
        
        <label for="mobile">Mobile<input type="text" name="mobile" required></label required><br>
        

        <label for="pswd">Password<input type="text" name="pswd" required></label>
        <br>
        <label for="Sdate">Confirm Password<input type="text" name="pswd" required></label><br>
        <p><input type="submit" name="submit" value="Register" required></p>
        </form>
        <p class="p2">Already User?</p><br>
        <a href="login.php" class="a5" role="button" aria-pressed="true">Login</a>
    </body>

</html>