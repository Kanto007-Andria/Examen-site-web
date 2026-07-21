<?php
include('fonction.php');
    $id_produit = $_POST['id_produit'];

    $PERSONNE = $_POST['utilisateur'];
    $date=$_POST['date'];
    $quantite=$_POST['quantite'];
    $prix=$_POST['prix'];
   

    $valiny =recuper_produit_non_vendu($PERSONNE);
    $id_membre=recuperer_id($PERSONNE);
   $vendre=mivarotra($id_produit, $id_membre, $prix, $quantite, $date);
    
?>