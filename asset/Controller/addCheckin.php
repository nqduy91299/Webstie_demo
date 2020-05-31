<?php
	require_once("../../conn.php");
	
	$checkIn = $_POST["checkIn"];
	$checkOut = $_POST["checkOut"];
	$guest = $_POST["guest"];
	$room = $_POST["room"];
	$sql = "INSERT INTO bangtam (checkIn, checkOut, guest, room)
			VALUES ('$checkIn', '$checkOut', '$guest', '$room')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../Controller/locphong.php");
	}
?>