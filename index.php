<?php 
	session_start();
	/* Si on est déjà connecter on redirige vers page.php */
	if (isset($_SESSION['username'])) { // Rappel : $_SESSION['username'] est setup uniquement à la connection/inscription par php.
		header("Location: page.php");
		exit;
	}
	/*
		Définition des variable pour contrer l'erreur
		undefined en cas d'utilisation du debugeur "xdebug".
	*/
	$errUsername = "";
	$errPassword = "";
	$errUsernamePwd = false;
	/* Vérif que le formulaire ($_POST) n'est pas vide */
	if(!empty($_POST)){
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];
		/* verif que les champs ne sont pas vides */
		if (!empty($username) && !empty($password)) {
			/* récupération de l'utilisateur */
			require_once 'db.php';
			$sql = 'SELECT * FROM users WHERE name = ?';
			$statement = $pdo->prepare($sql);
			$statement->execute([$username]);
			$user = $statement->fetch();
			/* Si $user est true alors on verif que le mdp est pareil qu'en BDD */
			if ($user) {
				
				if (password_verify($password, $user["password"])){
					
					$_SESSION["connect"] = true;
					$_SESSION["username"] = $username;
					header("Location: page.php");
				}else{
					$errUsernamePwd = true; // se reporter à </body>
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
		<link rel="stylesheet" type="text/css" href="assets/css/form.css">
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
		<!-- Si $errUsernamePwd est à true (erreur) alors execute le script js -->
		<?php if ($errUsernamePwd === true): ?>
			<script src="assets/js/errorAlert.js"></script>
		<?php endif; ?>
	</body>
</html>