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
require 'header1.php';
require 'class.php';
$Ride = new Ride();  
$store1 = $Ride->avilable_rides();
?>
<html>
<head>
    <title>CedCab</title>
    <link type = "text/css" rel = "stylesheet" href = "style.css">
</head>
<body style="background-color:white">
    <h1 class="header">User Request List</h1>
<br/>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="panel-title"><center>Your All Ride List</center</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="exam_data_table" 
            class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Ride Id</th>
                    <th>Ride Date</th>
                    <th>Ride From</th>
                    <th>Ride To</th>
                    <th>Total Distance</th>
                    <th>Luggage</th>
                    <th>Total Fare</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach($store1 as $key=> $value) { ?> 
            <tr>
                <td><?php echo $value['Rid'] ?></td>
                <td><?php echo $value['Rdate']; ?></td>
                <td><?php echo $value['Rfrom']; ?></td>
                <td><?php echo $value['Rto']; ?></td>
                <td><?php echo $value['tdistance']; ?></td>
                <td><?php echo $value['lug']; ?></td>
                <td><?php echo $value['tfare']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><a href="update2.php" class="edit_btn" >Edit</a></td>
                <td><a  href="delete2.php" onClick="return confirm('Are you sure you want to delete?')" class="del_btn">Delete</a></td>
            </tr><?php}?>
        </table>
    </div>
</div>
</body>
</html>