<?php

	session_start();

	require_once 'db.php';

	$sql = "SELECT * FROM users";
	$statement = $pdo->query($sql);
	$users = $statement->fetchAll();

	foreach ($users as $user) {
		$passwordhash = password_hash($user["password"], PASSWORD_BCRYPT);
		require_once 'db.php';
		$sql = "UPDATE `users` SET `password` = :password WHERE `users`.`id` = :id";
		$stat = $pdo->prepare($sql);
		$stat->execute([
			":password"	=>	$passwordhash,
			":id"		=>  $user['id']
		]);
	}