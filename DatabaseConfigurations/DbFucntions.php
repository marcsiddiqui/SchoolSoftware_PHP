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

    function GetDataById($tableName, $id)
    {
        if (!empty($tableName) && $id > 0) {
            $query = "SELECT * FROM ". $tableName . " WHERE Id = " . $id;

            $result  = ExecutreMySqlQuery($query);

            return $result;
        }
    }

    function Update($tableName, $col_val, $id)
    {
        if (!empty($tableName) && count($col_val) > 0) {
            
            $query = "UPDATE " . $tableName . " SET ";

            foreach ($col_val as $key => $value) {

                if (gettype($value) == "string") {
                    $query = $query . " " . $key . " = '" . $value . "',";
                }
                else {
                    $query = $query . " " . $key . " = " . $value . ",";
                }
            }

            $query = substr_replace($query, " WHERE Id = " .  $id, -1);
            
            ExecutreMySqlQuery($query);
        }
    }

    function DeleteById($tableName, $id, $isSoftDelete)
    {
        $bit = $isSoftDelete ? '1' : 0;
        $query = "CALL DeleteById(@tableName:='".$tableName."', @id:= ".$id.", @isSoftDelete:=".$bit.")";

        ExecutreMySqlQuery($query);
    }
    
?>