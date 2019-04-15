<?php

	session_start();
	if (!isset($_SESSION['connect'])) {
		header("Location: http://github.local/PageConnexionPhp/page.php");
	}
	$username = $_SESSION['username'];

	echo "My name is {$username}";

?>