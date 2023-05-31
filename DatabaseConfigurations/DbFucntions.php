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
?>