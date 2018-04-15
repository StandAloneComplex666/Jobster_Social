<?php
// add classes of notification and its initialization function
class notification_info
{
    public $nid;
    public $companysend;
    public $semailsend;
    public $semailreceive;
    public $jid;
    public $pushtime;

}

function Build_Notification_Info($row)
{
    $notificationInfo = new notification_info();
    $notificationInfo -> nid = $row['cemail'];
    $notificationInfo -> companysend = $row['companysend'];
    $notificationInfo -> semailsend = $row['semailsend'];
    $notificationInfo -> semailreceive = $row['semailreceive'];
    $notificationInfo -> jid = $row['jid'];
    $notificationInfo -> pushtime = $row['pushtime'];
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

CREATE TABLE `JobAnnouncement` (
`jid` VARCHAR(10) NOT NULL,
    `jlocation` VARCHAR(45) NULL,
    `jtitle` VARCHAR(45) NULL,
    `jsalary` VARCHAR(45) NULL,
    `jreq_diploma` VARCHAR(45) NULL,
    `jreq_experience` VARCHAR(45) NULL,
    `jreq_skills` VARCHAR(90) NULL,
    `jdescription` VARCHAR(200),
    PRIMARY KEY (`jid`)
);
//get parameters from frontend.
//the job parameters.
$jid = $_POST['jid'];
$jlocation = $_POST['jlocation'];
$jtitle = $_POST['jsalary'];
$jreq_diploma = $_POST['jreq_diploma'];
$jreq_experience = $_POST['jreq_experience'];
$jreq_skills = $_POST['jskills'];
$jdescription = $_POST['jdescription'];

//update the JobAnnouncement and Notification table.
$sql_update_jobannouncement = "INSERT INTO JobAnnoncement (`jid`, `jlocation`, `jtitle`, `jreq_experience`, `jreq_skills`, `jreq_diploma`, `jdescription`)
VALUES ('$jid', '$jlocation', '$jtitle', '$jreq_experience', '$jreq_skills', '$jreq_diploma', '$jdescription');";
?>