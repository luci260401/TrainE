<?php
use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;

require 'C:\xampp\php\pear\phpmailer\src\Exception.php';
require 'C:\xampp\php\pear\phpmailer\src\PHPMailer.php';
require 'C:\xampp\php\pear\phpmailer\src\SMTP.php';

if($_POST)
{
    include 'MysqlConnectionCreated.php';
    $email = $_POST['email'];
    $query = "SELECT EMAIL FROM userdetails WHERE USERNAME='$email'";
    $selectquery = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($selectquery);
   

    $mail=new PHPMailer();
    try
    {
        $mail->SMTPDebug=0;
        $mail->isSMTP();

        $mail->Host='smtp.gmail.com';
        $mail->SMTPAutoTLS = false;
        $mail->SMTPAuth=true;
        $mail->Username='oumdsp@gmail.com';
        $mail->Password='oumdsp114555';
        $mail->SMTPSecure='tls';
        $mail->Port='587';
        $mail->setFrom('oumdsp@gmail.com' , 'Admin Oumds');
        $mail->addAddress($email,$email);

        $mail->isHTML();
        $mail->Subject='Forgot Password';
        $mail->Body="Hi $email your password is {$row['0']}";
        $mail->AltBody="Hi $email your password is {$row['0']}";

        $mail->send();
        echo 'Your Password has been sent on your Email Id';
    }
    catch(Exception $e)
    {
        echo 'Email could not been sent.';
        echo 'Mailer Error:'. $mail->ErrorInfo;
    }
}
else
{
    echo"<script>alert('Email Not Found')</script>";  
}
?>