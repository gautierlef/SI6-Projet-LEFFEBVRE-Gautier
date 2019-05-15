<?php

$user = 'root';
$passwd = '';
$dsn =  'mysql:host=localhost;dbname=inventaire';

try {
        $idCat = $_POST['idCategorie'];
        $libelle = $_POST['libelle'];

        $pdo = new PDO($dsn, $user, $passwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Categorie VALUES ('$idCat', '$libelle')";
        $sql = $pdo->query($sql);
        echo "<!DOCTYPE html>
<html>
<head>
        <meta charset=\"UTF-8\">
        <link href=\"design.css\" media=\"all\" rel=\"stylesheet\" type=\"text/css\"/>
        <title>Produit supprimé</title>
</head>
<body>
        <center><p>Produit supprimé</p><a href=\"ajoutCategorie.php\"> Retour </a></center>
</body>";
} catch(PDOexeption $event) {
        echo "Erreur : ".$e->getMessage()."<br/>";
        die();
}
?>