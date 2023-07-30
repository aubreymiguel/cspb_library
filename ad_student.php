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

	<form action="ad_student.php" method="POST">


	<div class="ad_content2">
			<h1>Registered Students</h1>
		<div align="center">
			<hr>

	<input list="datalist" id="uName" name="dataname" placeholder="Student's Name">

	<datalist id="datalist">

	<?php

	$sql = "SELECT uLast FROM users_tb WHERE uType='1'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    
	    while($row = $result->fetch_assoc()) {
	        echo "<option value='";
	        echo $row["uLast"];
	        echo "'>";
	    }
	   
	} else {
	    echo "0 results";
	}

	?>
       
    </datalist>		
	<button type="submit" name="search_stud">Search</button>
	<button type="submit" name="view_all">View All</button>

	<table width="1000px" border="1">


	<?php 


			if (isset($_POST['search_stud'])) {

				$dataname = $_POST['dataname'];

				$aub = "SELECT * FROM users_tb WHERE uLast='$dataname' AND uType='1'";
				$result = $conn->query($aub);
			

			if ($result->num_rows > 0) {
			
				echo "<tr>";
				echo "<th>" . "Student's ID" . "</th>";
				echo "<th>" . "Name" . "</th>";
				echo "<th>" . "Address" . "</th>";
				echo "<th>" . "Mobile Number" . "</th>";
				echo "<th>" . "Email Address" . "</th>";
				echo "<th>" . "Course" . "</th>";
				echo "<th>" . "Section" . "</th>";
				echo "<th>" . "School Year" . "</th>";
				echo "<th>" . "Guardian" . "</th>";
				echo "<th>" . "Mobile Number" . "</th>";
				echo "</tr>";


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

			}

			$conn->close();

	} else if (isset($_POST['view_all'])) { 


		$aub = "SELECT * FROM users_tb WHERE uType='1'";
				$result = $conn->query($aub);
			

			if ($result->num_rows > 0) {
			
				echo "<tr>";
				echo "<th>" . "Student's ID" . "</th>";
				echo "<th>" . "Name" . "</th>";
				echo "<th>" . "Address" . "</th>";
				echo "<th>" . "Mobile Number" . "</th>";
				echo "<th>" . "Email Address" . "</th>";
				echo "<th>" . "Course" . "</th>";
				echo "<th>" . "Section" . "</th>";
				echo "<th>" . "School Year" . "</th>";
				echo "<th>" . "Guardian" . "</th>";
				echo "<th>" . "Mobile Number" . "</th>";
				echo "</tr>";


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

			}

	} 


		else  {

			$aub = "SELECT * FROM users_tb WHERE uType='1'";
			$result = $conn->query($aub);

			if ($result->num_rows > 0) {
			
				echo "<tr>";
				echo "<th>" . "Student's ID" . "</th>";
				echo "<th>" . "Name" . "</th>";
				echo "<th>" . "Address" . "</th>";
				echo "<th>" . "Mobile Number" . "</th>";
				echo "<th>" . "Email Address" . "</th>";
				echo "<th>" . "Course" . "</th>";
				echo "<th>" . "Section" . "</th>";
				echo "<th>" . "School Year" . "</th>";
				echo "<th>" . "Guardian" . "</th>";
				echo "<th>" . "Mobile Number" . "</th>";
				echo "</tr>";


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

			} 

			$conn->close();
	}
	
	?>

		</table>

			
		</div>

	</div>
</form>

</body>
</html>