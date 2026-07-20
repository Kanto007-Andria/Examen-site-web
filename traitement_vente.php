<?php
include("fonction.php");


$id_produit = $_POST['id_produit'];
$prix_vente = $_POST['prix_vente'];
$quantite_dispo = $_POST['quantite_dispo'];
$id_membre = $_POST['id_membre'];

$tafiditra = ampidirina_ny_entana_amidik($id_produit, $id_membre, $prix_vente, $quantite_dispo);
if ($tafiditra) {
    header("Location: accueil.php");
} else {
    $db = dbconnect();
    echo "Erreur lors de la mise en vente : " . mysqli_error($db);
}
?>