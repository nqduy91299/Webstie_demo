<?php
	require_once("../../conn.php");
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$sql = "INSERT INTO account_customer (email,password,name,phone)
			VALUES ('$email', '$password','$name','$phone')";
	
	if ($conn->query($sql) === FALSE) {
		//die("Error: " . $sql . $conn->error);
		echo "Tên tài khoản bị trùng";
	} else {
		
		header("Location: signIn.php");
	}
?>