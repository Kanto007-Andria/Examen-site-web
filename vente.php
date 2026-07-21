<?php
    include("fonction.php");
   
    // $montant_total = obtenir_total_ventes_membre($OLONA);
    // $les_ventes = liste_toutes_les_ventes();
    $personne=$_POST['utilisateur'];
    echo $personne;
    $mividy=mes_ventes($personne);

    


    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Ventes</title>
</head>
<body>

    <table border="1">
        <tr>
           
            <th>date</th>
            <th>heure</th>
          
            <th>quantite</th>
            
            
           
            
            
          
            <th>total</th>
        </tr>

        <?php foreach ($mividy as $achat) { ?>
            <tr>
                
                <td><?php echo $achat['date']; ?></td>
                <td><?php echo $achat['heure']; ?></td>
            
                <td><?php echo $achat['quantite']; ?></td>
               
                
                <td><?php echo $achat['total']; ?></td>
              </tr>
        <?php } ?>
    </table>

</body>
</html>