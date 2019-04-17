<?php
	session_start();

	require 'connect.php';

	$username = $_SESSION['username'];
	
	echo "super site <br />";
	echo "Bonjour {$username} !";
?>
<br />
<a href="profile.php"><button>Profil</button></a>
<a href="beer.php"><button>Bières</button></a>
<a href="page.php?deconnect=true"><button>Déconnexion</button></a>