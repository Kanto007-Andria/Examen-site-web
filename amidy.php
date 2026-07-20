<?php
include('fonction.php');
    $id_produit = $_POST['id_produit'];

    $PERSONNE = $_POST['utilisateur'];
    echo $PERSONNE;
    echo $id_produit;

    $valiny =recuper_produit_non_vendu($PERSONNE);
    
?>