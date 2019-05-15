<?php

$login = $_POST['login'];
$mdp = $_POST['mdp'];
$user = 'root';
$passwd = '';
$dsn = 'mysql:host=localhost;dbname=inventaire';

try {
	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$request = "select login from Utilisateur";
	$pdoreq = $pdo -> query ($request);
	$pdoreq -> setFetchMode(PDO::FETCH_BOTH);

	foreach ($pdoreq as $ligne) {
		if ($ligne['login'] == $login) {
			$request2 = "select mdp from Utilisateur where login like '".$login."'";
			$pdoreq2 = $pdo -> query ($request2);
			$pdoreq2 -> setFetchMode(PDO::FETCH_BOTH);
			foreach ($pdoreq2 as $ligne) {
				if ($ligne['mdp'] == $mdp) {
					header('Location: /Projet_SI6/suiviInventaire.php');
					die();
				}
				else {
					header('Location: /Projet_SI6/connexion.html');
					die();
				}
			}
		}
	}
	header('Location: /Projet_SI6/connexion.html');
} catch(PDOexeption $event) {
        echo "Erreur : ".$e->getMessage()."<br/>";
        die();
}
?>
