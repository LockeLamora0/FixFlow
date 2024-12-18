<?php


echo "nom du compte : " . $user->getNom();
echo "<br>";

echo "modifier l'id de l'entreprise : ";
echo "<br>";
?>
    <form action="index.php?controleur=Utilisateur&action=ModifierIdEntreprise" method="POST">
        <input type="text" value="<?php echo $user->getIdEntreprise()?>">
        <input type="submit" value="Modifier">
    </form>
<?php
echo "modifier le mot de passe : ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="password" name="" id="">
        <input type="submit" value="Modifier">
    </form>

</body>
</html>