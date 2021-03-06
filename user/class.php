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
session_start();
$siteurl = "http://localhost/cabride/";
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', "");
define('dbname', 'Cab_Ride');
/** Connection Class  */
class Databases
{
    public $conn;
    public $error;
    public function __construct()
    {
        $this->conn = new mysqli(dbhost, dbuser, dbpass, dbname);
        if (!$this->conn)
        {
            echo '' . mysqli_connect_error($this->conn);
        }
        else
        {
            echo "";
        }

    }
}
/** User Class  */
class Registration extends Databases
{
    public function reg($Uname, $name, $mobile, $Isblock, $pswd, $isAdmin)
    {
        $sql1 = "SELECT * FROM tbl_user WHERE  Uname='" . $Uname . "' ";
        $result = $this->conn->query($sql1);
        if ($result->num_rows > 0)
        {
           return "Users name already exists";
        }
        else
        {
            $paswd = md5($pswd);
            $sql = $this->conn->query("INSERT INTO tbl_user(`Uname`,`name`, `Sdate`, `mobile`, `Isblock`,`pswd`,`isAdmin`)
            VALUES( '$Uname', '$name', NOW(), '$mobile','$Isblock','$paswd','$isAdmin')");
            return "Registration Successful";
        }
    }
    public function regLogin($Uname, $pswd)
    {
        $paswd = md5($pswd);
        if ($Uname == 'admin'|| $Uname == 'Admin'|| $Uname == 'ADMIN')
        {
            $sql = "SELECT * FROM tbl_user WHERE  Uname='" . $Uname . "' AND pswd='" . $paswd . "'  AND Isblock = 1 ";
       
            $rtn = '';
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $_SESSION['userdata'] = array(
                    'userid' => $row['Uid'],
                    'username' => $row['Uname'],
                    'dataname' => $row['name'],
                    'datamobile' => $row['mobile'],
                    'isAdmin' => $row['isAdmin']
                );
                
                    header('Location: admin.php');
                    
                }
            }
        }
        else
        {
            $sql = "SELECT * FROM tbl_user WHERE binary Uname='" . $Uname . "' AND pswd='" . $paswd . "'  AND Isblock = 1 ";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    
                    $_SESSION['userdata'] = array(
                    'userid' => $row['Uid'],
                    'username' => $row['Uname'],
                    'dataname' => $row['name'],
                    'datamobile' => $row['mobile'],
                    'isAdmin' => $row['isAdmin']
                );
                }
                header('Location: history.php');
            } else {
                echo "<script>alert('OOP's something went wrong!')</script>";
                header('refresh:0; url=login.php');
            }
        }
    }
    public function userRequest()
    {
        $store = array();
        $c = 0;
        $sql = "SELECT * FROM tbl_user ";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($store, $row);
            }

        }
        return $store;
    }

    public function userRequest_sortByDate()
    {
        $store = array();
        $sql = "SELECT * FROM `tbl_user` ORDER BY `Sdate`";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($store, $row);
            }
            return $store;
        }
    }

    public function userRequest_sortByDateDESC()
    {
        $store = array();
        $sql = "SELECT * FROM `tbl_user` ORDER BY `Sdate` DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($store, $row);
            }
            return $store;
        }
    }

    public function userRequest_sortByName()
    {
        $store = array();
        $sql = "SELECT * FROM `tbl_user` ORDER BY `Uname` ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($store, $row);
            }
            return $store;
        }
    }
    public function userRequest_sortByDscend()
    {
        $store = array();
        $sql = "SELECT * FROM `tbl_user` ORDER BY `Uname` DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($store, $row);
            }
            return $store;
        }
    }

    public function user_filterByName($Fname)
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_user` WHERE  `Uname` = '" . $Fname . "' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function del_user($id)
    {
        $sql = "DELETE FROM `tbl_user` WHERE `Uid` = '$id'";
        $sql1 = "DELETE FROM `tbl_ride` WHERE `Uid` = '$id'";
        $result = $this->conn->query($sql);
        $result1 = $this->conn->query($sql1);
        if ($result === true)
        {
            echo "Record deleted successfully";
        }
        else
        {
            echo "Error deleting record: " . $this->conn->error;
        }

    }

    public function access($id)
    {
        $sql1 = " UPDATE `tbl_user` SET `Isblock`= 1 WHERE `Uid`='$id'";
        $result = $this->conn->query($sql1);
    }
    public function denied($id)
    {
        $sql1 = " UPDATE `tbl_user` SET `Isblock`= 0 WHERE `Uid`='$id'";
        $sqli = " UPDATE `tbl_ride` SET `status`= 1 WHERE `Uid`='$id' AND  `status`= 0";
        $result = $this->conn->query($sqli);
        $result = $this->conn->query($sql1);

    }
    public function get_val($id)
    {
        $sql = 'SELECT * FROM `tbl_user` WHERE `Uid` = "' . $id . '" ';
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {

                $_SESSION['userdata'] = array(
                    'userid' => $row['Uid'],
                    'username' => $row['Uname'],
                    'dataname' => $row['name'],
                    'datamobile' => $row['mobile'],
                    'isAdmin' => $row['isAdmin']
                );
            }
        }
        
    }

        public function get_pass($id)
        {
            $sql = 'SELECT * FROM `tbl_user` WHERE `Uid` = "' . $id . '" ';
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {

                    $_SESSION['userdata'] = array(
                        'userid' => $row['Uid'],
                        'username' => $row['Uname'],
                        'dataname' => $row['name'],
                        'datamobile' => $row['mobile']
                    );
                }
            } 
            return "Password Updated Succesfully!";
        }
        
        public function update_pass($id, $newPass)
        {
            $newPass1 = md5($newPass);
            $sql1 = "UPDATE `tbl_user` SET `pswd`= '$newPass1' WHERE `Uid`='$id'";
            $result = $this->conn->query($sql1);
            header('Location: admin.php');
            return 'Password Updated Succesfully!';
        }

        public function set_val($id, $name, $mobile)
        {
            $sql1 = "UPDATE `tbl_user` SET `name`='$name', `mobile`='$mobile' WHERE `Uid`='$id'";
            $result = $this->conn->query($sql1);
            header('Location: dashboard.php');
        }

}
/** Ride Class  */
class Ride extends Databases
{
    public function avilable_rides()
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride`";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function avilable_rides1($fields = "*", $conditions = "true", $sort = 'Rid', $sort_type = 'ASC')
    {
        $ride = array();
        $sql = "SELECT $fields FROM `tbl_ride` where $conditions ORDER BY $sort $sort_type";

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }
    public function avilable_rides2($id)
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride`  WHERE `Rid`='$id' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function rides_sortByDate1($id)
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride` WHERE `Uid`='$id' ORDER BY `Rdate` ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function rides_sortByDate()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY CAST(`Rdate` as unsigned) ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }

    public function ride_sortByCab()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY cabtype ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }

    public function ride_sortByCabDESC()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY cabtype DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }

    public function ride_sortBylugg()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY CAST(`lug` as unsigned) ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }

    public function ride_sortByDlugg()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY CAST(`lug` as unsigned) DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }


    public function rides_sortByDateDESC()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY `Rdate` DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function ride_filterByDate($startdate,$endate)
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ";
        if(!empty($startdate) && !empty($endate)){
            $sql .= " WHERE CAST(Rdate AS DATE) between '".$startdate."' AND '".$endate."' ";
        }
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
            //echo '<script>alert(' .$startdate. ' from '.$endate. ')</script>';
        }
        else
        {
            return $ride;
        }
    }

    public function ride_filterByDate1($startdate,$endate,$id)
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride`";
        if(!empty($startdate) && !empty($endate)){
            $sql .= " WHERE CAST(Rdate AS DATE) between '".$startdate."' AND '".$endate."' AND `Uid`='$id' ";
        }
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function ride_sortByDistance()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY cast(`tdistance` as unsigned) ASC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            
        }
        return $ride;
    }

    public function ride_sortByDistanceDESC()
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` ORDER BY cast(`tdistance` as unsigned) DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            
        }
        return $ride;
    }

    public function ride_sortByDistance1($id)
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride` where `Uid`='$id' ORDER BY cast(`tdistance` as unsigned) ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    

    public function ride_sortByFare()
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride` ORDER BY `tfare` ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function ride_sortByFareDESC()
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride` ORDER BY `tfare` DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function ride_sortByFare1($id)
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride` where `Uid`='$id' ORDER BY `tfare` ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    
    public function FareFilter($fare)
    {
        $ride = array();
        $sql = " SELECT * FROM `tbl_ride` WHERE  `tfare` = '" . $fare . "' ";
        $result = $this->conn->query($sql);
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }

    public function del_ride($id)
    {
        $sql = "DELETE FROM `tbl_ride` WHERE `Rid` = '$id'";
        $result = $this->conn->query($sql);
        if ($result === true)
        {
            echo "Record deleted successfully";
        }
        else
        {
            echo "Error deleting record: " . $this->conn->error;
        }
    }
    
    public function store_ride($Uid, $pick, $drop, $dist, $cabType, $lug, $amt, $status)
    {
        if($lug == "")
        {
            $lug = 0;
        }
        $p = 0;
        $sql = "SELECT * FROM tbl_ride WHERE `Uid` = '$Uid'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                if ($row['status'] == 0)
                {
                    $p = 1;
                    return " Can't Accept any ride already pendding 1";
                }
                if ($p == 0)
                {
                    $sql1 = "INSERT INTO `tbl_ride`(`Uid`,`Rdate`,`Rfrom`, `Rto`, `tdistance`, `cabtype`,`lug`,`tfare`,`status`)
                    VALUES('$Uid',NOW(), '$pick','$drop','$dist','$cabType', '$lug','$amt','$status')";
                    $result = $this->conn->query($sql1);
                    return " Ride Recieved! Request Pending";
                }
            }
        }
        else
        {
            $sql1 = "INSERT INTO `tbl_ride`(`Uid`,`Rdate`,`Rfrom`, `Rto`, `tdistance`,`cabType`, `lug`,`tfare`,`status`)
            VALUES('$Uid',NOW(), '$pick','$drop','$dist', '$cabType','$lug','$amt','$status')";
            $result = $this->conn->query($sql1);
            return " Ride Recieved! Wait for the approval!";
        }
    }

    public function store_ride_details( $pick, $drop, $dist, $cabType, $lug, $amt, $status)
    {
        $_SESSION['booking'] = array(
          
            'pick' => $pick,
            'drop' => $drop,
            'dist' => $dist,
            'cabType' => $cabType,
            'lug' => $lug,
            'amt' => $amt,
            'status' => $status
        );
    }
    public function ride_history($id)
    {
        $ride = array();
        $sql = "SELECT * FROM `tbl_ride` WHERE `Uid` = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
            return $ride;
        }
        else
        {
            return $ride;
        }
    }
    public function access($id)
    {
        $sql1 = "UPDATE `tbl_ride` SET `status`= 1 WHERE `Rid`='$id'";
        $result = $this->conn->query($sql1);
    }
    public function denied($id)
    {
        $sql1 = "UPDATE `tbl_ride` SET `status`= 0 WHERE `Rid`='$id'";
        $result = $this->conn->query($sql1);
    }
    public function CancelRide($id)
    {
        $sql1 = " UPDATE `tbl_ride` SET `status`= 2 WHERE `Rid`='$id'";
        $result = $this->conn->query($sql1);

    }
}
/** Location Class  */
class Location extends Databases
{
    public function add_location($Lname, $Ldis, $Lavilable)
    {
        $sql = $this->conn->query("INSERT INTO `tbl_location` (`Lname`, `Ldis`,`Lavilable`) 
            VALUES ('$Lname', '$Ldis','$Lavilable')");
        return $sql;
    }
    public function location_avilable()
    {
        $location = array();
        $sql = "SELECT * FROM tbl_location";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($location, $row);
                
            }
            return $location;
        }
        else
        {
            return $location;
        }
    }

    public function location_sortByName()
    {
        $location = array();
        $sql = "SELECT * FROM tbl_location order by `Lname`";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($location, $row);
                
            }
            
        }
        return $location;
    }


    public function location_sortByNameDESC()
    {
        $location = array();
        $sql = "SELECT * FROM tbl_location order by `Lname` DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($location, $row);
                
            }
            
        }
        return $location;
    }

    public function del_location($id)
    {
        $sql = "DELETE FROM `tbl_location` WHERE `Lid` = '$id'";
        $result = $this->conn->query($sql);
        if ($result === true)
        {
            echo "Record deleted successfully";
        }
        else
        {
            echo "Error deleting record: " . $this->conn->error;
        }
    }
    public function get_loc($id)
    {
        $sql = 'SELECT * FROM `tbl_location` WHERE `Lid` = "' . $id . '" ';
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $_SESSION['Locationdata'] = array(
                    'locationid' => $row['Lid'],
                    'locationname' => $row['Lname'],
                    'location_dis' => $row['Ldis'],
                    'location_avl' => $row['Lavilable']
                );
            }
        }
    }
    public function set_loc($id, $lname, $ldis, $lavilable)
    {
        $sql1 = "UPDATE `tbl_location` SET `Lname`='$lname', `Ldis`='$ldis',`Lavilable`='$lavilable' WHERE `Lid`='$id'";
        $result = $this->conn->query($sql1);
        header('Location: location.php');
    }

    public function access($id)
    {
        $sql1 = "UPDATE `tbl_location` SET `Lavilable`= 1 WHERE `Lid`='$id'";
        $result = $this->conn->query($sql1);
    }
    public function denied($id)
    {
        $sql1 = "UPDATE `tbl_location` SET `Lavilable`= 0 WHERE `Lid`='$id'";
        $result = $this->conn->query($sql1);
    }
}
?>