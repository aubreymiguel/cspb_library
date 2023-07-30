<?php 

	require "connection.php";
	if (isset($_POST['uID'])) {
		$uID = $_POST['uID'];
		$uFirst = $_POST['uFirst'];
		$uLast = $_POST['uLast'];
		$uAddr = $_POST['uAddr'];	
		$uCntc = $_POST['uCntc'];
		$uEmail = $_POST['uEmail'];
		$uPass = $_POST['uPass'];
		$uCrs = $_POST['uCrs'];
		$uSctn = $_POST['uSctn'];
		$uYear = $_POST['uYear'];
		$uGrdn = $_POST['uGrdn'];
		$uGcon = $_POST['uGcon'];
		

		$result = $conn->query("SELECT uID FROM users_tb WHERE uID = '$uID'");
		if ($result->num_rows == 0) {
			$sql = "INSERT INTO users_tb (uID, uFirst, uLast, uAddr, uCntc, uEmail, uPass, uCrs, uSctn, uYear, uGrdn, uGcon, uType, uLimit) VALUES ('$uID', '$uFirst', '$uLast', '$uAddr', '$uCntc', '$uEmail', '$uPass', '$uCrs', '$uSctn', '$uYear', '$uGrdn', '$uGcon', '1', '0')";

				
			if ($conn->query($sql) === FALSE) {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	}
	
	$conn->close();
	include "reg.php";
	

?>

<!DOCTYPE html>
<html>
<body>
	<strong><?php echo "<div style='background-color: rgb(0, 83, 36);
						font-family: Arial;
						margin: auto;
						text-align: center;
						color: white;
						max-width: 700px;
						padding: 1%'>
						Registration Successful ! Go to <a href='lib_student.php' style='color: white; font-style: italic'>Registered Students</a>.</div>"; ?></strong>


</body>
</html>

