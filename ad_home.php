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
				<li><a href="#">Home</a></li>
				<li><a href="ad_student.php">Students</a></li>
				<li><a href="ad_book.php">Books</a></li>
				<li><a href="ad_report.php">Report</a></li>
				
				<li><a href="logout.php">Logout</a></li>
		
			</ul>
		</div>

	<div class="home">

		<span class="text1"> Colegio de San Pascual Baylon </span>
		<span class="text2"> Library System </span>


	</div>


</body>
</html>