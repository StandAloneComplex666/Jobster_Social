<?php
/**
 * Created by PhpStorm.
 * User: Stand Alone Complex
 * Date: 2018/4/12
 * Time: 20:08
 */

//get parameters from frontend.
$semail = $_POST['semail'];
$cname = $_POST['cname'];
$jid = $_POST['jid'];

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

//update application to the backend database.
$sql_update_application = "INSERT INTO StudentApplyJob(`semail`, `jid`, `cname`, `status`) VALUES('$semail', '$jid', '$cname','unviewed');";
mysqli_query($conn, $sql_update_application);

//check if the application has been updated.
$sql_check_application_update = "select * from StudentApplyJob where semail = '$semail', jid = '$jid', cname = '$cname';";
$result_check_application_update = mysqli_query($conn, $sql_check_application_update);
if ($result_check_application_update->num_rows > 0){
    $response = True;
    echo json_encode($response);
}
else{
    $response = False;
    echo json_encode($response);
}
$conn->close();
?>