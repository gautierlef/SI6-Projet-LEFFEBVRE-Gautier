<?php

$user = 'root';
$passwd = '';
$dsn =  'mysql:host=localhost;dbname=inventaire';

try {
        $idPrd = $_POST['idProduit'];
        $nomPrd = $_POST['nomProduit'];
        $quantite = $_POST['quantite'];
        $prixPrd = $_POST['pu'];
        $categorie = $_POST['idCategorie'];

        $pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Produit VALUES ('$idPrd', '$nomPrd', '$quantite', '$prixPrd', '$categorie')";
        $sql = $pdo->query($sql);
        echo "<!DOCTYPE html>
<html>
<head>
        <meta charset=\"UTF-8\">
        <link href=\"design.css\" media=\"all\" rel=\"stylesheet\" type=\"text/css\"/>
        <title>Produit supprimé</title>
</head>
<body>
        <center><p>Produit supprimé</p><a href=\"ajoutProduit.php\"> Retour </a></center>
</body>";
} catch(PDOexeption $event) {
        echo "Erreur : ".$e->getMessage()."<br/>";
        die();
}
?>
