<?php
    session_start();

	$active_group = 'default';
	$query_builder = TRUE;

    // Required field names
    $vehicle = $_POST['vehicle'];
    $vehType = $_POST['vehType'];
    $date = $_POST['date'];
    $time = $_POST['time'];
	$duration = $_POST['duration'];

	// Database connection
	$conn = new mysqli('localhost','root','','parkingdb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        if($vehicle != "" && $date != "" && $time != ""){
            $stmt = $conn->prepare("insert into booking(vehicle,vehType,date,time,duration) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $vehicle,$vehType,$date,$time,$duration );
            $execval = $stmt->execute();
            echo $execval;
            echo header ("Location:details.php");
            $stmt->close();
            $conn->close();
        }
        else{
            echo "Failed";
        }
	}

    // LOGIN USER
if (isset($_POST['login_user'])) {
    $query = "SELECT * FROM user_form WHERE username='$username'";
    $username = mysqli_real_escape_string($db, $_POST['username']);
  }
?>