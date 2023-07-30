<?php 
	
	require "connection.php";

	if (isset($_POST['delete_no'])) {

		$uCtr = $_POST['delete_no'];

		$sql = "DELETE FROM users_tb WHERE uCtr='$uCtr' AND uType='1'";

		if ($conn->query($sql) === TRUE) {

			echo '<script type="text/javascript"> window.location="ad_student.php";</script>';

		}

	}


?>
