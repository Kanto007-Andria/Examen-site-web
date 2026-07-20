<?php
    include("fonction.php");
    $OLONA = isset($_GET['etu']) ? $_GET['etu'] : ''; 
    $montant_total = obtenir_total_ventes_membre($OLONA);
    $les_ventes = liste_toutes_les_ventes();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Ventes</title>
</head>
<body>
    <p><a href="accueil.php">← Retour à l'accueil</a></p>

    <h1>Suivi des Ventes</h1>

    <p>
        Montant total de vos ventes (Étudiant<?php echo ($OLONA); ?>) 
        <?php echo number_format($montant_total, 2); ?>€
</p>

    <h2>Historique global des ventes</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID Vente</th>
                <th>Date / Heure</th>
                <th>Vendeur</th>
                <th>Produit</th>
                <th>Prix Unitaire</th>
                <th>Quantité vendue</th>
                <th>Total ligne</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($les_ventes as $v) { ?>
                <tr>
                    <td>N° <?php echo $v['id_vente']; ?></td>
                    <td><?php echo $v['date']; ?> à <?php echo $v['heure']; ?></td>
                    <td><?php echo htmlspecialchars($v['nom_vendeur']); ?></td>
                    <td><?php echo htmlspecialchars($v['nom_produit']); ?></td>
                    <td><?php echo $v['prix_vente']; ?> €</td>
                    <td><?php echo $v['quantite']; ?></td>
                    <td><strong><?php echo $v['quantite'] * $v['prix_vente']; ?> €</strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>