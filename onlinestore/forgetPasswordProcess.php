<?php

include("connection.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$email = $_POST["e"];
$vcode = uniqid();

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
$num = $rs->num_rows;

if ($num > 0) {
    //user found
    Database::iud("UPDATE `user` SET `v_code` = '" . $vcode . "' WHERE `email` = '" . $email . "' ");



    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sachinvimukthikaluvila@gmail.com';                 // SMTP username
    $mail->Password = 'sfiiycajpwuibuqr';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('sachinvimukthikaluvila@gmail.com', 'Online store');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');

    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<table style="width: 100%; font-family: \'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif;">
    <tbody>
        <tr>
            <td align="center">
                <table style="max-width: 600px; margin-top: 2%;">
                    <tr>
                        <td align="center">
                            <a href="" style="font-size: 35px; font-weight: bold; color: black; text-decoration: none;">Online Store</a>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h1 style="font-size: 25px; line-height: 45px; font-weight: 600;">Reset Your Password</h1>
                            <p style="margin-bottom: 25px;">You can change your password by clicking the button below.</p>
                            <div>
                                <a href="http://localhost/onlinestore/resetPassword.php?vcode='.$vcode.'" style="text-decoration: none; display: inline-block; border-radius: 5px; background-color: blue;
                                color: white; padding: 15px;">
                                    <span>Reset Password</span>
                                </a>
                            </div>
                            <p>If you do not change your password, you can ignore this email.</p>
                            <hr>
                        </td>
                    </tr>


                    <tr>
                        <td align="center">
                            <p style="font-weight: bold;">&copy; 2024 onlinestore.lk || All right reserved</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </tbody>
</table>';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} else {
    echo ("User not found! please check your email address.");
}
