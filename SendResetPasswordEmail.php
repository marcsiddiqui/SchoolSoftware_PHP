<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['Email']);
    $email = htmlentities($_POST['Email']);
    $subject = "Reset Passowrd Email"; //htmlentities($_POST['subject']);
    $message = "Please use following link to reset password, this email will be expired in 15 minutes.
    <a href='http://localhost:82/sms/ResetPassword.php?data=1'>Reset Password</a>"; //htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'marcsiddiqui@gmail.com';
    $mail->Password = 'qjnlejgspoquaxsw';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom('marcsiddiqui@gmail.com', $name);
    $mail->addAddress($email);
    $mail->Subject = ($subject);
    $mail->Body = $message;
    $mail->send();

    header("Location:http://localhost:82/sms/login.php");
}
?>