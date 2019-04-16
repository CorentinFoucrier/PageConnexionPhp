<?php

	session_start();

	require 'connect.php';
	require 'db.php';

	$username = $_SESSION['username'];

	echo "My name is ".substr($username, 3).", ".substr($username, 0, 3)."-".substr($username, 3);
	/* SELECTION DANS TABLE USERS */
	$sql = 'SELECT * FROM users';
	$statement = $pdo->query($sql);
	$users = $statement->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>profil</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body>
		<h2>Liste des utilisateurs :</h2>
		<!-- boucle sur $users -->
		<?php foreach ($users as $user): ?>
		<ul>
			<li>- <?= $user['username'] ?> mdp : <?= $user['password'] ?></li>
		</ul>
		<?php endforeach; ?>
		<!-- fin boucle -->
		<br />
		<a href="http://github.local/PageConnexionPhp/page.php"><button>Acceuil</button></a>
		<a href="http://github.local/PageConnexionPhp/beer.php"><button>Bières</button></a>
		<a href="http://github.local/PageConnexionPhp/profile.php?deconnect=true"><button>Déconnexion</button></a>
	</body>
</html>
