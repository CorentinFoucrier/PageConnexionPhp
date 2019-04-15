<?php 
	session_start();

	if (isset($_SESSION['connect'])) {
		header("Location: http://github.local/PageConnexionPhp/page.php");
		exit;
	}

	$errUsername = "";
	$errPassword = "";
	$errPasswordConfirmed = "";

	if(!empty($_POST)){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$passwordConfirmed = $_POST['passwordConfirmed'];

		if (!empty($username) && !empty($password) && !empty($passwordConfirmed)) {
			if ($password === $passwordConfirmed) {
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['connect'] = true;
				header("Location: http://github.local/PageConnexionPhp/page.php");
				exit;
			}else{
				if (empty($username)) {
					$errUsername = "class=\"danger\"";
				}
				if (empty($password)) {
					$errPassword = "class=\"danger\"";
				}
				if (empty($passwordConfirmed)) {
					$errPassword = "class=\"danger\"";
				}
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
						<h2>Inscription</h2>
					</header>
					<form action="" method="Post">
						<input <?php echo $errUsername ?> type="text" name="username" placeholder="Nom d'utilisateur" required="required" />
						<input <?php echo $errPassword ?> type="password" name="password" placeholder="Mot de passe" required="required" />
						<input <?php echo $errPasswordConfirmed ?> type="password" name="PasswordConfirmed" placeholder="Retapez votre mot de passe" required="required" />
						<button type="submit">S'inscrir</button>
					</form>
				</div>
			</section>
		</div>
	</body>
</html>