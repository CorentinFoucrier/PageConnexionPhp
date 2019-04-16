<?php

	session_start();

	require 'connect.php';
	require 'db.php';

	$sql = 'DELETE FROM biere WHERE id=1';
	$nb = $pdo->exec($sql);
	echo $nb;
?>