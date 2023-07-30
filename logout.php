<?php 

	session_start();
	require "connection.php";
	
	$uID = $_SESSION['sesuID'];
	$brey = $conn->query("INSERT INTO log_tb (uID, iLog) VALUE ('$uID', '0')");

	if ($brey === FALSE) {
		echo "Error: " . "<br>" . $conn->error;
	}

	session_destroy();
	echo '<script type="text/javascript"> window.location="index.php"; </script>';
	

?>

</body>
</html>