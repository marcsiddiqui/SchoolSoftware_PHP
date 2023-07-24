<?php 

   if (!isset($_COOKIE["username"])) {
      header("Location:http://localhost:82/sms/login.php");
   }

?>

<html>
    <body>
        <h1>Welcome Customer</h1>
    </body>
</html>