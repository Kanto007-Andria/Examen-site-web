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


function login($olona) {
    $db = dbconnect(); 
    
    $sql = "SELECT * FROM membre WHERE numero_ETU = '$olona'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return "TSY MISY";
    }
}

<<<<<<< HEAD
function ampidirina_ny_entana_amidik($id_produit, $id_membre, $prix_vente, $quantite_dispo) {
    $db = dbconnect();
    
    $sql = "INSERT INTO produit_membre (id_produit, id_membre, prix_vente, quantite_dispo) 
            VALUES ($id_produit, $id_membre, $prix_vente, $quantite_dispo)";
    return mysqli_query($db, $sql);
}
=======

>>>>>>> b1baf3c8a7f2e0a5d015c9deaae0d3076783e2cc

?>