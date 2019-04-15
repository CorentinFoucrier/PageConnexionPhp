<?php
	session_start();
	if (isset($_GET['deconnect']) && $_GET['deconnect']) {
		session_unset();
		header("Location: http://github.local/PageConnexionPhp/index.php");
		exit;
	}
	$connect = $_SESSION['username'];
	if (empty($_SESSION)) {
		header("HTTP/1.0 403 Forbidden");
		header("Location: http://github.local/PageConnexionPhp/index.php");
		exit;
	}
	$username = $_SESSION['username'];
	
	echo "super site <br />";
	echo "Bonjour {$username} !"
?>
<br />
<a href="http://github.local/PageConnexionPhp/profile.php"><button>Profil</button></a>
<a href="http://github.local/PageConnexionPhp/page.php?deconnect=true"><button>Deconnexion</button></a>