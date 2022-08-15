<?php
	//Get Heroku ClearDB connection information
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"],1);
	$active_group = 'default';
	$query_builder = TRUE;

	$vehicle = $_POST['vehicle'];
	$vehType = $_POST['vehType'];

	// Database connection
	$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
	//$conn = new mysqli('localhost','root','databasename');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		//$stmt = $conn->prepare("insert into table_name(vehicle,vehType) values(?,?)");
		$stmt = $conn->prepare("insert into smoove app database(vehicle,vehType) values(?,?)");
		$stmt->bind_param("ss", $vehicle,$vehType );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>