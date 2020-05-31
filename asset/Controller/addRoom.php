<?php
	require_once("../../conn.php");
	
	$nameRoom = $_POST["nameRoom"];
	$typeRoom= $_POST["typeRoom"];
	$priceRoom = $_POST["priceRoom"];	
	$target_dir = "../Uploads/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	$target_file = $target_dir . $file_name;
	
	
	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
	
	$sql = "INSERT INTO room (name, price, type,image)
			VALUES ('$nameRoom', $priceRoom,'$typeRoom', '$file_name')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../Admin/index.php");
	}
?>