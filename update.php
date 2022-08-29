<?php
    // UPDATE VALUES from HTML into PHP //
	/////////////////////////////////////
    $vehicle = $_POST['vehicle'];
	$vehType = $_POST['vehType'];
	$duration = $_POST['duration'];

	// Database connection
	$conn = new mysqli('localhost','root','','parkingdb');

	//UPDATE
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		// THEN use the userid as condition so it does not change the whole database
		$sql = "update booking set vehicle='$vehicle', vehType = '$vehType', duration = '$duration'";
	}
	if($conn->query($sql)==TRUE){
		header('Location: details.php');
	}
	else{
		echo "error: ".$sql."<br>".$conn->error;
	}

	$conn->close();
	exit();
	
?>