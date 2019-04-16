<?php

	session_start();

	require 'connect.php';
	require 'db.php';

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = 'DELETE FROM biere WHERE id = ?';
		$statement = $pdo->prepare($sql);
		$statement->execute([$id]);
	}

	header('Location: http://github.local/PageConnexionPhp/beer.php');
	exit;
	
?>