<?php
	//This script is used to update the register information to backend database.

	//Fisrt check the user type: student user or company user.
	$user_type = $_POST['usertype']
	if ($user_type == 'student'){
		$sql_update = "INSERT INTO `Student` ('semail', `skey`, `sphone`, `sfirstname`, `slastname`, `suniversity`, `smajor`, `sgpa`, `sresume`)
					   VALUES ('dx1368@nyu.edu', `12345678`, `9998887777`, `Da`, `Xu`, `New York University`, `ECE`, `4.0`, `xxxxx`)";
	}
	elseif ($user_type == 'company') {
		$sql_update = "INSERT INTO `Company` (`cname`, `ckey`, `cemail`, `clocation`, `cphone`, `cindusty`, `cdescription`)
					   VALUES (`ZhuYuanzhang`, `1`, `yuanzhang@ming.com`, `Nanjing`, `1368139811`, `CS`, `xxxxx`);"

	}

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
    $double_check  = mysqli_query($conn, $sql_update);
    $conn->close();

?>