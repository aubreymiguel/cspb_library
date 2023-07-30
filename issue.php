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
	<link rel="stylesheet" type="text/css" href="content.css">
</head>
<body>

	<div class="menu">

		<img src="user.png" height="100px" width="100px" id="img1">
		<p id="hi"> Welcome, </p>
		<?php echo "<div align='center'><font color='white' size='5px'> $_SESSION[sesuName] !</font></div>"; ?><br>
		<hr color="gray">
		<br><br>
		
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="info.php">Student's Info</a></li>
				<li><a href="book.php">Books</a></li>
				<li><a href="issue.php">Issued Books</a></li>
				
				<li><a href="logout.php">Logout</a></li>
		
			</ul>
		</div>
	
	<div class="content4">
			<h1>Issued Book</h1>
		<div align="center">
			<hr>
	
			<table width="1000px" border="1">


	<?php 

			$uID = $_SESSION['sesuID'];
				

				$sql = "SELECT issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wDate FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr AND issue_tb.uID='$uID' AND issue_tb.wReturn=''";
				
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

						echo "<td>" . $row['bTitle'] . " " . "<br>( " . $row['bEdition'] . ")";
						echo "</td>";

						echo "<td>" . $row['bAuthor'];
						echo "</td>";

						echo "<td>" . $row['wDate'];
						echo "</td>";
						
					
						echo"</tr>";

					}
				}

				else {

					echo "<br><br><br>" . "<strong><div style='color: red; font-size: 18pt';> No issued book found ! </div></strong>" . "<br><br> Go to <b><i>Books</i></b> to borrow.";
				}


	?>
			</table>

		</div>
	</div>

</body>
</html>