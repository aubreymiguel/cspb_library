<?php 
	
	session_start();
	require "connection.php";
	

	if (isset($_POST['submit1'])) {

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

			echo "<div style='background-color: rgb(255, 107, 107); 
					margin: auto;
					font-weight: bold;
					color: black;
					padding: 15px'>Invalid ID and Password !</div>";
	
		
		} else {
			if (isset($_POST['uID'])) {

				$aub = $conn->query("INSERT INTO log_tb (uID, iLog) VALUE ('$uID', '1')");

				echo '<script type="text/javascript"> window.location="usertype.php"; </script>';

			if ($aub === FALSE) {
				echo "Error: " . $sql . "<br>" . $conn->error;

			}

		
		}
		
		$row = $result->fetch_assoc();
		$_SESSION['sesuName'] = $row['uFirst'];
		$_SESSION['sesuID'] = $row['uID'];
		$_SESSION['sesuPass'] = $row['uPass'];
		$_SESSION['sesuType'] = $row['uType'];
		$_SESSION['sesuLast']= $row['uLast'];
		$_SESSION['sesuCrs'] = $row['uCrs'];
		$_SESSION['uSctn'] = $row['uSctn'];

		

	
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="log-reg.css">
	

	<title>Login | CSPB Library System</title>
</head>
<body>

	<center>

		<form action="index.php" method="POST">

		<div class="index">

				<img src="logo.PNG" height="60px" width="60px">
				<p id="cspb">Colegio de San Pascual Baylon</p>
				<h1>Library System</h1>
		
			<hr align="center">
			<div class="index_stdnt">
			
				<br>
				<input type="text" placeholder="Enter ID" name="uID" required><br><br>
				<input type="password" placeholder="Enter Password" name="uPass" required><br><br><br>
				<input type="submit" name="submit1" value="Login"><br><br>
				<hr align="center" width="250px">
				
		
			</div>

		<strong>

			
				
		</strong>

	</div> 

	</form>


</body>
</html>