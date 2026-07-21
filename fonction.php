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

function voir_les_produits_a_vendre($OLONA){
    $db = dbconnect();
    $condition = "";
    if (!empty($OLONA)) {
        $condition = " WHERE m.numero_etu != '$OLONA'";
    }

    $sql = "SELECT 
                pm.id_produit_membre, 
                pm.prix_vente, 
                pm.quantite_dispo, 
                pm.date_dispo,
                p.nom AS nom_produit,
                m.nom AS nom_vendeur,
                pm.photo
            FROM produit_membre pm
            JOIN produit p ON pm.id_produit = p.id_produit
            JOIN membre m ON pm.id_membre = m.id_membre" . $condition;
            
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


function ampidirina_ny_entana_amidik($id_produit, $id_membre, $prix_vente, $quantite_dispo) {
    $db = dbconnect();
    
    $sql = "INSERT INTO produit_membre (id_produit, id_membre, prix_vente, quantite_dispo) 
            VALUES ($id_produit, $id_membre, $prix_vente, $quantite_dispo)";
    return mysqli_query($db, $sql);
}

function ajout($etu, $olona) {
    $db = dbconnect();
    
    $sql = "INSERT INTO membre (id_membre, nom, numero_etu) 
            SELECT COALESCE(MAX(id_membre), 0) + 1, '$olona', '$etu' 
            FROM membre";
            
    return mysqli_query($db, $sql);
}
function acheter($id_produit_membre, $quantite_achetee) {
    $db = dbconnect();
    mysqli_query($db, "UPDATE produit_membre SET quantite_dispo = quantite_dispo - $quantite_achetee WHERE id_produit_membre = $id_produit_membre");
    return mysqli_query($db, "INSERT INTO vente (date, heure, id_produit_membre, quantite) VALUES (CURDATE(), CURTIME(), $id_produit_membre, $quantite_achetee)");
}

function obtenir_total_ventes_membre($OLONA) {
    $db = dbconnect();
    $sql = "SELECT SUM(v.quantite * pm.prix_vente) AS total 
            FROM vente v
            JOIN produit_membre pm ON v.id_produit_membre = pm.id_produit_membre
            JOIN membre m ON pm.id_membre = m.id_membre
            WHERE m.numero_etu = '$OLONA'";
            
    $resultat = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($resultat);
    return $row['total'] ? $row['total'] : 0;
}

function liste_toutes_les_ventes() {
    $db = dbconnect();
    $sql = "SELECT v.id_vente, v.date, v.heure, v.quantite, p.nom AS nom_produit, pm.prix_vente, m.nom AS nom_vendeur
            FROM vente v
            JOIN produit_membre pm ON v.id_produit_membre = pm.id_produit_membre
            JOIN produit p ON pm.id_produit = p.id_produit
            JOIN membre m ON pm.id_membre = m.id_membre
            ORDER BY v.id_vente DESC";
            
    $resultat = mysqli_query($db, $sql);
    $liste = array();
    while($row = mysqli_fetch_assoc($resultat)) {
        $liste[] = $row;
    }
    return $liste;
}


function recuper_produit_non_vendu($id_membre){
    $db = dbconnect();
    $sql1 = "SELECT id_membre FROM membre WHERE numero_etu = '$id_membre'";
    $resulta = mysqli_query($db, $sql1);

    $row = mysqli_fetch_assoc($resulta);
    $id_real_membre = $row['id_membre'];
    $sql = "SELECT produit.* FROM produit JOIN produit_membre ON produit_membre.id_produit = produit.id_produit WHERE produit_membre.id_membre = '$id_real_membre'";
   
    $resultat = mysqli_query($db, $sql);
    $liste = array();
    while($produit = mysqli_fetch_assoc($resultat)) {
        $liste[] = $produit;
    }
    
    return $liste;
}

function obtenir_ventes_par_categorie() {
    $db = dbconnect();
    $sql = "SELECT c.nom_categorie AS nom_categorie, SUM(v.quantite * pm.prix_vente) AS total_ventes
            FROM vente v
            JOIN produit_membre pm ON v.id_produit_membre = pm.id_produit_membre
            JOIN produit p ON pm.id_produit = p.id_produit
            JOIN categorie c ON p.id_categorie = c.id_categorie
            GROUP BY c.nom_categorie";
            
    $resultat = mysqli_query($db, $sql);
    
    if (!$resultat) {
        die("Erreur SQL dans les statistiques : " . mysqli_error($db) . "<br>Requête exécutée : " . $sql);
    }
    
    $liste = array();
    while($row = mysqli_fetch_assoc($resultat)) {
        $liste[] = $row;
    }
    return $liste;
}


function obtenir_ventes_produits_par_categorie($nom_cat) {
    $db = dbconnect();
    
    $sql = "SELECT p.id_produit, p.nom AS nom_produit, SUM(v.quantite * pm.prix_vente) AS total_produit
            FROM vente v
            JOIN produit_membre pm ON v.id_produit_membre = pm.id_produit_membre
            JOIN produit p ON pm.id_produit = p.id_produit
            JOIN categorie c ON p.id_categorie = c.id_categorie
            WHERE c.nom_categorie = '$nom_cat'
            GROUP BY p.id_produit, p.nom";
            
    $resultat = mysqli_query($db, $sql);
    
    $liste = array();
    while($row = mysqli_fetch_assoc($resultat)) {
        $liste[] = $row;
    }
    return $liste;
}



function obtenir_ventes_membres_par_produit($id_produit) {
    $db = dbconnect();
    

    $sql = "SELECT m.nom AS nom_membre, m.numero_etu, SUM(v.quantite) AS quantite_totale, SUM(v.quantite * pm.prix_vente) AS total_depense
            FROM vente v
            JOIN produit_membre pm ON v.id_produit_membre = pm.id_produit_membre
            JOIN membre m ON pm.id_membre = m.id_membre
            WHERE pm.id_produit = $id_produit
            GROUP BY m.id_membre, m.nom, m.numero_etu";
            
    $resultat = mysqli_query($db, $sql);
    
    $liste = array();
    while($row = mysqli_fetch_assoc($resultat)) {
        $liste[] = $row;
    }
    return $liste;
}













?>