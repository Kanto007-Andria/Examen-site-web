<?php
    include("fonction.php");
    $OLONA = isset($_GET['etu']) ? $_GET['etu'] : ''; 
    // $montant_total = obtenir_total_ventes_membre($OLONA);
    // $les_ventes = liste_toutes_les_ventes();
    $personne=$_POST['utilisateur'];
    echo $personne;
    $mividy=mes_ventes($personne);

    
?>
