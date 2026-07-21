<?php
include("fonction.php");

// Récupération des statistiques
$les_stats = obtenir_ventes_par_categorie();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Statistiques des Ventes</title>
</head>
<body>

    <p><a href="accueil.php"><- Retour à l'accueil</a></p>

    <h1>Chiffre d'affaires par Catégorie</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Catégorie (Cliquer pour voir les produits)</th>
                <th>Total des Ventes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($les_stats as $stat) { ?>
                <tr>
                    <td>
                        <a href="ventes_produits.php?categorie=<?php echo $stat['nom_categorie']; ?>">
                            <?php echo $stat['nom_categorie']; ?>
                        </a>
                    </td>
                    <td><strong><?php echo $stat['total_ventes']; ?> €</strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>