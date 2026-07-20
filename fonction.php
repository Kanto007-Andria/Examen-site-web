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
    $sql = "SELECT * FROM produit_membre";
    return (dbconnect(),$sql);
}   
?>