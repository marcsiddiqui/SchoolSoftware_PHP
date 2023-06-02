<?php

    function GetConnection()
    {
        $con = mysqli_connect("localhost", "root", "", "schoolmanagementsystem") 
            or die("Unable to Connect with Server: " . mysqli_connect_error());
        return $con;
    }

?>

