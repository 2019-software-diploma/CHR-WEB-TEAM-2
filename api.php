<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

require_once 'config/database.Connection.php';
if (isset($_POST['action']))
    $action = $_POST['action'];
if (isset($_GET['action']))
    $action = $_GET['action'];
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
        maa($_POST['Client_ID'], $_POST['Staff_ID'], $_POST['Date'], $_POST['Time'], $_POST['Branch'], $_POST['Reason']);
        break;
    case 'logout':
        Logout();
        break;
    case 'update':
        UpdateProfile($_POST['ID'], $_POST['address'], $_POST['phone'], $_POST['sub'], $_POST['email']);
        break;
    case 'post':
        AddPost($_POST['Member_ID'], $_POST['title'], $_POST['comment']);
        break;
    default:
        print_r($action);
}
function Login($username, $password)
{
    global $MySQL, $mysql_con;
    $SQL = $MySQL["GetAccount"];
    $SQL = str_replace('#ID', $username, $SQL);
    $result = array("Code" => 0, "Message" => "Successful");
    $res = mysqli_query($mysql_con, $SQL);
    if (mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        if ($password == $row['Password'])
        {
            $SQL = $MySQL["GetClient"];
            $SQL = str_replace('#ID', $username, $SQL);
            $res = mysqli_query($mysql_con, $SQL);
            if (mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_row($res);
                session_name('user');
                session_start();
                $_SESSION['UserID'] = $username;
                $_SESSION['FirstName'] = $row [0];
                $_SESSION['LastName'] = $row [1];
                $_SESSION['Address'] = $row [2];
                $_SESSION['Phone_Number'] = $row [3];
                $_SESSION['Subscription'] = $row [4];
                $_SESSION['Email'] = $row [5];
                $_SESSION['Level'] = 5;
                echo json_encode($result);
                return;
            } else {
                $SQL = $MySQL["GetStaff"];
                $SQL = str_replace('#ID', $username, $SQL);
                $res = mysqli_query($mysql_con, $SQL);
                $row = mysqli_fetch_row($res);
                session_name('user');
                session_start();
                $_SESSION['UserID'] = $username;
                $_SESSION['FirstName'] = $row [0];
                $_SESSION['LastName'] = $row [1];
                $_SESSION['Address'] = "";
                $_SESSION['Phone_Number'] = "";
                $_SESSION['Subscription'] = "";
                $_SESSION['Email'] = $row [3];
                $_SESSION['Level'] = $row [2];
                echo json_encode($result);
                return;
            }
        }
    }
    $result = array("Code" => 1, "Message" => "Error");
    echo json_encode($result);
}

function Register($firstName, $lastName, $password, $email, $newsletter)
{
    global $MySQL, $mysql_con;
    $result = array("Code" => 0, "Message" => "Successful");
    $time = microtime();
    $ClientID = substr($time, strlen($time) - 5, 5);
    $SQL = $MySQL ["InsertMember"];
    $SQL = str_replace('#ClientID', $ClientID, $SQL);
    $SQL = str_replace('#Password', $password, $SQL);
    $SQL = str_replace('#RegIP', get_client_ip(), $SQL);
    $res1 = mysqli_query($mysql_con, $SQL);
    $SQL = $MySQL ["InsertClient"];
    $SQL = str_replace('#ClientID', $ClientID, $SQL);
    $SQL = str_replace('#FirstName', $firstName, $SQL);
    $SQL = str_replace('#LastName', $lastName, $SQL);
    $SQL = str_replace('#NewsLetter', $newsletter, $SQL);
    $SQL = str_replace('#Email', $email, $SQL);
    $res2 = mysqli_query($mysql_con, $SQL);
    if ($res1 !== $res2)
        $result = array("Code" => 1, "Message" => "Failed");
    echo json_encode($result);
    session_name('user');
    session_start();
    $_SESSION['UserID'] = $ClientID;
    $_SESSION['FirstName'] = $firstName;
    $_SESSION['LastName'] = $lastName;
    $_SESSION['Address'] = "";
    $_SESSION['Phone_Number'] = "";
    $_SESSION['Subscription'] = $newsletter;
    $_SESSION['Email'] = $email;
    $_SESSION['Level'] = 5;
    $time = date("d/m/Y");
    //$textNews = "Receive newsletter";
    $textNews = "Yes";
    if ($newsletter == 0) {
        //$textNews = "Don't receive newsletter";
        $textNews = "No";
    }
    $ip = get_client_ip();
    $SQL = $MySQL ["InsertWelcomeEmail"];
    $SQL = str_replace('#Name', $firstName . " " . $lastName, $SQL);
    $SQL = str_replace('#ClientID', $ClientID, $SQL);
    $SQL = str_replace('#IP', $ip, $SQL);
    $SQL = str_replace('#Time', $time, $SQL);
    $SQL = str_replace('#News', $textNews, $SQL);
    $SQL = str_replace('#Email', $email, $SQL);
    mysqli_query($mysql_con, $SQL);
    exec("wget -qO- http://CapriviHealthcareResearch2.itdp.com.au/sendEmail.php?clientid=" . $ClientID);
    //exec("/bin/php " . __DIR__ . "/sendEmail.php \"$firstName $lastName\" \"$ClientID\" \"$ip\" \"$time\" \"$textNews\" \"$email\"  > /dev/null 2> /dev/null &");
    //echo "/bin/php " . __DIR__ . "/sendEmail.php \"$firstName $lastName\" \"$ClientID\" \"$ip\" \"$time\" \"$textNews\" \"$email\"  > /dev/null 2> /dev/null &";
    //sendWelcomeEmail($firstName . " " . $lastName, $ClientID, get_client_ip(), $time, $textNews, $email);
}

