<?php 
include('fonction.php');

$PERSONNE = $_POST['etu'];
$VERIFICATION = login($PERSONNE);

if ($VERIFICATION == "TSY MISY") {
    header("Location: nouveau_formulaire.php");
    exit();
} else {
    header("Location: acceuil.php?etu=" . $PERSONNE);
    exit();
}
?>