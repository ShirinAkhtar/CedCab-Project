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
    $Location = new Location();
    
if (isset($_POST['submit'])) {
        $Lname = isset($_POST['Lname'])?$_POST['Lname']:'';
        $Ldis = isset($_POST['Ldis'])?$_POST['Ldis']:'';
       $Lavilable = isset($_POST['Lavilable'])?$_POST['Lavilable']:'';;
       
    echo $Location->add_location($Lname,$Ldis,$Lavilable);
}
?>
<html>
    <head>
        <title>Add Location form </title>
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
        <h1 class="header">Add Locations</h1>
       
        <form id="Register Form" action = "addlocation.php" method = "POST">
        <label for="Lname">Location Name<input type="text" name="Lname" required>
        </label><br>
        <label for="Ldis">Location Distance<input type="text" name="Ldis" required>
        </label><br>
        <label for="Lavilable">Location Avilable<input type="text" name="Lavilable" required>
        </label><br>
        <p><input type="submit" name="submit" value="Add Location" required></p>
        </form>
        <p class="p2">Back to Dashboard?</p><br>
        <a href="admin.php" class="a5" role="button" aria-pressed="true">Dashboard</a>
    </body>

</html>