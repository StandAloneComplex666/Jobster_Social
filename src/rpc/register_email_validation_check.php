<?php
    //this script is used to check the validation of the email of registration or check if it has been already used before.
    $reg_email = $_POST['email'];

    //the parameters that used for connecting to database.
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Jobster";

    //create new connection and check if it is connected successfully.
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(array('message' => "Connection failed: " . $conn->connect_error)));
    }

    $sql_check_double_email = "select semail from Student where semail = '$reg_email";
    $double_check  = mysqli_query($conn, $sql_check_double_email);

    if ($double_check->num_rows > 0)
    {
        echo "This username has been occupied. Please choose another one!";
        $response = False;
    }
    else
    {
        echo "You can register with this username!";
        $response = True;
    }
?>