<?php
	
	session_start();
	require "connection.php";

	if (!isset($_SESSION['sesuType'])) {

			echo '<script type="text/javascript"> window.location="index.php";</script>';
		}
		
	if (isset($_POST['uPass'])) {
		
		$uPass = $_POST['uPass'];
		$nPass = $_POST['nPass'];

		$uID = $_SESSION['sesuID'];

		if ($uPass == $nPass) {
		

		$sql = "UPDATE users_tb SET uPass='$uPass' WHERE uID='$uID'";

		if ($conn->query($sql) === TRUE) {

			$dis = "<div style='background-color: rgba(255, 255, 255, 0.8);
						box-shadow: 0 0 9px black; 
						margin: auto;
						color: black;
						border-radius: 15px 15px 15px 15px;
						max-width: 600px;
						padding: 1%;
						margin-bottom: 4%'>
						Password Changed ... Go to <a href='index.php' style='color: black; font-style: italic'>Login Page</a>.</div>";

		} else {
			
			$warn = "<div style='background-color: rgb(255, 107, 107);
						box-shadow: 0 0 9px black; 
						margin: auto;
						color: black;
						border-radius: 15px 15px 15px 15px;
						max-width: 600px;
						padding: 1%;
						margin-bottom: 4%'>
						New Password and Confirm Password didn't matched ... </div>";
			
		}

		
	}
}

	include "update1.php";

?>

<!DOCTYPE html>
<html>
<body>

	<

	<strong>

		<?php

			if ($uPass == $nPass) {

				echo "$dis";

			} else { 
				echo "$warn";

			}

		?>
			

	</strong>

</body>
</html>
