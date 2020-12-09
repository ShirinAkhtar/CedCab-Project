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
require 'header3.php';
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
    if ($pswd != $rpswd) {
        $error[] = array('input'=>'password', 'msg'=>'password doesnt match');
    }
    else {
       $msg= $Registration->reg($Uname,$name,$mobile,$Isblock,$pswd,$isAdmin);
        $error[] = array('input'=>'password', 'msg'=>$msg);
    }
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
        
        <h1 class="header">Register Yourself with CedCab</h1>
        <form id="form" action = "reg.php" method = "POST">
            <label for="Uname">Username<input type="text" name="Uname"  required></label><br>
            <label for="name">Name<br><input type="text" name="name" onkeypress="return /[a-z]/i.test(event.key)" required></label><br>
            <label for="mobile">Mobile<input type="number" minlength="10" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control ms1" name="mobile" required></label required><br>
            <label for="pswd">Password<input type="password" name="pswd" required></label><br>
            <label for="rpswd">Confirm Password<input type="password" name="rpswd" required><span id='message'></span></label><br>
            <p><input type="submit" name="submit" value="Register" required></p>
            <div id = "error">
            <?php if (sizeof($error)>0 ) : ?>
                <ul>
                    <?php foreach($error as $error1): ?>
                        <li> <?php echo $error1['msg']; ?> </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
        </div>
        </form>
        
    </body><br><br><br><br><br>
    <script>
    $(function(){
    $("#input").keypress(function(event){
        var ew = event.which;
        if(ew == 32)
            return true;
        if(48 <= ew && ew <= 57)
            return true;
        if(65 <= ew && ew <= 90)
            return true;
        if(97 <= ew && ew <= 122)
            return true;
        return false;
    });
});

    </script>
    <?php require 'footer.php' ?>
</html>