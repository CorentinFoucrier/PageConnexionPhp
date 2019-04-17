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
	</head>
	<body>
		<h2>Liste des utilisateurs :</h2>
		<section>
			<!-- boucle sur le tableau users -->
			<?php foreach ($users as $user): ?>
				<article>
					<form action="update.php" method="POST">
						<input type="text" name="username" value="<?= $user["name"] ?>">
						<input type="text" name="password" placeholder="modif mdp">
						<input type="hidden" name="id" value="<?= $user["id"]?>">
						<button type="submit">Modifier</button>
					</form>
				</article> 
			<?php endforeach; ?>
			<!-- fin boucle -->
		</section>
		<br />
		<a href="page.php"><button>Acceuil</button></a>
		<a href="beer.php"><button>Bières</button></a>
		<a href="profile.php?deconnect=true"><button>Déconnexion</button></a>
	</body>
</html>
