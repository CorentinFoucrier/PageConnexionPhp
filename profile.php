<?php

	session_start();

	require 'connect.php';

	$username = $_SESSION['username'];

	echo "My name is ".substr($username, 3).", ".substr($username, 0, 3)."-".substr($username, 3);

?>

<br />
<a href="http://github.local/PageConnexionPhp/beer.php"><button>Bières</button></a>
<a href="http://github.local/PageConnexionPhp/profile.php?deconnect=true"><button>Déconnexion</button></a>