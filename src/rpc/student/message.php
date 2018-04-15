<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2018/4/15
 * Time: 15:26
 */

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


$conn->close();
?>