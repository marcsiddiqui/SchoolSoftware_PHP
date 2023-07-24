<?php 

   if (!isset($_COOKIE["username"])) {
      header("Location:http://localhost:82/sms/login.php");
   }

   if ($_COOKIE["role"] != "Admin" && $_COOKIE["role"] != "Principal") {
    header("Location:http://localhost:82/sms/CustomerDashboard.php");
   }

?>

<html>
    <body>
        <h1>Welcome Admin</h1>
    </body>
</html>