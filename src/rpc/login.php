<?php
	//login page,check if the username and keywords are valid.
	$username = $_POST['username'];
	$keywords = $_POST['keywords'];
	$user_type = $_POST['usertype'];
	if ($user_type == 'student'){
		$sql_check_username_exist = "select semail from Student where seamil = '$username'";
		$sql_keywords_match = "select semail, skey from Student where semail = '$username' and skey = '$keywords';";
	}
	elseif ($user_type == 'company') {
		$sql_check_username_exist = "select cname from Company where cname = '$username'";
		$sql_keywords_match = "select cname, ckey from Company where cname = '$username' and ckey = '$keywords';";
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

    $result_username_exist = mysqli_query($conn, $sql_check_username_exist);
    if ($result_username_exist->num_rows > 0)
    {
    	$result_keywords_match = mysqli_query($conn, $sql_keywords_match);
    	if ($result_keywords_match->num_rows > 0)
        {
            $response = "Login successfully!";
            echo json_encode($response);
        }
        else
        {
    	    $response = "The keyword is not correct!";
            echo json_encode($response);
        }
    }
    else{
    	$response = "The username has not been registered.";
        echo json_encode($response);
    }



?>