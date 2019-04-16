<?php
	require 'config.php';

	$dsn = 'mysql:'.$dbname.';host='.$dbhost.';charset=UTF8';
	

	try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}