function Logout(){
    session_name('user');
    session_start();
    session_destroy();
    unset($_SESSION['UserID']);
    unset($_SESSION['FirstName']);
    unset($_SESSION['LastName']);
    unset($_SESSION['Address']);
    unset($_SESSION['Phone_Number']);
    unset($_SESSION['Subscription']);
    unset($_SESSION['Email']);
    unset($_SESSION['Level']);
    echo "<h1>Redirect to home page!</h1> <script type='application/javascript'>window.location = \"http://caprivihealthcareresearch2.itdp.com.au/\"</script>";
}

function UpdateProfile($ID, $address, $phone, $sub, $email){
    global $MySQL, $mysql_con;
    $SQL = $MySQL["UpdateProfile"];
    $SQL = str_replace('#ID', $ID, $SQL);
    $SQL = str_replace('#Address', $address, $SQL);
    $SQL = str_replace('#Phone', $phone, $SQL);
    $SQL = str_replace('#Sub', $sub, $SQL);
    $SQL = str_replace('#Email', $email, $SQL);
    $result = array("Code" => 0, "Message" => "Successful");
    $res = mysqli_query($mysql_con, $SQL);
    if ($res) {
        session_name('user');
        session_start();
        $_SESSION['Address'] = $address;
        $_SESSION['Phone_Number'] = $phone;
        $_SESSION['Subscription'] = $sub;
        $_SESSION['Email'] = $email;
        echo json_encode($result);
        return;
    }
    $result = array("Code" => 1, "Message" => "Error");
    echo json_encode($result);
}

function AddPost($UserID, $Title, $Comment){
    global $mysql_con, $MySQL;
    $result = array("Code" => 0, "Message" => "Successful");
    $time = microtime();
    $ForumID = substr($time, strlen($time) - 5, 5);
    $SQL = $MySQL ["InsertPost"];
    $SQL = str_replace('#ForumID', $ForumID, $SQL);
    $SQL = str_replace('#ClientID', $UserID, $SQL);
    $SQL = str_replace('#Title', $Title, $SQL);
    $SQL = str_replace('#Comment', $Comment, $SQL);
    $res = mysqli_query($mysql_con, $SQL);
    if ($res) {
        echo json_encode($result);
        return;
    }
    $result = array("Code" => 1, "Message" => "Error");
    echo json_encode($result);
}

function maa($ClientID, $StaffID, $Date, $Time, $Branch, $Reason){
    global $mysql_con, $MySQL;
    $result = array("Code" => 0, "Message" => "Successful");
    $time_posted = strtotime($Date . " " . $Time);
    $time_posted = date("Y-m-d H:i:s", $time_posted);
    $SQL = $MySQL['InsertMaa'];
    $SQL = str_replace('#ClientID', $ClientID, $SQL);
    $SQL = str_replace('#StaffID', $StaffID, $SQL);
    $SQL = str_replace('#Date', $time_posted, $SQL);
    $SQL = str_replace('#Branch', $Branch, $SQL);
    $SQL = str_replace('#Reason', $Reason, $SQL);
    $res = mysqli_query($mysql_con, $SQL);
    if ($res){
        echo json_encode($result);
        return;
    }
    $result = array("Code" => 1, "Message" => "Error");
    echo json_encode($result);
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