<!DOCTYPE html>
<html>
<head>
    <title>Mettre en vente un produit</title>
</head>
<body>

    <h1>Mettre un produit en vente</h1>
    <h1>MetY VE EE </h1>
    <a href="accueil.php">Retour à l'accueil</a>
    <br><br>


    <form action="traitement_vente.php" method="POST">
        <p>
            <p>Numéro (ID) du produit existant :</p>
            <input type="number" name="id_produit" required>
        </p>

        <p>
            <p>Prix de vente (€) :</p>
            <input type="number" step="0.01" name="prix_vente" required>
        </p>

        <p>
            <p>Quantité à vendre :</p>
            <input type="number" name="quantite_dispo" min="1" required>
        </p>
        <input type="hidden" name="id_membre" value="1">

        <input type="submit" value="Publier la vente">
    </form>

</body>
</html>