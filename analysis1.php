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
require 'header2.php';
require 'class.php';
$Ride = new Ride();  
$Store1 = $Ride->analysis();
foreach($Store1 as $key=> $value){  
    echo "{ y :".$value['Rfrom'].", label:".$value['SUM(tfare)']."},";
 }
?>
<!DOCTYPE HTML>
<html>
<head>  
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
      
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>

</body>
</html>
