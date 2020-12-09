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
  $Registration = new Registration();
  $lo = $Registration->del_user($id);
  unset($_SESSION['userdata']['userid']);
  unset($_SESSION['userdata']['username']);
 header('Location: login.php');


?>