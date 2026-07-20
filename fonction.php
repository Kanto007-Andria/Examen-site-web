<?php 

function dbconnect()
{
    static $connect = null;

    if ($connect == null) {

        $connect = mysqli_connect('localhost', 'root', '', 'examen');

        if ($connect === false) {
            die('Erreur connexion : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
}
function voir_les_produits_a_vendre(){
    $db = dbconnect();
    $sql = "SELECT * FROM produit_membre";
    $resultat = mysqli_query($db, $sql);
    $liste = array();
    while($produit = mysqli_fetch_assoc($resultat)) {
        $liste[] = $produit;
    }
    
    return $liste; 
}  
?>