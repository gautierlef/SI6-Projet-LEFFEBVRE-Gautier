<?php
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <link href="design.css" media="all" rel="stylesheet" type="text/css"/>
        <title>Ajout d'une catégorie</title>
</head>

<body>
        <div width="100%"><center><table border='1px'><tr>
        <td><a href="suiviInventaire.php"> Accueil </a></td>
        <td><a href="listeProduit.php"> Liste produits/catégories </a></td>
        <td><a href="ajoutProduit.php"> Ajout d'un produit </a></td>
        <td><a href="ajoutCategorie.php"> Ajout d'une catégorie </a></td>
        <td><a href="suppressionProduit.php"> Suppression d'un produit</a></td></tr></table></center></div>
	<center><h2>Ajout d'une catégorie</h2>
                <form name="categorie" method="POST" action="ajoutCategorie.php">
                <label for="idCategorie">ID Catégorie :</label> 
                <input type="NUMBER" name="idCategorie" min="1"/>
                <br/><br/>
                <label for="libelle">Libelle Catégorie :</label> 
                <input type="TEXT" name="libelle"/>
                <br/><br/>
		<input value="Ajouter Catégorie" type="SUBMIT"/>
        </form>
</body>
</html>