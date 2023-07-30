<?php
	
	session_start();
	require "connection.php";

	if (!isset($_SESSION['sesuType'])) {

		echo '<script type="text/javascript"> window.location="index.php";</script>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CSPB Library System</title>
	<link rel="stylesheet" type="text/css" href="aub.css">
	<link rel="stylesheet" type="text/css" href="ad_content.css">
</head>
<body>

	<div class="menu">

		<img src="user.png" height="100px" width="100px" id="img1">
		<p id="hi"> Welcome, </p>
		<?php echo "<div align='center'><font color='white' size='5px'> $_SESSION[sesuName] !</font></div>"; ?><br>
		<hr color="gray">
		<br><br>
		
			<ul>
				<li><a href="lib_home.php">Home</a></li>
				<li><a href="lib_student.php">Students</a></li>
				<li><a href="#">Books</a>
					<ul><li><a href="lib_book.php" id="list">List</a></li>
					<li><a href="lib_issue.php" id="iBooks">Issued Books</a></li></ul>
				</li>
				<li><a href="lib_report.php">Report</a></li>
				
				<li><a href="logout.php">Logout</a></li>
		
			</ul>
		</div>

	<form action="reg.php" method="POST">


	<div class="ad_content2">
			<h1>Registered Students</h1>
		<div align="center">
			<hr>

			<input type="submit" value="Registration" id="reg_stud">

			<table width="1000px" border="1">
				<tr>
					<th>Student's ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Mobile Number</th>
					<th>Email Address</th>
					<th>Course</th>
					<th>Section</th>
					<th>School Year</th>
					<th>Guardian</th>
					<th>Mobile Number</th>
				</tr>

		<?php

			$sql = "SELECT * FROM users_tb WHERE uType='1'";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while ($row = $result->fetch_assoc()) {
						
						echo "<td>" . $row['uID'];
						echo "</td>";

						echo "<td>" . $row['uLast'] . ', ' . $row['uFirst'];
						echo "</td>";

						echo "<td>" . $row['uAddr'];
						echo "</td>";

						echo "<td>" . $row['uCntc'];
						echo "</td>";

						echo "<td>" . $row['uEmail'];
						echo "</td>";

						echo "<td>" . $row['uCrs'];
						echo "</td>";

						echo "<td>" . $row['uSctn'];
						echo "</td>";

						echo "<td>" . $row['uYear'];
						echo "</td>";

						echo "<td>" . $row['uGrdn'];
						echo "</td>";

						echo "<td>" . $row['uGcon'];
						echo "</td>";

						echo"</tr>";
					}
				} else {
					echo "0 results";
				}

				$conn->close();


		?>

			</table>

			
		</div>



	</div>
</form>

</body>
</html>