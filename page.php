<?php
	session_start();

	require('connect.php');

	$username = $_SESSION['username'];
	
	echo "super site <br />";
	echo "Bonjour {$username} !";
?>
<br />
<a href="http://github.local/PageConnexionPhp/profile.php"><button>Profil</button></a>
<a href="http://github.local/PageConnexionPhp/page.php?deconnect=true"><button>Deconnexion</button></a>