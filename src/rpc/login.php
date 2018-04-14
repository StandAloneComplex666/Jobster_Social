<?php
//login page,check if the username and keywords are valid.
/*
$username = $_POST['username'];
$passwords = $_POST['psaswords'];
$user_type = $_POST['usertype'];
*/

//test data:
//all correct
$username = 'cz1522@nyu.edu';
$passwords = '12345678';
$usertype = 'student';

//wrong username
//$username = 'cz1523@nyu.edu';
//$passwords = '12345678';
//$usertype = 'student';

//wrong password
//$username = 'cz1523@nyu.edu';
//$passwords = '1234567';
//$usertype = 'student';

//wrong usertype
//$username = 'cz1523@nyu.edu';
//$passwords = '1234567';
//$usertype = 'company';

if ($user_type == 'student') {
    $sql_check_username_exist = "select semail from Student where semail = '$username'";
    $sql_passwords_match = "select semail, skey from Student where semail = '$username' and skey = '$passwords';";
}
elseif ($user_type == 'company'){
    $sql_check_username_exist = "select cname from Company where cname = '$username'";
    $sql_passwords_match = "select cname, ckey from Company where cname = '$username' and ckey = '$passwords';";
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

$result_username_exist = mysqli_query($conn, $sql_check_username_exist);
if ($result_username_exist->num_rows > 0) {
    $result_passwords_match = mysqli_query($conn, $sql_passwords_match);
    if ($result_passwords_match->num_rows > 0) {
        $response = "Login successfully!";
        echo $response;
    } else {
        header('HTTP/1.0 403 Forbidden');
        die('The keyword is not correct!');
    }
} else {
    header('HTTP/1.0 403 Forbidden');
    die("The username has not been registered.");
}

echo $response;
?>