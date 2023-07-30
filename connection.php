<?php
	
	$server="127.0.0.1";
	$user="root";
	$pass="";
	$database="cspb_library";

	$conn = new mysqli($server, $user, $pass, $database);
		if ($conn->connect_error) {
			die ("Connection failed: " . $conn->connect_error);
		}

?>