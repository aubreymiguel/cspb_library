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
				<li><a href="ad_home.php">Home</a></li>
				<li><a href="ad_student.php">Students</a></li>
				<li><a href="ad_book.php">Books</a></li>
				<li><a href="ad_report.php">Report</a></li>
				
				<li><a href="logout.php">Logout</a></li>
		
			</ul>
		</div>

	<form action="ad_report.php" method="POST">

	<div class="ad_content4">
		<h1>Report</h1> 
		<div align="center">
			<hr>

			<button type="submit" name="search_brw">Borrowed</button>
			<button type="submit" name="search_rtrn">Returned</button>
			<button type="submit" name="search_pnd">Pending</button>

			<table width="1000px" border="1">


		<?php

			if (isset($_POST['search_brw'])) {

				$sql = "SELECT issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wDate FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

						echo "<tr>";
						echo "<th>" . "Book No." . "</th>";
						echo "<th>" . "Student's ID" . "</th>";
						echo "<th>" . "Code" . "</th>";
						echo "<th>" . "Title" . "</th>";
						echo "<th>" . "Author" . "</th>";	
						echo "<th>" . "Issued Date" . "</th>";
						echo "</tr>";

					while ($row = $result->fetch_assoc()) {
						
					
						echo "<tr>";

						echo "<td>" . $row['bCtr'] . "</td>";

						echo "<td>" . $row['uID'];
						echo "</td>";

						echo "<td>" . $row['bCode'];
						echo "</td>";

						echo "<td>" . $row['bTitle'] . "<br>" . "(" . $row['bEdition'] . ")";
						echo "</td>";

						echo "<td>" . $row['bAuthor'];
						echo "</td>";


						echo "<td>" . $row['wDate'];
						echo "</td>";
						
					
						echo"</tr>";	


					}

				}
			
			} else if (isset($_POST['search_rtrn'])) {

				$sql = "SELECT issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wReturn FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr AND wReturn != '' ";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

						echo "<tr>";
						echo "<th>" . "Book No." . "</th>";
						echo "<th>" . "Student's ID" . "</th>";
						echo "<th>" . "Code" . "</th>";
						echo "<th>" . "Title" . "</th>";
						echo "<th>" . "Author" . "</th>";
						echo "<th>" . "Returned Date" . "</th>";
						echo "</tr>";

					while ($row = $result->fetch_assoc()) {
						
					
						echo "<tr>";

						echo "<td>" . $row['bCtr'] . "</td>";

						echo "<td>" . $row['uID'];
						echo "</td>";

						echo "<td>" . $row['bCode'];
						echo "</td>";

						echo "<td>" . $row['bTitle'] . "<br>" . "(" . $row['bEdition'] . ")";
						echo "</td>";

						echo "<td>" . $row['bAuthor'];
						echo "</td>";


						echo "<td>" . $row['wReturn'];
						echo "</td>";
						
					
						echo"</tr>";	


					}

				}

			} else if (isset($_POST['search_pnd'])) {

				$sql = "SELECT issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wDate, issue_tb.wReturn FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr AND wReturn = '' ";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

						echo "<tr>";
						echo "<th>" . "Book No." . "</th>";
						echo "<th>" . "Student's ID" . "</th>";
						echo "<th>" . "Code" . "</th>";
						echo "<th>" . "Title" . "</th>";
						echo "<th>" . "Author" . "</th>";
						echo "<th>" . "Issued Date" . "</th>";
						echo "<th>" . "Returned Date" . "</th>";
						echo "</tr>";

					while ($row = $result->fetch_assoc()) {
						
					
						echo "<tr>";

						echo "<td>" . $row['bCtr'] . "</td>";

						echo "<td>" . $row['uID'];
						echo "</td>";

						echo "<td>" . $row['bCode'];
						echo "</td>";

						echo "<td>" . $row['bTitle'] . "<br>" . "(" . $row['bEdition'] . ")";
						echo "</td>";

						echo "<td>" . $row['bAuthor'];
						echo "</td>";

						echo "<td>" . $row['wDate'];
						echo "</td>";

						echo "<td>" . $row['wReturn'];

						?>

						<?php 

							if ($row['wReturn'] = " ") {

								echo "PENDING";
							
							}


						?>

						<?php
						echo "</td>";
						
					
						echo"</tr>";	


					}

				} else {

					echo "<br><br><br><br><br>" . "<strong><div style='color: red; font-size: 14pt';> No pending books found.</div></strong>";

				}
			}

			else {

				$sql = "SELECT issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wDate, issue_tb.wReturn FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr";

			$result = $conn->query($sql);

				if ($result->num_rows > 0) {

						echo "<tr>";
						echo "<th>" . "Book No." . "</th>";
						echo "<th>" . "Student's ID" . "</th>";
						echo "<th>" . "Code" . "</th>";
						echo "<th>" . "Title" . "</th>";
						echo "<th>" . "Author" . "</th>";	
						echo "<th>" . "Issued Date" . "</th>";
						echo "<th>" . "Returned Date" . "</th>";
						echo "</tr>";

					while ($row = $result->fetch_assoc()) {
						
					
						echo "<tr>";

						echo "<td>" . $row['bCtr'] . "</td>";

						echo "<td>" . $row['uID'];
						echo "</td>";

						echo "<td>" . $row['bCode'];
						echo "</td>";

						echo "<td>" . $row['bTitle'] . "<br>" . "(" . $row['bEdition'] . ")";
						echo "</td>";

						echo "<td>" . $row['bAuthor'];
						echo "</td>";


						echo "<td>" . $row['wDate'];
						echo "</td>";

						echo "<td>" . $row['wReturn'];
						echo "</td>";

						echo"</tr>";	


					}


				} 

			}


		?>



			</table>

		</div>
	</div>
</form>

</body>
</html>