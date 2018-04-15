<?php

$semail = $_POST['semail'];

//initial classes for feedback to frontend.
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
    $personalInfo->skey = $row['skey'];
    $personalInfo->sphone = $row['sphone'];
    $personalInfo->sfirstname = $row['sfirstname'];
    $personalInfo->slastname = $row['slastname'];
    $personalInfo->suniversity = $row['suniversity'];
    $personalInfo->smajor = $row['smajor'];
    $personalInfo->sgpa = $row['sgpa'];
    $personalInfo->sresume = $row['sresume'];
    return $personalInfo;
}

class company_info{
    public $cname;
    public $ckey;
    public $cphone;
    public $cemail;
    public $cindustry;
    public $clocation;
    public $cdescription;
}

function Build_Company_Info($row)
{
    $companyInfo = new company_info();
    $companyInfo->ceamil = $row['cemail'];
    $companyInfo->ckey = $row['ckey'];
    $companyInfo->cphone = $row['cphone'];
    $companyInfo->cname = $row['cname'];
    $companyInfo->cindustry = $row['cindustry'];
    $companyInfo->clocation = $row['clocation'];
    $companyInfo->cdescription = $row['cdescription'];
    return $companyInfo;
}

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

//query personal infomation and the personal that student has followed from backend database.
$sql_personal_info = "select * from Student where semail = '$semail';";
$result_personal_info = mysqli_query($conn, $sql_personal_info);

if  ($result_personal_info->num_rows > 0){
    while ($row = $result_personal_info->fetch_assoc()){
        $info = Build_personal_Info($row);
        array_push($response, $info);
        }
    //echo json_encode($response_personal_info);
}
else{
    $flag_personal_info = 0;
}

$sql_company_followed_by = "Select * from notification where cname in (select cname  from  StudentFollowcompany where semail = '$semail');";
$result_company_followed_by = mysqli_query($conn, $sql_company_followed_by);

if  ($result_company_followed_by->num_rows > 0){
    while ($row = $result_company_followed_by->fetch_assoc()){
        $info = Build_Company_Info($row);
        array_push($response, $info);
    }
    //echo json_encode($response_personal_info);
}
else{
    $flag_company_followed_by = 0;
}

//response to frontend.
if ($flag_company_followed_by ==0 and $flag_personal_info ==0){
    echo "404 not found...";
}
elseif($flag_company_followed_by ==0)
{
    echo json_encode($response)."& no company followed by this guy";
}
else
{
    echo json_encode($response);
}
$conn->close();
?>