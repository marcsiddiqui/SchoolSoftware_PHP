<?php
    setcookie("username", "", time() - 60);
    setcookie("fullname", "", time() - 60);

    header("Location:http://localhost:82/sms/login.php");
?>