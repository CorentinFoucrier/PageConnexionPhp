<?php

	session_start();
	if (isset($_GET['deconnect']) && $_GET['deconnect']) {
		session_unset();
		header("Location: http://github.local/PageConnexionPhp/index.php");
		exit;
	}
	if (!isset($_SESSION['connect'])) {
		header("HTTP/1.0 403 Forbidden");
		header("Location: http://github.local/PageConnexionPhp/page.php");
		exit;
	}
	$username = $_SESSION['username'];

	echo "My name is ".substr($username, 3).", ".substr($username, 0, 3)."-".substr($username, 3);

?>

<br />
<a href="http://github.local/PageConnexionPhp/profile.php?deconnect=true"><button>Deconnexion</button></a>