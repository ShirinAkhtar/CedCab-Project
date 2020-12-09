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
  $id = $_REQUEST["id"];
  $Ride = new Ride();
  $lo = $Ride->del_ride($id);
  unset($_SESSION['Ridedata']['Rid']);
  unset($_SESSION['Ridedata']['Rname']);
  header('Location: pendingRide.php');?>