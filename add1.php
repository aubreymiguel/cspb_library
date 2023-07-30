<?php 
	
	session_start();
	require "connection.php";


			$dis = "<div style='background-color: rgba(255, 255, 255, 0.8);
						box-shadow: 0 0 9px black; 
						margin: auto;
						color: black;
						border-radius: 15px 15px 15px 15px;
						max-width: 600px;
						padding: 1%;
						margin-bottom: 4%'>
						Added Succesefully ! ... Go back to <a href='lib_book.php' style='color: black; font-style: italic'>Books</a>.</div>";


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
	<br><br><br>

<form action="add2.php" method="POST">

	<div class="ad_content5">
		<h1>Add New Books</h1><br>
		<hr><br>
		<div align="center">

			<table width="900px" align="center">
				<tr>
					<td width="150px">Code:</td>
					<td width="200px"><input type="text" name="bCode" required></td>
				
					<td width="150px">Title:</td>
					<td width="200px"><input type="text" name="bTitle" required></td>
				</tr>
				<tr>
					<td>Author:</td>
					<td><input type="text" name="bAuthor" required></td>
				
					<td>Edition:</td>
					<td><input type="text" name="bEdition" required></td>
				</tr>
				<tr>
					<td>Issue Days</td>
					<td><input type="text" name="bNumDays" required></td>
				</tr>
			</table>
		</div>
		<input type="submit" name="add" value="     Add Now     " id="add_now"><br>

	</div>

</form>
</body>
</html>