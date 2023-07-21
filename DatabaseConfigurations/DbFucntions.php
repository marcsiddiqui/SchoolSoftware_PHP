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

    function Insert($tableName, $col_val, $maintainCreatedOn = false)
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

            if ($maintainCreatedOn == true) {
                $query = $query . " CreatedOn = NOW(),";
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
    
    function Login($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            $query = "SELECT * FROM Employee WHERE Email = '".$email."' AND Password = '".$password."';";

            $result  = ExecutreMySqlQuery($query);

            return $result;
        }
    }

    function ChangePassowrd($email, $password)
    {
        if (!empty($email) && !empty($password)) {

            $query = "UPDATE Employee SET `Password` = '" . $password . "' WHERE Email = '" . $email . "';";

            $result  = ExecutreMySqlQuery($query);

            return $result;
        }
    }

    function PrepareDropDownList($tableName, $textColName, $valueColName, $dropDownName, $selectedValue) {
        echo "<select name='".$dropDownName."' id='".$dropDownName."'>";
        echo "<option value='0'>Select ".$tableName."</option>";
        if (!empty($tableName) && !empty($textColName) && !empty($valueColName)) {
            # code...
            $query = "SELECT * FROM " . $tableName;
            $result = ExecutreMySqlQuery($query);
            if (count($result) > 0) {
                if ($result["Success"] == true) {
                    if (mysqli_num_rows($result["Response"]) > 0) {
                        while ($row = mysqli_fetch_assoc($result["Response"])) {
                            if ($selectedValue == $row[$valueColName]) {
                                echo
                                    "<option value='".$row[$valueColName]."' selected='selected'>".$row[$textColName]."</option>";
                            }
                            else {
                                echo
                                    "<option value='".$row[$valueColName]."'>".$row[$textColName]."</option>";
                            }
                        }
                    }
                }
            }
        }
        
        echo "</select>";
    }

    function GetNew_GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

?>