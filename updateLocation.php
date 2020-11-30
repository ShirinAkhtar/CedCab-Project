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
    $id = $_REQUEST["id"];
    $Location = new Location();  
    $lo = $Location->get_loc($id);
    echo $lo;

    if (isset($_POST['submit'])) {
        $lname = isset($_POST['Lname'])?$_POST['Lname']:'';
        $ldis = isset($_POST['Ldis'])?$_POST['Ldis']:'';
        $lavilable = isset($_POST['Lavilable'])?$_POST['Lavilable']:'';
            
   if (empty($_POST['Lname']) || empty($_POST['Ldis']) || empty($_POST['Lavilable'])) {
        $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields! ');
   }
   $Location->set_loc($id,$lname,$ldis,$lavilable);
}
?>
<html>
    <head>
        <title>Update form </title>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
    </head>
    <body style="background-color:white;padding-left:0px;">
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
        <h1 class="header">Update Locations</h1>
        <form id="Register Form"  method = "POST">
            <label for="Lname">Location Name<input type="text" name="Lname" value="<?php echo $_SESSION['Locationdata']['locationname'] ?>" required></label><br>
            <label for="Ldis">Location Distance<input type="text" name="Ldis" value="<?php echo $_SESSION['Locationdata']['location_dis'] ?>" required></label><br>
            <label for="Lavilable">Location Avilable<input type="text" name="Lavilable" value="<?php echo $_SESSION['Locationdata']['location_avl'] ?>" required></label><br>
            <p><input type="submit" name="submit" value="Update Location" required/></p>
        </form>
        <a href="change.php" class="a2" role="button" aria-pressed="true">Change Password</a>
    </body>
</html>