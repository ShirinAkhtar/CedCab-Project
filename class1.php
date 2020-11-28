<?php public function avilable_rides1($fields = "*", $conditions = "true", $sort = 'Rid', $sort_type = 'ASC')
    {
        $ride = array();
        $sql = "SELECT $fields FROM `tbl_ride` where $conditions ORDER BY $sort $sort_type";

        $result = $this
            ->conn
            ->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($ride, $row);
            }
        }
        return $ride;
    }
    ?>