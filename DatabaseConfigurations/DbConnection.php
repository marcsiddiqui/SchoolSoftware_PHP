<?php

    function GetConnection()
    {
        $con = mysqli_connect("localhost", "root", "", "sms") 
            or die("Unable to Connect with Server: " . mysqli_connect_error());
        return $con;
    }

?>

