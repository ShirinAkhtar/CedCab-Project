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
    require 'header2.php';
    $error  = array();
    $message = '';
    $id = $_REQUEST["id"];
    $Location = new Location();
    echo $id;
    $Location->get_loc($id);

    if (isset($_POST['submit'])) {
        $Lid = $_SESSION['Locationdata']['locationid'];
        $Lname = isset($_POST['Lname'])?$_POST['Lname']:'';
        $Ldistance = isset($_POST['Ldistance'])?$_POST['Ldistance']:'';
        $Lavil = isset($_POST['Lavil'])?$_POST['Lavil']:'';     
            
   if (empty($_POST['Lname']) || empty($_POST['Ldistance']) || empty($_POST['Lavil'])) {
        $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields! ');
   }
   $Location->set_loc($Lid,$Lname,$Ldistance,$Lavil);
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
        <h1 class="header">Update Locations of CedCab</h1>
        <?php //print_r($_SESSION['userdata']); ?>
            <form id="Update Form"  method = "POST">
                <label for="location">Location<br><input type="text" onkeypress="return /[a-z]/i.test(event.key)" name="Lname" value="<?php echo $_SESSION['Locationdata']['locationname'] ?>" required></label><br>
                <label for="distance">Location Distance<input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="Ldistance" value="<?php echo $_SESSION['Locationdata']['location_dis'] ?>" required></label required><br>
                <label for="avilable">Location Avilable<input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="Lavil" value="<?php echo $_SESSION['Locationdata']['location_avl'] ?>" required></label required><br>
                <p><input type="submit" name="submit" value="Update Record" required></p>    
            </form>
            <a href="location.php" class="a4" role="button" aria-pressed="true">Back to Location Table</a>
    </body>
</html>