<?php 
	session_start();
	

	if (isset($_SESSION['connect'])) {
		header("Location: http://github.local/PageConnexionPhp/page.php");
	}

	$errUsername = "";
	$errPassword = "";

	if(!empty($_POST)){
		$stock = ["julien" => "123456", "kevin" => "azerty"];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (!empty($username) && !empty($password)) {
			/* TODO : verifier couple user / mdp */
			if (isset($stock[$username])) {
				if ($password === $stock[$username]) {
					header("Location: http://github.local/PageConnexionPhp/page.php");
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['connect'] = true;
				}else{
					header("HTTP/1.0 403 Forbidden");

					/* TODO : USERNAME ou MDP pas bon */
				}
			}else{
				header("HTTP/1.0 403 Forbidden");
				/* TODO : USERNAME ou MDP pas bon */
			}
		}else{
			if (empty($username)) {
				$errUsername = "class=\"danger\"";
			}
			if (empty($password)) {
				$errPassword = "class=\"danger\"";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>formulaire de connexion</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="wrapper">
		<section class="login-container">
			<div>
				<header>
					<h2>Identification</h2>
				</header>
				<form action="" method="Post">
					<input <?php echo $errUsername ?> type="text" name="username" placeholder="Nom d'utilisateur" required="required" />
					<input <?php echo $errPassword ?> type="password" name="password" placeholder="Mot de passe" required="required" />
					<button type="submit">Connexion</button>
				</form>
			</div>
		</section>
	</div>
</body>
</html>