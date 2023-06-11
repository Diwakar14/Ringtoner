<?php
       
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function activation_email($uid,$u,$e){
    $mail = new PHPMailer(true); 
    try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'zedgeringtone14@gmail.com';                 // SMTP username
    $mail->Password = 'Ringtone@14';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('zedgeringtone14@gmail.com', 'ZedgeRingtone');
    $mail->addAddress($e, $u);     // Add a recipient
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $message = '<!DOCTYPE html><html><head><meta charset="UTF-8">'
                        . '<title>Zedge Ringtone Message</title>'
                        . '</head>'
                        . '<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">'
                        . '<div style="padding:10px; background:#333; font-size:24px; color:#CCC;">'
                        . 'Zedge Ringtone Account Activation</div>'
                        . '<div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br />'
                        . '<a href="uploader/activation.php?id='.$uid.'&u='.$u.'" style="padding:10px;border:1px solid green;background:green;color:white;">Activate Now</a>'
                        . '<br /><br />Login after successful activation using your<br />E-mail Address and Password.</b></div>'
                        . '</body>'
                        . '</html>';
    
    $mail->Subject = 'ZedgeRingtone Account Activation.';
    $mail->Body    = $message;
    $mail->AltBody = 'ZedgeRingtone Account Activation.';

    $mail->send();
    echo 'Sign Up Successfull.';
    } catch (Exception $e) {
        echo 'Something Went Wrong.', $mail->ErrorInfo;
    }
}

