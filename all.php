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
$Registration = new Registration();  
$store1 = $Registration->userRequest();
$Ride = new Ride();  
$store = $Ride->avilable_rides();
$Location = new Location();  
$lo = $Location->location_avilable();
?>
<html>
<head>
    <title>CedCab</title>
    <link type = "text/css" rel = "stylesheet" href = "style.css">
</head>
<body style="background-color:white;">
   
<br/>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="panel-title"><center>List</center</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table id="exam_data_table" class="table table-bordered table-striped table-hover">
            <thead>
            <tr><th>1.User List<th></tr>
                <tr>
                    <th>User Id</th>
                    <th>UserName</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Mobile</th>
                   
                    
                   
                </tr>
            </thead>
            <?php 
            foreach($store1 as $key=> $value){
                if($value['Isblock'] == 0){
                    if($value['isAdmin'] == 0){ ?>
            <tr>
            <td><?php echo $value['Uid'] ?></td>
            <td><?php echo $value['Uname']; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['Sdate']; ?></td>
            <td><?php echo $value['mobile']; ?></td>
           
           
            <?php
         }?>
        </tr><?php
       }  }?>
        </table>
        <br>
            <table id="exam_data_table" 
            class="table table-bordered table-striped table-hover">
            <thead>
            <tr><th>2.Ride List<th></tr>
                <tr>
                    <th>Ride Id</th>
                    <th>Ride Date</th>
                    <th>Ride From</th>
                    <th>Ride To</th>
                    <th>Total Distance</th>
                    <th>Luggage</th>
                    <th>Total Fare</th>
                    <th>Status</th>
                   
                </tr>
            </thead>
            <?php 
            foreach($store as $key=> $value){
               // if($value['Isblock'] == 0){
            ?> 
            <tr>
            <td><?php echo $value['Rid'] ?></td>
            <td><?php echo $value['Rdate']; ?></td>
            <td><?php echo $value['Rfrom']; ?></td>
            <td><?php echo $value['Rto']; ?></td>
            <td><?php echo $value['tdistance']; ?></td>
            <td><?php echo $value['lug']; ?></td>
            <td><?php echo $value['tfare']; ?></td>
            <td><?php echo $value['status']; ?></td>            
        </tr><?php
         }?>
        </table>
        <table id="exam_data_table" 
            class="table table-bordered table-striped table-hover">
            <thead>
            <tr><th>3.Location List<th></tr>
                <tr>
                    <th>Location Id</th>
                    <th>Location Name</th>
                    <th>Location Distance</th>
                    <th>Location Avilable</th>
                   
                </tr>
            </thead>
            <?php
            foreach($lo as $key=> $value){
            ?> 
            <tr>
            <td><?php echo $value['Lid'] ?></td>
            <td><?php echo $value['Lname']; ?></td>
            <td><?php echo $value['Ldis']; ?></td>
            <td><?php echo $value['Lavilable']; ?></td>
        </tr><?php
         }?>
        </table>
   </div>
</div>
</body>
</html>