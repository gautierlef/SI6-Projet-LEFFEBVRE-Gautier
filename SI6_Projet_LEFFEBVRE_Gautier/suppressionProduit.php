<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <link href="design.css" media="all" rel="stylesheet" type="text/css"/>
        <title>Suppression produit</title>
</head>

<body>
	<div width="100%"><center><table border='1px'><tr>
	<td><a href="suiviInventaire.php"> Accueil </a></td>
    <td><a href="listeProduit.php"> Liste produits/catégories </a></td>
    <td><a href="ajoutProduit.php"> Ajout d'un produit </a></td>
    <td><a href="ajoutCategorie.php"> Ajout d'une catégorie </a></td>
    <td><a href="suppressionProduit.php"> Suppression d'un produit</a></td></tr></table></center></div>
    <center><h2>Suppression d'un produit</h2></center>
    <label for="idProduit"></label>
    <center><form name="produit" method="POST" action="supprimerProduit.php">
    	<select id="idProduit" name="idProduit">
<?php

$user = 'root';
$passwd = '';
$dsn =  'mysql:host=localhost;dbname=inventaire';

try {
	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$request = "select * from Produit";
    $pdoreq = $pdo -> query ($request);
    $pdoreq -> setFetchMode(PDO::FETCH_BOTH);
    foreach ($pdoreq as $ligne) {
        echo "			<option value=".$ligne['idProduit'].">".$ligne['nomPrd']."</option>\n";
    }
} catch(PDOexeption $event) {
        echo "Erreur : ".$e->getMessage()."<br/>";
        die();
}
?>
    	</select>
    	<br/><br/>
		<input value="Supprimer produit" type="SUBMIT"/>
    </form>
</body>
</html>