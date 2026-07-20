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
function ajout($etu, $olona) {
    $db = dbconnect();
    
    $sql = "INSERT INTO membre (id_membre, nom, numero_etu) 
            SELECT COALESCE(MAX(id_membre), 0) + 1, '$olona', '$etu' 
            FROM membre";
            
    return mysqli_query($db, $sql);
}
?>