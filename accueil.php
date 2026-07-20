<?php
    include("fonction.php");
    $valiny = voir_les_produits_a_vendre();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Vente Flash</title>
</head>
<body>

    <h1>Liste des produits à vendre</h1>

    <?php foreach($valiny as $produit) { ?>
        
        <div>
            <h3>Produit n°<?php echo $produit['id_produit']; ?></h3>
            <p>Prix : <?php echo $produit['prix_vente']; ?> €</p>
            <p>Quantité disponible : <?php echo $produit['quantite_dispo']; ?></p>
            
            <form action="traitement_achat.php" method="POST">
                <input type="hidden" name="id_produit_membre" value="<?php echo $produit['id_produit_membre']; ?>">
                
                <p>Quantité :</p>
                <input type="number" name="quantite" value="1" min="1">
                
                <input type="submit" value="Acheter">
            </form>
        </div>        
        <hr>
        
    <?php } ?>

</body>
</html>