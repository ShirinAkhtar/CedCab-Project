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
    if(isset($_REQUEST["id"]))
    {
        $id = $_REQUEST["id"];
        $Registration->get_pass($id);
    }
    
    if (isset($_POST['submit'])) {
        $oldPass = isset($_POST['oldPass'])?$_POST['oldPass']:'';
        $newPass = isset($_POST['newPass'])?$_POST['newPass']:'';
        $sid = $_SESSION['userdata']['userid'];
        echo  $Registration->update_pass($sid,$newPass);
    }
?>
<html>
    <head>
        <title> Login form </title>
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
        <h1 class="header">Forget Password</h1>
        <form id="SignUp Form" action = "password.php" method = "POST">
        <label for="Uname">Previous Password<input type="text" name="oldPass" >
        </label><br>
        <label for="pswd">New Password<input type="text" name="newPass" ></label>
        <br>
        <p><input type="submit" name="submit" value="Update Password"></p>
        </form>
        <a href="cabhome1.php" class="a5" role="button" aria-pressed="true">Dashboard</a>
    </body>

</html>