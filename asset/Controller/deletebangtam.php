<?php
	require_once("../../conn.php");
	header("Location: ../../index.php");
	$sql="DELETE FROM bangtam";
	$conn->query($sql);
		
	
?>