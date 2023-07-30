<?php 
	
	session_start();
	require "connection.php";

	
	if (!isset($_SESSION['sesuType'])) {

		echo '<script type="text/javascript"> window.location="index.php";</script>';
	}

	if (isset($_GET['borrow_id'])) {

		$bCtr = $_GET['borrow_id'];
		
		$sql = "SELECT * FROM books_tb WHERE bCtr='$bCtr'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();
			
			$uID = $_SESSION['sesuID'];
			$bCtr = $row['bCtr'];
			$bNumDays = $row['bNumDays'];
			$bStatus = "Unavailable";
			$wDate = date('Y-m-d');
			$limit = 1;


				$aub = "INSERT INTO issue_tb (bCtr, uID, wDate, wReturn) VALUES ('$bCtr', '$uID', '$wDate', '')";


				if ($conn->query($aub) === FALSE) {
					echo "Error: " . $aub . "<br>" . $conn->error;
				}

				$brey = "UPDATE books_tb, users_tb SET books_tb.bStatus='$bStatus', users_tb.uLimit = (SELECT SUM(users_tb.uLimit) + ($limit) as QTY ) WHERE books_tb.bCtr='$bCtr' AND users_tb.uID = '$uID'";

				if ($conn->query($brey) === FALSE) {
					echo "Error: " . $brey . "<br>" . $conn->error;
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

	<div class="content3">
			<h1>Books</h1>
		<div align="center">
			<hr>
			<form action="book.php" method="POST">

				<input list="datalist" id="uName" name="bName" placeholder="Search Book">

				<datalist id="datalist">

					<?php

						$sql = "SELECT bTitle FROM books_tb ORDER BY bTitle ASC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
				    
				  			while($row = $result->fetch_assoc()) {
				        		echo "<option value='";
				        		echo $row["bTitle"];
				        		echo "'>";
				    			
				    			}
				   
							} else {
				  			echo "0 results";
						}

					?>
       
   				</datalist>

				<button type="submit" name="search_btn">Search</button>
				<button type="submit" name="view_all">View All</button>

			<table width="980px" border="1">

		<?php
			

			if (isset($_POST['search_btn'])) {

				$bName = $_POST['bName'];
				$uID = $_SESSION['sesuID'];

				$aub = "SELECT * FROM books_tb, users_tb WHERE users_tb.uID = '$uID' AND books_tb.bTitle = '$bName' ORDER BY bTitle ASC";

				$result = $conn->query($aub);

				if ($result->num_rows > 0) {

					echo "<tr>";
					echo "<th>" . "CODE" . "</th>";
					echo "<th>" . "TITLE" . "</th>";
					echo "<th>" . "AUTHOR" . "</th>";
					echo "<th>" . "EDITION" . "</th>";
					echo "<th>" . "ISSUE DAYS" . "</th>";
					echo "<th>" . "" . "</th>";
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

						
						if ($row['bStatus'] != 'Unavailable') {

							if ($row['uLimit'] < 2) {
								
								echo "<button type='button' name='borrow' style='background-color: rgb(0, 83, 36); padding: 7%; border-radius: 10px 10px 10px 10px; color: white; cursor: pointer; outline: none'>"; ?>

								<a href="?borrow_id=<?php echo $row['bCtr']; ?>" style="text-decoration: none; color: white">Borrow Now</a>

								<?php 

								echo "</button>";

							} else {

								echo "<div style='color: black; font-weight: bold'> Disabled </div>";
							}
						
						} else {

								echo "<div style='color: red; font-weight: bold'> Unavailable </div>";
							}


						?>

					<?php



					echo "</td>";


					echo"</tr>";

				} 
			}

			else {
					echo "0 results";
				}

		} 

		else if (!isset($_POST['search_btn']) || !isset($_POST['view_all'])) {


			$uID = $_SESSION['sesuID'];
			$sql = "SELECT * FROM books_tb, users_tb WHERE users_tb.uID = '$uID' ORDER BY books_tb.bTitle ASC";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					echo "<tr>";
					echo "<th>" . "CODE" . "</th>";
					echo "<th>" . "TITLE" . "</th>";
					echo "<th>" . "AUTHOR" . "</th>";
					echo "<th>" . "EDITION" . "</th>";
					echo "<th>" . "ISSUE DAYS" . "</th>";
					echo "<th>" . "" . "</th>";
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

						
						if ($row['bStatus'] != 'Unavailable') {

							if ($row['uLimit'] < 2) {
								
								echo "<button type='button' name='borrow' style='background-color: rgb(0, 83, 36); padding: 7%; border-radius: 10px 10px 10px 10px; color: white; cursor: pointer; outline: none'>"; ?>

								<a href="?borrow_id=<?php echo $row['bCtr']; ?>" style="text-decoration: none; color: white">Borrow Now</a>

								<?php 

								echo "</button>";

							} else {

								echo "<div style='color: black; font-weight: bold'> Disabled </div>";
							}
						
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
			}
	
		

		else if (isset($_POST['view_all'])) {

			$uID = $_SESSION['sesuID'];
			$sql = "SELECT * FROM books_tb, users_tb WHERE users_tb.uID = '$uID' ORDER BY books_tb.bTitle ASC";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					echo "<tr>";
					echo "<th>" . "CODE" . "</th>";
					echo "<th>" . "TITLE" . "</th>";
					echo "<th>" . "AUTHOR" . "</th>";
					echo "<th>" . "EDITION" . "</th>";
					echo "<th>" . "ISSUE DAYS" . "</th>";
					echo "<th>" . "" . "</th>";
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

						
						if ($row['bStatus'] != 'Unavailable') {

							if ($row['uLimit'] < 2) {
								
								echo "<button type='button' name='borrow' style='background-color: rgb(0, 83, 36); padding: 7%; border-radius: 10px 10px 10px 10px; color: white; cursor: pointer; outline: none'>"; ?>

								<a href="?borrow_id=<?php echo $row['bCtr']; ?>" style="text-decoration: none; color: white">Borrow Now</a>

								<?php 

								echo "</button>";

							} else {

								echo "<div style='color: black; font-weight: bold'> Disabled </div>";
							}
						
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
			}
			
			$conn->close();


		?>


			</table>

		


	</form>
		
		</div>
	</div>

</body>

</html>