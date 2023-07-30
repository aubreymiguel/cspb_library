<?php 

	require "connection.php";

	if (isset($_SESSION['sesuID'])) {
		
		$sql = "SELECT * FROM users_tb WHERE uID='$uID'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();


			$dis = "<div style='background-color: rgba(255, 255, 255, 0.8);
						box-shadow: 0 0 9px black; 
						margin: auto;
						color: black;
						border-radius: 15px 15px 15px 15px;
						max-width: 600px;
						padding: 1%;
						margin-bottom: 4%'>
						Password Changed ... Go to <a href='index.php' style='color: black; font-style: italic'>Login Page</a>.</div>";

			$warn = "<div style='background-color: rgb(255, 107, 107);
						box-shadow: 0 0 9px black; 
						margin: auto;
						color: black;
						border-radius: 15px 15px 15px 15px;
						max-width: 600px;
						padding: 1%;
						margin-bottom: 4%'>
						New Password and Confirm Password didn't matched.</div>";



	}


}

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>CSPB Library System</title>
	<link rel="stylesheet" type="text/css" href="aub.css">
	<link rel="stylesheet" type="text/css" href="content.css">

</head>
<body>
	<br><br><br>

<form action="update2.php" method="POST">

	<div class="content2">
		<h1>Change Password</h1><br>
		<hr><br>
		<div align="center">

			<table width="900px" align="center">
				<tr>
					
					<td>New Password:</td>
					<td><input type="password" name="uPass" required></td>
					
					<td>Confirm Password:</td>
					<td><input type="password" name="nPass" required></td>
			
				</tr>
			</table>
		</div>
		<input type="submit" value="     Update     " id="update"><br>

	</div>

</form>
</body>
</html>