<?php 
	
	session_start();


	if ($_SESSION['sesuType'] == "1") {
		echo '<script type="text/javascript"> window.location="home.php";</script>';
	}

	if ($_SESSION['sesuType'] == "2") {
		echo '<script type="text/javascript"> window.location="lib_home.php";</script>';
	}

	if ($_SESSION['sesuType'] == "3") {
	    echo '<script type="text/javascript"> window.location="ad_home.php";</script>';
	}


?>