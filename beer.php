<?php

	session_start();

	require 'connect.php';
	require 'db.php';

	$sql = 'SELECT * FROM biere';
	$statement = $pdo->query($sql);
	$tableBeer = $statement->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Bières</title>
		<meta charset="utf-8">
	</head>
	<body>
		<a href="page.php"><button>Acceuil</button></a>
		<a href="profile.php"><button>Profil</button></a>
		<a href="page.php?deconnect=true"><button>Déconnexion</button></a>
		<br />
		
		<section>
			<!-- boucle sur tab beer -->
			<?php foreach ($tableBeer as $row): ?>
			<article>
				<h2><?= $row['nom'] ?></h2>
				<p><?= $row['description'] ?></p>
				<form method="post" action="deletebeer.php">
					<input type="hidden" name="id" value="<?= $row['id'] ?>">
					<button type="submit">[X] <?= $row['nom'] ?></button>
				</form>
				
			</article>
			<?php endforeach; ?>
			<!-- fin boucle -->
		</section>
	</body>
</html>
