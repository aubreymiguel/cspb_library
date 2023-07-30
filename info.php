<?php 
	
	include "enter.php";
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



<form action="update1.php" method="POST">

<div class="content">
		<h1>Personal Information</h1>
	<div align="center">
		<hr>
		<table width="700px" border="1">
			<tr>
				<td width="250px">Student ID: </td>
				<td width="350px"><?php echo $row['uID'] ?></td>
			</tr>

			<tr>
				<td>First Name: </td>
				<td ><?php echo $row['uFirst'] ?></td>
			</tr>

			<tr>
				<td>Last Name: </td>
				<td><?php echo $row['uLast'] ?></td>
			</tr>

			<tr>
				<td>Address: </td>
				<td><?php echo $row['uAddr'] ?></td>
			</tr>

			<tr>
				<td>Mobile Number: </td>
				<td><?php echo $row['uCntc'] ?></td>
			</tr>

			<tr>
				<td>Email Address: </td>
				<td><?php echo $row['uEmail'] ?></td>
			</tr>

			<tr>
				<td>Password: </td>
				<td><?php echo $row['uPass'] ?></td>
			</tr>

			<tr>
				<td>Course: </td>
				<td><?php echo $row['uCrs'] ?></td>
			</tr>

			<tr>
				<td>Section: </td>
				<td><?php echo $row['uSctn'] ?></td>
			</tr>

			<tr>
				<td>School Year: </td>
				<td><?php echo $row['uYear'] ?></td>
			</tr>

			<tr>
				<td>Name of Guardian: </td>
				<td><?php echo $row['uGrdn'] ?></td>
			</tr>

			<tr>
				<td>Mobile Number: </td>
				<td><?php echo $row['uGcon'] ?></td>
			</tr>
		</table>
	</div>
	
	<input type="submit" value=" Change Password " id="edit">
	
</div>

</form>


</body>
</html>