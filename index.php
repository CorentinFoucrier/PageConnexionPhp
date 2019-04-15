<?php 
	session_start();
	/* Si on est déjà connecter on redirige vers page.php */
	if (isset($_SESSION['username'])) {
		header("Location: http://github.local/PageConnexionPhp/page.php");
		exit;
	}

	$errUsername = "";
	$errPassword = "";
	$errUsernamePwd = false;

	if(!empty($_POST)){
		$stock = require 'stock.php';
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (!empty($username) && !empty($password)) {
			if (isset($stock[$username])) {
				if ($password === $stock[$username]) {
					session_start();
					$_SESSION['username'] = $username;
					header("Location: http://github.local/PageConnexionPhp/page.php");
					exit;
				}else{
					$errUsernamePwd = true;
				}
			}else{
				$errUsernamePwd = true;
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
		<?php if ($errUsernamePwd === true): ?>
			<script src="assets/js/errorAlert.js"></script>
		<?php endif; ?>
	</body>
</html>