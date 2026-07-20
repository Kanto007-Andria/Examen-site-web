<?php 
include('fonction.php');

$PERSONNE = $_POST['etu'];

$VERIFIACTION = login($PERSONNE);

if ($VERIFIACTION == "TSY MISY") {
    
    header("Location: nouveau_formulaire.php");

} else {
   
    header("Location: acceuil.php?etu=" . $PERSONNE);

}
?>