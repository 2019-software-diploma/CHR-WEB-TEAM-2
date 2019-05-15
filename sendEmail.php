<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './lib/phpmailer/Exception.php';
require_once './lib/phpmailer/PHPMailer.php';
require_once './lib/phpmailer/SMTP.php';

function sendWelcomeEmail($name, $cliendID, $regIP, $regDate, $newsLatter, $email)
{
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreplay@chrmail.tk';
        $mail->Password = 'Ww885588';
        $mail->SMTPSecure = '';
        $mail->Port = 587;
        $mail->setFrom('noreplay@chrmail.tk', 'CHR Noreplay');
        $mail->addAddress($email);
        $fileHandle = fopen("./lib/welcome.html", "r") or die("Unable to open file!");
        $welcome = fread($fileHandle, filesize("./lib/welcome.html"));
        $welcome = str_replace('#NAME', $name, $welcome);
        $welcome = str_replace('#ClientID', $cliendID, $welcome);
        $welcome = str_replace('#RegIP', $regIP, $welcome);
        $welcome = str_replace('#RegDate', $regDate, $welcome);
        $welcome = str_replace('#Newsletter', $newsLatter, $welcome);
        fclose($fileHandle);
        $mail->isHTML(true);
        $mail->Subject = 'Welcome!';
        $mail->Body = $welcome;
        $mail->send();
        echo 'Send';
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}