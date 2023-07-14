<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />

      <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/css/bootstrap.min.css" ?>" />
      <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/style.css" ?>" />
      <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/css/responsive.css" ?>" />
      <!-- <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/css/colors.css" ?>" /> -->
      <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/css/bootstrap-select.css" ?>" />
      <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/css/perfect-scrollbar.css" ?>" />
      <link rel="stylesheet" href="<?php echo "http://localhost:82/sms/Layouts/Admin/css/custom.css" ?>" />



      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <style>
         .errorMessage {
            color: red;
            font-weight: 700;
         }
      </style>

   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="<?php echo "http://localhost:82/sms/Layouts/Admin/images/logo/logo.png" ?>" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
                     <form method="POST">
                        <?php
                           include "DatabaseConfigurations/DbFucntions.php";
                           include_once "ResetPasswordLogics.php";

                           $urlData = str_replace(" ", "+", $_GET["data"]);
                           $email = BreakUrlData($urlData);

                           $password = "";
                           $emailError = $passwordError = $generalError = "";

                           if ($_SERVER["REQUEST_METHOD"] == "POST") {
                              $password = $_POST["Password"];
                              $confirmPassword = $_POST["ConfirmPassword"];

                              if (empty($email)) {
                                 header("Location:http://localhost:82/sms/LinkExpired.php");
                              }

                              if (empty($password) || empty($confirmPassword)) {
                                 $passwordError ="Passwords required!";
                              }

                              if ($password != $confirmPassword) {
                                 $passwordError ="Passwords do not match!";
                              }
                              
                              if (!empty($password) && !empty($confirmPassword) && !empty($email)) {
                                 
                                 $result = ChangePassowrd($email, $password);
                                 if (count($result) > 0) {
                                    if ($result["Success"] == true) {
                                       header("Location:http://localhost:82/sms/Login.php");
                                    }
                                    else {
                                       //header("Location:http://localhost:82/sms/LinkExpired.php");
                                    }
                                 }
                              }
                           }
                        ?>
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="Password" placeholder="Password" value="<?php echo $password; ?>" />
                              <p class="errorMessage"><?php echo $passwordError; ?></p>
                           </div>
                           <div class="field">
                              <label class="label_field">Confirm Password</label>
                              <input type="password" name="ConfirmPassword" placeholder="Confirm Password" value="<?php echo $password; ?>" />
                              <p class="errorMessage"><?php echo $passwordError; ?></p>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button type="submit" class="main_bt">Change Password</button>
                              <p class="errorMessage"><?php echo $generalError; ?></p>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
       <!-- jQuery -->
       <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/jquery.min.js" ?>"></script>
      <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/popper.min.js" ?>"></script>
      <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/bootstrap.min.js" ?>"></script>
      <!-- wow animation -->
      <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/animate.js" ?>"></script>
      <!-- select country -->
      <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/bootstrap-select.js" ?>"></script>
      <!-- owl carousel -->
      <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/perfect-scrollbar.min.js" ?>"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="<?php echo "http://localhost:82/sms/Layouts/Admin/js/custom.js" ?>"></script>
   </body>
</html>