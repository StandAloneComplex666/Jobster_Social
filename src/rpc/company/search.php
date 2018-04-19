<?php
/**
 * Created by PhpStorm.
 * User: Stand Alone Complex
 * Date: 2018/4/17
 * Time: 20:37
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
//initialize return variable.
$response = array();

//get parameters from frontend
$keyword = $_POST['keyword'];

//query from backend database to find the students that fit the keywords;
$sql_search_student = "select * from student where $suniverstiy like '%$keyword%' or sgpa"
