<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2018/4/17
 * Time: 23:51
 */
class personal_info{
    public $semail;
    public $skey;
    public $sphone;
    public $sfirstname;
    public $slastname;
    public $suniversity;
    public $smajor;
    public $sgpa;
    public $sresume;
}

function Build_personal_Info($row)
{
    $personalInfo = new personal_info();
    $personalInfo->seamil = $row['semail'];
    $personalInfo->sphone = $row['sphone'];
    $personalInfo->sfirstname = $row['sfirstname'];
    $personalInfo->slastname = $row['slastname'];
    $personalInfo->suniversity = $row['suniversity'];
    $personalInfo->smajor = $row['smajor'];
    $personalInfo->sgpa = $row['sgpa'];
    $personalInfo->sresume = $row['sresume'];
    return $personalInfo;
}

//the parameters that used for connecting to database.
$servername = "localhost";
$dbusername = "root";
$password = "root";
$dbname = "jobster";

//create new connection and check if it is connected successfully.
$conn = new mysqli($servername, $dbusername, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(array('message' => "Connection failed: " . $conn->connect_error)));
}

//getparameters from frontend.
$cname = $_POST['cname'];
$jid = $_POST['jid'];

//query all the student that followed and update notification

$sql_post_selected_student = "INSERT INTO notification(`nid`, `companysend`, `semailreceive`, `jid`, `pushtime`, `status`)
VALUES ('', '$cname', '$semail[1]', '$jid', CURRENT_DATE, 'unviewed');";

$conn->close();
?>