<?php

	require_once("../../conn.php");
	$type = $_POST["type"];
	$price = $_POST["price"];
	$nameUser = $_POST["nameUser"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$checkin = $_POST["checkIn"];
	$checkout = $_POST["checkout"];
	$nameRoom = $_POST["nameRoom"];
	$room = $_POST["room"];
	$sql = "SELECT checkin, nameRoom FROM info";
    $result = $conn->query($sql);
	while($data = mysqli_fetch_row($result)){
		$t = $data[0];
		$ten = $data[1];
		if($t == $checkin && $ten == $nameRoom ){
			header("Location: ktNgayTrung.php");
		}
		else/*($t != $checkin && $ten != $name )*/{
			$sql = "INSERT INTO info (nameRoom, price, nameUser, email,phone,checkin,checkout,type,room)
					VALUES ('$nameRoom', '$price', '$nameUser', '$email','$phone','$checkin','$checkout','$type','$room')";
					
			if ($conn->query($sql) === FALSE) {
				die("Error: " . $sql . $conn->error);
			} else {
				header("Location: ./bookingSuccessful.php");
				$sql="DELETE FROM bangtam";
				$conn->query($sql);
				
			}
			break;
		}
		
	}
?>