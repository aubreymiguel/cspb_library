<?php 

	require "connection.php";
	if (isset($_POST['bCode'])) {

		$bCode = $_POST['bCode'];
		$bTitle = $_POST['bTitle'];
		$bAuthor = $_POST['bAuthor'];
		$bEdition = $_POST['bEdition'];
		$bNumDays = $_POST['bNumDays'];
		

		$sql = "INSERT INTO books_tb (bCode, bTitle, bAuthor, bEdition, bNumDays) VALUES ('$bCode', '$bTitle', '$bAuthor', '$bEdition', '$bNumDays')";

		if ($conn->query($sql) === TRUE) {
			$dis = "<div style='background-color: rgba(255, 255, 255, 0.8);
						box-shadow: 0 0 9px black; 
						margin: auto;
						color: black;
						border-radius: 15px 15px 15px 15px;
						max-width: 600px;
						padding: 1%;
						margin-bottom: 4%'>
						Added Successfully ! ... Go back to <a href='lib_book.php.php' style='color: black; font-style: italic'>Books</a>.</div>";

		} else {
			
			echo '<script type="text/javascript"> window.location="lib_book.php"; </script>';
			
		}

		
	}

	include "add1.php";

?>

<!DOCTYPE html>
<html>
<body>

	<strong><?php echo "$dis"; $conn->close();?></strong>

</body>
</html>
