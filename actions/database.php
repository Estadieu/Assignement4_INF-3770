<?php
//Connexion au serveur MySQL
try {
	$bdd = new PDO("mysql:host=localhost;dbname=cabinet", 'root', '');
}catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
?>