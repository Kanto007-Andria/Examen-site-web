<?php
include("fonction.php");

// On récupère les infos du produit depuis l'URL
$id_produit = $_GET['id_produit'];
$nom_produit = $_GET['nom_produit'];

// On va chercher les membres qui ont acheté ce produit
$les_membres = obtenir_ventes_membres_par_produit($id_produit);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ventes par membre - <?php echo $nom_produit; ?></title>
</head>
<body>

    <p><a href="statistique.php"><- Retour aux statistiques</a></p>

    <h1>Acheteurs pour le produit : <?php echo $nom_produit; ?></h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nom du Membre</th>
                <th>Numéro ETU</th>
                <th>Quantité achetée</th>
                <th>Total dépensé</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($les_membres)) { ?>
                <tr>
                    <td colspan="4">Aucun achat enregistré pour ce produit.</td>
                </tr>
            <?php } else { ?>
                <?php foreach($les_membres as $m) { ?>
                    <tr>
                        <td><?php echo $m['nom_membre']; ?></td>
                        <td><?php echo $m['numero_etu']; ?></td>
                        <td><?php echo $m['quantite_totale']; ?></td>
                        <td><strong><?php echo $m['total_depense']; ?> €</strong></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>