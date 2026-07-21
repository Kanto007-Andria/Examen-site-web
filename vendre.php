
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
<form action="amidy.php" method="POST" enctype="multipart/form-data">
    <select name="id_produit">
        <?php foreach ($valiny as $p) { ?>
            <option value="<?php echo $p['id_produit']; ?>"><?php echo $p['nom']; ?></option>
          
        <?php } ?>
    </select>
    <input type="hidden" name="utilisateur" value="<?php echo $OLONA; ?>">
   <p>quantite  a Vendre <input type="number" name="quantite"> </p>
   <label for="ma-date">Date dispo :</label>
   <input type="date" id="ma-date" name="date">
<p>Prix de reference <input type="number" name="prix"> </p>
  <p> choidsisez une photo><input type="file" name="photo"> <p>

    <button type="submit">Vendre</button>
</form>
</body>
</html>