<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <link href="design.css" media="all" rel="stylesheet" type="text/css"/>
        <title>Liste produit/catégorie</title>
</head>

<body>
        <div width="100%"><center><table border='1px'><tr>
        <td><a href="suiviInventaire.php"> Accueil </a></td>
        <td><a href="listeProduit.php"> Liste produits/catégories </a></td>
        <td><a href="ajoutProduit.php"> Ajout d'un produit </a></td>
        <td><a href="ajoutCategorie.php"> Ajout d'une catégorie </a></td>
        <td><a href="suppressionProduit.php"> Suppression d'un produit</a></td></tr></table></center></div>
        <center>
        <h2>Liste des produits et catégories</h2>
        </center>
<?php

$user = 'root';
$passwd = '';
$dsn =  'mysql:host=localhost;dbname=inventaire';

try {
	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$request = "select * from Produit p inner join Categorie c on p.idCategorie = c.idCategorie order by p.idCategorie";
        $pdoreq = $pdo -> query ($request);
        $pdoreq -> setFetchMode(PDO::FETCH_BOTH);
        echo "<center><table border='1px'><tr><th>ID</th><th>Nom</th><th>Quantité</th><th>Prix</th><th>Categorie</th></tr>";
        foreach ($pdoreq as $ligne) {
                echo "<tr><td>".$ligne['idProduit']."</td><td>".$ligne['nomPrd']."</td><td>".$ligne['quantitePrd']."</td><td>".$ligne['prixPrd']."€</td><td>".$ligne['libelle']."</td></tr>";
	}
        echo "</table></center>";
} catch(PDOexeption $event) {
        echo "Erreur : ".$e->getMessage()."<br/>";
        die();
}
?>
</body>
</html>