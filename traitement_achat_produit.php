<?php
include("fonction.php");
$id_produit_membre = $_POST['id_produit_membre'];
$quantite_achetee = $_POST['quantite'];
$nety = acheter($id_produit_membre, $quantite_achetee);
if ($nety) {
    header("Location: accueil.php");
    exit();
} else {
    $db = dbconnect();
    echo "Erreur lors de l'achat : " . mysqli_error($link);
}
?>