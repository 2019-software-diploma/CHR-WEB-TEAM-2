<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './lib/phpmailer/Exception.php';
require_once './lib/phpmailer/PHPMailer.php';
require_once './lib/phpmailer/SMTP.php';
require_once './config/database.Connection.php';

sendWelcomeEmail("Peter Peter", "04123", "", "04/12/2019", "Receive Newsletter", "mikylee.saleen@0hcow.com");

function sendWelcomeEmail($name, $cliendID, $regIP, $regDate, $newsLatter, $email)
{
    global $mysql_con;
    $SQL = "SELECT AccountName, Password, DisplyName FROM `email` WHERE Account_ID = 'NoReply';";
    if($result = mysqli_query($mysql_con,$SQL)){
        $row = mysqli_fetch_row($result);
    }
    mysqli_free_result($result);
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = $row[0];
        $mail->Password = $row[1];
        $mail->SMTPSecure = '';
        $mail->Port = 587;
        $mail->setFrom($row[0], $row[2]);
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
        //echo 'Send';
    } catch (Exception $e) {
        //echo 'Error: ', $mail->ErrorInfo;
    }
}