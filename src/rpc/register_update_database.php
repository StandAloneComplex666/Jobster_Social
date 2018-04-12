<?php
//This script is used to update the register information to backend database.

//Fisrt check the user type: student user or company user.
$user_type = $_POST['usertype']
	if ($user_type == 'student'){
        $semail = $_POST['semail'];
        $skey = $_POST['skey'];
        $sfirstname = $_POST['sfirstname'];
        $slastname = $_POST['slastname'];
        $sgpa = $_POST['sgpa'];
        $sphone = $_POST['sphone'];
        $suniversity = $_POST['univ'];
        $smajor = $_POST['smajor'];
        $sresume = $_POST['sresume'];
        $sql_update = "INSERT INTO `Student` (`semail`, `skey`, `sphone`, `sfirstname`, `slastname`, `suniversity`, `smajor`, `sgpa`, `sresume`)
					   VALUES (`$semail`, `$skey`, `$sphone`, `$sfirstname`, `$slastname`, `$suniversity`, `$smajor`, `$sgpa`, `$sresume`)";
        $sql_check_update = "select semail from Student where semail = '$semail';";
    }
    elseif ($user_type == 'company') {
        $cname = $_POST['cname'];
        $ckey = $_POST['ckey'];
        $clocation = $_POST['clocation'];
        $cemail = $_POST['cemail'];
        $cphone = $_POST['cphone'];
        $cindusty = $_POST['cindusty'];
        $cdescription = $_POST['cdescription'];
        $sql_update = "INSERT INTO `Company` (`cname`, `ckey`, `cemail`, `clocation`, `cphone`, `cindusty`, `cdescription`)
					   VALUES (`$cname`, `$ckey`, `$cemail`, `$clocation`, `$cphone`, `$cindusty`, `$cdescription`);";
        $sql_check_update = "select cname from Company where cname = '$cname';";

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

    //send query of update new user to backend database.
    $update  = mysqli_query($conn, $sql_update);
    $check_update = mysqli_query($conn, $sql_check_update);
    if ($check_update->num_rows > 0)
    {
        $response = True;
        echo json_encode($response);
    }
    else:
    {
        $response = False;
        echo json_encode($response);
    }
    $conn->close();

?>