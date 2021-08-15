<?php
	$name = $_GET['name'];
	$email = $_GET['email'];
	$message = $_GET['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','example');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact_form(name, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $message);
		$execval = $stmt->execute();
	//	echo $execval;
	header("Location: contact.html");
		
		$stmt->close();
		$conn->close();
	}
?>
