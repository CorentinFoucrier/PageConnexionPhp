<?php

require_once 'db.php';
$sql = "SELECT * FROM users";
$statement = $pdo->query($sql);
$users = $statement->fetchAll();
//var_dump($users);
$bdd =  password_hash("julien", PASSWORD_BCRYPT);
echo $bdd;
echo '<br />';
$password = "julien";
echo $password;
echo '<br />';echo '<br />';echo '<br />';
foreach ($users as $user) {
	$passwordhash = password_hash($user["password"], PASSWORD_BCRYPT);
	require_once 'db.php';
	$sql = "UPDATE `users` SET `password` = :password WHERE `users`.`id` = :id";
	$stat = $pdo->prepare($sql);
	echo $stat->execute([
						":password"		=>	$passwordhash,
						":id"	=>  $user['id']
						]);
	//bdd -> julien -> users -> $user[id] 
	echo '<br />';
}