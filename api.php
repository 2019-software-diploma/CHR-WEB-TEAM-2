<?php
require_once 'config/database.Connection.php';
if (isset($_POST['action']))
    $action = $_POST['action'];
switch ($action) {
    case 'Login':
        if (isset($_POST['username']) && isset($_POST['password']))
            Login($_POST['username'], $_POST['password']);
        break;
    case 'Register':
        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['password']) && isset($_POST['email']))
            Register($_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['email'], $_POST['newsletter']);
        break;
    case 'maa':
        break;
    default:
        print_r($action);
}
function Login($username, $password)
{

}

function Register($firstName, $lastName, $passowrd, $email, $newsletter)
{
    global $MySQL;
    global $mysql_con;
    $time = microtime();
    $ClientID = substr($time, strlen($time) - 5, 5);
    if ($newsletter === 'on') {
        $status = 1;
    } else {
        $status = 0;
    }
    $SQL = $MySQL ["InsertMember"];
    $SQL = str_replace('#ClientID', $ClientID, $SQL);
    $SQL = str_replace('#Password', $passowrd, $SQL);
    $SQL = str_replace('#RegIP', get_client_ip(), $SQL);
    $res1 = mysqli_query($mysql_con, $SQL);
    print_r($SQL . PHP_EOL);
    print_r($res1 . PHP_EOL);
    $SQL = $MySQL ["InsertClient"];
    $SQL = str_replace('#ClientID', $ClientID, $SQL);
    $SQL = str_replace('#FirstName', $firstName, $SQL);
    $SQL = str_replace('#LastName', $lastName, $SQL);
    $SQL = str_replace('#NewsLetter', $status, $SQL);
    $SQL = str_replace('#Email', $email, $SQL);
    $res2 = mysqli_query($mysql_con, $SQL);
    print_r($SQL . PHP_EOL);
    print_r($res2 . PHP_EOL);
}

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}