<?php
	session_start();

	require 'connect.php';
	require 'db.php';

	if (!empty($_POST)) {
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];
		$id = $_POST['id'];

		if (!empty($id)) {

			if (!empty($username)) {
				require_once 'db.php';
				$sql = 'SELECT * FROM users WHERE name= ?';
				$statement = $pdo->prepare($sql);
				$statement->execute([$username]);
				$user = $statement->fetch();

				if (!$user) {
					if (!empty($password)) {
						if (strlen($password) <= 10 && strlen($password) >= 5) {
							$password = password_hash($password, PASSWORD_BCRYPT);
							require_once 'db.php';
							$sql = "UPDATE `users` SET `name` = :name, `password` = :password WHERE `users`.`id` = :id";
							$statement = $pdo->prepare($sql);
							$result = $statement->execute([
								":name"		=>	$username,
								":password"	=>  $password,
								":id"		=>	$id
							]);

						}else{
							die('mdp pas bon format');
						}
					}else{
						/* modif seulement de name si password est vide */
						require_once 'db.php';
						$sql = "UPDATE `users` SET `name` = :name WHERE `users`.`id` = :id";
						$statement = $pdo->prepare($sql);
						$result = $statement->execute([
							":name" => $username,
							":id" => $id
						]);
					}
				}else{
					if(!empty($password)){
						if(strlen($password) <= 10 && strlen($password) >= 5){
							$password = password_hash($password, PASSWORD_BCRYPT);
							require_once 'db.php';
							$sql = "UPDATE `users` SET `name` = :name, `password` = :password WHERE `users`.`id` = :id";
							$statement = $pdo->prepare($sql);
							$result = $statement->execute([
								":name"		=>	$username,
								":password"	=>  $password,
								":id"		=>	$id
							]);
						}
					}else{
						die("username existe déjà");
						// TODO cree erreur
					}
				}
			}
		}
	}