<?php
    include("fonction.php");
    

    $OLONA = $_GET['etu'] ?? $_GET['utilisateur'] ?? $_POST['etu'] ?? $_POST['utilisateur'] ?? ''; 
    
    $valiny = voir_les_produits_a_vendre($OLONA);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Vente Flash</title>
</head>
<body>

    <h1>Liste des produits a vendre</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Vendeur</th>
                <th>Nom Produit</th>
                <th>ID Offre</th>
                <th>Prix</th>
                <th>Quantité disponible</th>
                <th>Date dispo</th>
                <th>Action</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($valiny as $produit) { ?>
                <tr>
                    <td><?php echo ($produit['nom_vendeur']); ?></td>
                    <td><?php echo ($produit['nom_produit']); ?></td>
                    <td> <?php echo $produit['id_produit_membre']; ?></td>
                    <td><strong><?php echo $produit['prix_vente']; ?> €</strong></td>
                    <td><?php echo $produit['quantite_dispo']; ?></td>
                    <td><?php echo $produit['date_dispo'] ? $produit['date_dispo'] : 'Non définie'; ?></td>
                    
                    <td>
                        <form action="traitement_achat_produit.php" method="POST">
                            <input type="hidden" name="id_produit_membre" value="<?php echo $produit['id_produit_membre']; ?>">
                            
                            <label>Qte :</label>
                            <input type="number" name="quantite" value="1" min="1" max="<?php echo $produit['quantite_dispo']; ?>" style="width: 50px;">
                            
                            <input type="submit" value="Acheter">
                        </form>
                        </td>
                        <td><img src="IMAGE/<?php echo $produit['photo']; ?>" alt="Photo produit" width="50"></td>
                        
                </tr>
            <?php } ?>
        </tbody>
    </table>
      
   
                
        <form action="vente.php" method="POST">
                            <input type="hidden" name="utilisateur" value="<?php echo $OLONA; ?>">
                            <input type="submit" value="Mes vente">
                        </form>     
    
                        <form action="vendre.php" method="POST">
                            <input type="hidden" name="utilisateur" value="<?php echo $OLONA; ?>">
                            <input type="submit" value="Vendre">
                        </form>
                    
                        <a href="statistique.php">Voir les statistiques par catégorie</a>
</body>
</html>