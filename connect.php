<?php
	if (isset($_GET['deconnect']) && $_GET['deconnect']) {
		session_unset();
		header("Location: http://github.local/PageConnexionPhp/index.php");
		exit;
	}

	if (!isset($_SESSION['username'])) {
		header("Location: http://github.local/PageConnexionPhp/index.php");
		exit;
	}