<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */
 
require_once __DIR__ . '/lib/phpmailer/Exception.php';
require_once __DIR__ . '/lib/phpmailer/PHPMailer.php';
require_once __DIR__ . '/lib/phpmailer/SMTP.php';
require_once __DIR__ . '/config/database.Connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_GET['clientid'])){
    die("Error");
}

sendWelcomeEmail($_GET['clientid']);

function sendWelcomeEmail($clientID)
{
    global $mysql_con;
    $SQL = "SELECT AccountName, Password, DisplyName FROM `email` WHERE Account_ID = 'NoReply';";
    if($result = mysqli_query($mysql_con,$SQL)){
        $row = mysqli_fetch_row($result);
    }
    $SQL = "SELECT * FROM `welcomeEmail` WHERE ClientID = '" . $clientID . "'";
    if($result = mysqli_query($mysql_con,$SQL)){
        $row2 = mysqli_fetch_row($result);
    }
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
        $mail->addAddress($row2[5]);
        $fileHandle = fopen(__DIR__ . "/lib/welcome.html", "r") or die("Unable to open file!");
        $welcome = fread($fileHandle, filesize(__DIR__ . "/lib/welcome.html"));
        $welcome = str_replace('#NAME', $row2[0], $welcome);
        $welcome = str_replace('#ClientID', $clientID, $welcome);
        $welcome = str_replace('#RegIP', $row2[2], $welcome);
        $welcome = str_replace('#RegDate', $row2[3], $welcome);
        $welcome = str_replace('#Newsletter', $row2[4], $welcome);
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
