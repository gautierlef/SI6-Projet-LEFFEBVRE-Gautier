<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <link href="design.css" media="all" rel="stylesheet" type="text/css"/>
        <title>Ajout d'un produit</title>
</head>

<body>
        <div width="100%"><center><table border='1px'><tr>
        <td><a href="suiviInventaire.php"> Accueil </a></td>
        <td><a href="listeProduit.php"> Liste produits/catégories </a></td>
        <td><a href="ajoutProduit.php"> Ajout d'un produit </a></td>
        <td><a href="ajoutCategorie.php"> Ajout d'une catégorie </a></td>
        <td><a href="suppressionProduit.php"> Suppression d'un produit</a></td></tr></table></center></div>
	<center><h2>Ajout d'un produit</h2>
                <form name="produit" method="POST" action="ajouterProduit.php">
                <label for="idProduit">ID Produit :</label> 
                <input type="NUMBER" name="idProduit" min="1"/>
                <br/><br/>
                <label for="nomProduit">Nom Produit :</label> 
                <input type="TEXT" name="nomProduit"/>
                <br/><br/>
                <label for="quantite">Quantité :</label> 
                <input type="NUMBER" name="quantite"/>
                <br/><br/>
                <label for="pu">Prix Produit :</label> 
                <input type="NUMBER" name="pu"/>
                <br/><br/>
                <label for="idCategorie">Choisir catégorie</label>
                <select id="idCategorie" name="idCategorie">
<?php

$user = 'root';
$passwd = '';
$dsn =  'mysql:host=localhost;dbname=inventaire';

try {
        $pdo = new PDO($dsn, $user, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $request = "select * from Categorie";
        $pdoreq = $pdo -> query ($request);
        $pdoreq -> setFetchMode(PDO::FETCH_BOTH);
        foreach ($pdoreq as $ligne) {
                echo "                  <option value=".$ligne['idCategorie'].">".$ligne['libelle']."</option>\n";
        }
} catch(PDOexeption $event) {
        echo "Erreur : ".$e->getMessage()."<br/>";
        die();
}
?>
<!--                <label for="categorie">Catégorie : </label>
                <input type="NUMBER" name="categorie"/>-->
                </select>
                <br/><br/>
		<input value="Ajouter produit" type="SUBMIT"/>
        </form>
</body>
</html>
