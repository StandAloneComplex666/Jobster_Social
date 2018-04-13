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
    public $cindustry;
    public $clocation;
    public $cdescription;
}

function Build_Company_Info($row)
{
    $personalInfo = new company_info();
    $personalInfo->ceamil = $row['cemail'];
    $personalInfo->ckey = $row['ckey'];
    $personalInfo->cphone = $row['cphone'];
    $personalInfo->cname = $row['cname'];
    $personalInfo->cindustry = $row['cindustry'];
    $personalInfo->clocation = $row['clocation'];
    $personalInfo->cdescription = $row['cdescription'];
    return $company_info;
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
        $info = Build_Company_Info($row);
        array_push($response, $info);
    }
    echo json_encode($response);
}
else{
    echo "[]";
}
?>