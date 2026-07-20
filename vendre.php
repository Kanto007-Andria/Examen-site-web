
<?php
    include("fonction.php");
   $OLONA=$_POST['utilisateur'];
   echo $OLONA;
    $valiny =recuper_produit_non_vendu($OLONA);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="traitement_vente.php" method="POST">
    <select name="id_produit">
        <?php foreach ($valiny as $p) { ?>
            <option value="<?php echo $p['id_produit']; ?>"><?php echo $p['nom']; ?></option>
        <?php } ?>
    </select>
    
    <button type="submit">Vendre</button>
</form>
</body>
</html>