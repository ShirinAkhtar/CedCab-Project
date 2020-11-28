<?php
include "config.php";

class User
{
    public function reg($Uname,$name,$mobile,$Isblock,$pswd,$isAdmin)
    {
        $sql = $con->query("INSERT INTO tbl_user(`Uname`,`name`, `Sdate`, `mobile`, `Isblock`,`pswd`,`isAdmin`)
        VALUES( '$Uname', '$name', NOW(), '$mobile','$Isblock','$pswd','$isAdmin')");
        return $sql;
    }
}
?>
