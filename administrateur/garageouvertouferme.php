<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonce</title>
</head>
<body>
    
Annonce si le garage est ouvert ou fermé
<?php
$contenu = file_get_contents('horaire.txt');
?>
<form action="garageouvertouferme.php" method="post">
    <textarea name="contenuhoraire" rows="10" cols="50"><?php echo $contenu; ?></textarea>
    <button type="submit">Modifier le Contenu</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contenuhoraire'])) {
    $nouveauContenu = $_POST['contenuhoraire'];
    file_put_contents('horaire.txt', $nouveauContenu);
    header("Location: garageouvertouferme.php");
    exit();
}
?>
</body>
</html>