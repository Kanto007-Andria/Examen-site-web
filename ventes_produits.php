<?php
include("fonction.php");

// On récupère le nom de la catégorie cliquée depuis l'URL
$nom_cat = $_GET['categorie'];

// On va chercher les produits vendus dans cette catégorie
$les_produits = obtenir_ventes_produits_par_categorie($nom_cat);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Produits de la catégorie <?php echo $nom_cat; ?></title>
</head>
<body>

    <p><a href="statistique.php"><- Retour aux catégories</a></p>

    <h1>Détail des ventes pour la catégorie : <?php echo $nom_cat; ?></h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Produit (Cliquer pour voir les acheteurs)</th>
                <th>Total des Ventes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($les_produits as $p) { ?>
                <tr>
                    <td>
                        <a href="ventes_membres.php?id_produit=<?php echo $p['id_produit']; ?>&nom_produit=<?php echo $p['nom_produit']; ?>">
                            <?php echo $p['nom_produit']; ?>
                        </a>
                    </td>
                    <td><strong><?php echo $p['total_produit']; ?> €</strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>