<?php
/**
 * Created by PhpStorm.
 * User: Stand Alone Complex
 * Date: 2018/4/12
 * Time: 20:58
 */
//initialize the class and function of respose.
class company_info{
    public $cname;
    public $ckey;
    public $cphone;
    public $cemail;
    public $cindusty;
    public $clocation;
    public $cdescription;
    public $sgpa;
    public $sresume;
}

function Build_Personal_Info($row)
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

//get parameter from frontend.
$keyword = $_POST['keyword'];

//the parameters that used for connecting to database.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobster";

//create new connection and check if it is connected successfully.
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(array('message' => "Connection failed: " . $conn->connect_error)));
}
//search companies that fit the keywords from backend database.
$sql_company_search = "select *  from  Company where cname LIKE '%$keyword%' or clocation like '%$keyword%' or 
cindusty like '%$keyword%' or cemail like '%$keyword%' or cphone like '%$keyword%' or cdescription like '%$keyword%';";
$result_company_search = mysqli_query($conn, $sql_company_search);

if  ($result_company_search->num_rows > 0){
    while ($row = $result_company_search->fetch_assoc()){
        $info = Build_Personal_Info($row);
        array_push($response, $info);
    }
    echo json_encode($response_personal_info);
}
else{
    echo "[]";
}
?>