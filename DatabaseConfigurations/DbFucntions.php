<?php

    include "DbConnection.php";

    function ExecutreMySqlQuery($query)
    {
        if (!empty($query)) {
            $con = GetConnection();

            try {
                $result = mysqli_query($con, $query);
                $resultSet = array("Success" => true, "Response" => $result);
            } catch (\Throwable $th) {
                $error = "Query Failed! MySQL: Error: " . mysqli_error($con);
                $resultSet = array("Success" => false, "Response" => $error);
            }

            return $resultSet;
        }
    }

    function Insert($tableName, $col_val)
    {
        if (!empty($tableName) && count($col_val) > 0) {
            
            $query = "INSERT INTO " . $tableName . "(";

            foreach ($col_val as $key => $value) {
                $query = $query . $key . ",";
            }

            $query = substr_replace($query, ")", -1);

            $query = $query . " VALUES (";

            foreach ($col_val as $key => $value) {

                if (gettype($value) == "string") {
                    $query = $query . "'" . $value . "',";
                }
                else {
                    $query = $query . $value . ",";
                }
            }

            $query = substr_replace($query, ");", -1);

            ExecutreMySqlQuery($query);
        }
    }









    // function Insert($tableName, $columnsArray)
    // {
    //     if (!empty($tableName) && count($columnsArray) > 0) {
    //         $query = "INSERT INTO " . $tableName . "(";

    //         foreach ($columnsArray as $key => $value) {
    //             $query = $query . $key . ",";
    //         }
            
    //         $query = substr_replace($query, ")", -1);
            
    //         $query = $query . " VALUES(";
            
    //         foreach ($columnsArray as $key => $value) {
    //             if (gettype($value) == "string") {
    //                 $query = $query . "'" . $value . "',";
    //             }
    //             else {
    //                 $query = $query . $value . ",";
    //             }
    //         }

    //         $query = substr_replace($query, ")", -1);

    //         echo $query;
    //     }
    // }

    
?>