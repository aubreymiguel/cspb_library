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

	<form action="add1.php" method="POST">
	<div class="ad_content3">
			<h1>Books</h1>
		<div align="center">
			<hr>
			<input type="submit" value="Add Books" id="add">

			<table width="980px" border="1">

		<?php

			$sql = "SELECT * FROM books_tb ORDER BY bTitle ASC";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					echo "<tr>";
					echo "<th>" . "CODE" . "</th>";
					echo "<th>" . "TITLE" . "</th>";
					echo "<th>" . "AUTHOR" . "</th>";
					echo "<th>" . "EDITION" . "</th>";
					echo "<th>" . "ISSUE DAYS" . "</th>";
					echo "<th>" . "STATUS" . "</th>";
					echo "</tr>";

					while ($row = $result->fetch_assoc()) {
						echo "<tr>";

						echo "<td>" . $row['bCode'];
						echo "</td>";

						echo "<td>" . $row['bTitle'];
						echo "</td>";

						echo "<td>" . $row['bAuthor'];
						echo "</td>";

						echo "<td>" . $row['bEdition'];
						echo "</td>";

						echo "<td>" . $row['bNumDays'];
						echo "</td>";

						echo "<td>"; ?>

						<?php


						if ($row['bStatus'] != "Unavailable") {

							echo "<div style='color: black; font-weight: bold'> Available </div>";
						
						} else {

							echo "<div style='color: red; font-weight: bold'> Unavailable </div>";
						}

						?>


						<?php

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