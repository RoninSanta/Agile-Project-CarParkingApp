<?php
    // POST Values from HTML into PHP //
	/////////////////////////////////////
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$unitno = $_POST['unitno'];
	$zipcode = $_POST['zipcode'];
	$payment = $_POST['payment'];
	$cardno = $_POST['cardno'];
	$expirydate = $_POST['expirydate'];
	$csv = $_POST['csv'];

	// Database connection
	$conn = new mysqli('localhost','root','','parkingdb');

	//POST
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into checkout(fullname,address,unitno, zipcode, 
													 payment, cardno, expirydate, csv) 
								values(?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->bind_param("ssssssss", $fullname, $address, $unitno, $zipcode, 
									   $payment, $cardno, $expirydate, $csv);
		$execval = $stmt->execute();
		echo $execval;
		header('Location: successful.html');
		$stmt->close();
		$conn->close();
		exit();
	}
?>
