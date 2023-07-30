<?php 
	
	session_start();
	require "connection.php";


		if (isset($_GET['return_id'])) {

			$wCtr = $_GET['return_id'];

			$sql = "SELECT issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wDate FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr AND issue_tb.wCtr='$wCtr'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

				$row = $result->fetch_assoc();

				$bCtr = $row['bCtr'];
				$bStatus = "Available";
				$wReturn = date("Y-m-d");
				$limit = 1;
						
					
				$aub = "UPDATE issue_tb, books_tb, users_tb SET issue_tb.wReturn='$wReturn', books_tb.bStatus='$bStatus', users_tb.uLimit = (SELECT SUM(users_tb.uLimit) - ($limit) as QTY) WHERE books_tb.bCtr='$bCtr' AND issue_tb.wCtr='$wCtr' AND issue_tb.uID = users_tb.uID";

					if ($conn->query($aub) === TRUE) {
						echo '<script type="text/javascript"> window.location="lib_issue.php"; </script>';
					
					} else {

						echo "Error: " . $aub . "<br>" . $conn->error;
					}

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
	
	<div class="ad_content6">
			<h1>Issued Book</h1>
		<div align="center">
			<hr>
	
			<table width="1000px" border="1">


	<?php 


			$sql = "SELECT issue_tb.wCtr, issue_tb.bCtr, issue_tb.uID, books_tb.bCode, books_tb.bTitle, books_tb.bAuthor, books_tb.bEdition, issue_tb.wDate FROM books_tb, issue_tb WHERE books_tb.bCtr=issue_tb.bCtr AND issue_tb.wReturn=''";
			
			$result = $conn->query($sql);

			if ($result->num_rows == 0) {

				echo "<br><br><br> <strong><div style='color: red; font-size: 18pt'> No issued book found ! </div></strong>";
			}

			else if ($result->num_rows > 0) {

					echo "<tr>";
					echo "<th>" . "Book No." . "</th>";
					echo "<th>" . "Student's ID" . "</th>";
					echo "<th>" . "Code" . "</th>";
					echo "<th>" . "Title" . "</th>";
					echo "<th>" . "Author" . "</th>";
					echo "<th>" . "Issued Date" . "</th>";
					echo "<th>" . "Return Book" . "</th>";
					echo "</tr>";

				while ($row = $result->fetch_assoc()) {
					
				
					echo "<tr>";

					echo "<td>" . $row['bCtr'] . "</td>";

					echo "<td>" . $row['uID'];
					echo "</td>";

					echo "<td>" . $row['bCode'];
					echo "</td>";

					echo "<td>" . $row['bTitle'] . " " . "<br>" . "( " . $row['bEdition'] . ")";
					echo "</td>";

					echo "<td>" . $row['bAuthor'];
					echo "</td>";

					echo "<td>" . $row['wDate'];
					echo "</td>";

					echo "<td>"; 
				
					?>		
					
					<button type="button" style="background-color: rgb(0, 83, 36); padding: 7%; border-radius: 10px 10px 10px 10px; color: white; cursor: pointer; outline: none"><a href="?return_id=<?php echo $row['wCtr'];?>" style="text-decoration: none; color: white">Return Now</a></button>
					
					<?php 

					echo "</td>";

					echo"</tr>";

				}
			}

		?>
			</table>

		</div>
	</div>
</div>
</div>

</body>
</html>