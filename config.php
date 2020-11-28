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

    $siteurl = "http://localhost/cabride/";

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "Cab_Ride";
    class Databases{
        public $con;
        public $error;
        public function __construct()
        {
    // Create connection
    $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if(!$this->con)
    {
    echo 'Database Connection Error' . mysqli_connect_error($this->con);
    }
    else
    {
    echo mysqli_error($this->con);
    }
    public function reg($Uname,$name,$mobile,$Isblock,$pswd,$isAdmin)
    {
        $sql = $con->query("INSERT INTO tbl_user(`Uname`,`name`, `Sdate`, `mobile`, `Isblock`,`pswd`,`isAdmin`)
        VALUES( '$Uname', '$name', NOW(), '$mobile','$Isblock','$pswd','$isAdmin')");
        return $sql;
    }
}
}
?>