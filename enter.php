<?php 
	
	session_start();
	require "connection.php";

	if (isset($_POST['uID'])) {
		$uID = $_POST['uID'];
		$uPass = $_POST['uPass'];
	} else {
		$uID = $_SESSION['sesuID'];
		$uPass = $_SESSION['sesuPass'];
	}
	$sql = "SELECT * FROM users_tb WHERE uID='$uID' AND uPass='$uPass'";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo '<script type="text/javascript"> window.location="index.php";</script>';
	} else {
		if (isset($_POST['uID'])) {
			$aub = $conn->query("INSERT INTO log_tb (uID, iLog) VALUE ('$uID', '1')");
			if ($aub === FALSE) {
				echo "Error: " . $sql . "<br>" . $conn->error;

			}
		}
	

	$row = $result->fetch_assoc();
	$_SESSION['sesuName'] = $row['uFirst'];
	$_SESSION['sesuID'] = $row['uID'];
	$_SESSION['sesuPass'] = $row['uPass'];
	
	}

?>