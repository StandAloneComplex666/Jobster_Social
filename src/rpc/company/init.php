<?php
/**
 * Created by PhpStorm.
 * User: Stand Alone Complex
 * Date: 2018/4/17
 * Time: 23:01
 */
//initial classes for feedback to frontend.
class notification_info
{
    public $nid;
    public $companysend;
    public $semailsend;
    public $semailreceive;
    public $jid;
    public $pushtime;
    public $status;

}

function Build_Notification_Info($row)
{
    $notificationInfo = new notification_info();
    $notificationInfo ->nid = $row['nid'];
    $notificationInfo ->companysend = $row['companysend'];
    $notificationInfo ->semailsend = $row['semailsend'];
    $notificationInfo ->semailreceive = $row['semailreceive'];
    $notificationInfo ->jid = $row['jid'];
    $notificationInfo ->pushtime = $row['pushtime'];
    $notificationInfo ->status = $row['status'];
    return $notificationInfo;
}

//the parameters that used for connecting to database.
$servername = "localhost";
$dbusername = "root";
$password = "";
$dbname = "jobster";

//create new connection and check if it is connected successfully.
$conn = new mysqli($servername, $dbusername, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(array('message' => "Connection failed: " . $conn->connect_error)));
}

//get parameter from frontend.
$cname = $_POST['cname'];

`semail` VARCHAR(20) NOT NULL,
    `jid` VARCHAR(10) NOT NULL,
    `cname` VARCHAR(45) NOT NULL,
    `status` VARCHAR(10) NULL,
    `applytime` date,
//get new application from backend database
$sql_get_application

$conn->close();
?>