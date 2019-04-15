<?php
	session_start();
	if (empty($_SESSION)) {
		header("Location: http://github/PageConnexionPhp/index.php");
	}
	
	echo "super site <br />";
	echo "Bonjour julien !";
?>