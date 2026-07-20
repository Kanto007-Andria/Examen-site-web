<?php
    include("fonction.php");
    $OLONA = $_GET['etu'];
    $valiny = voir_les_produits_a_vendre();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Vente Flash</title>
</head>
<body>

    <h1>Liste des produits à vendre</h1>


    <table border="1">
        <thead>
            <tr>
                <th>Numéro Produit</th>
                <th>Prix</th>
                <th>Quantité disponible</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($valiny as $produit) { ?>
                <tr>

                     <td>Produit n°<?php echo $produit['id_produit']; ?></td>
                    

                    <td><strong><?php echo $produit['prix_vente']; ?> €</strong></td>
                    

                    <td><?php echo $produit['quantite_dispo']; ?></td>
                    

                    <td>
<<<<<<< HEAD
                        <form action="traitement_vente.php" method="POST" style="margin: 0;">
=======
                        <form action="traitement_vendre.php" method="POST" style="margin: 0;">
>>>>>>> c233bd89e783a3d4236ebd5328f2d0e2eb1a3753
                            <input type="hidden" name="id_produit_membre" value="<?php echo $produit['id_produit_membre']; ?>">
                            
                            <label>Qté :</label>
                            <input type="number" name="quantite" value="1" min="1" max="<?php echo $produit['quantite_dispo']; ?>" style="width: 50px;">
                            
                            <input type="submit" value="Acheter">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>