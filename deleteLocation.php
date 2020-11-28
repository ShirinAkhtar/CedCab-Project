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
  $Location = new Location();
  $lo = $Location->del_location($id);
  unset($_SESSION['Locationdata']['Lid']);
  unset($_SESSION['Locationdata']['Lname']);

 header('Location: location.php');
 


?>