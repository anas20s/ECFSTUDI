<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'informations</title>
</head>
<body>
Modifier les informations proposée par le garage pour les services dans la page d'accueil
<?php
$contenu = file_get_contents('services.txt');
?>
<form action="gestiontexte.php" method="post">
    <textarea name="contenuservices" rows="10" cols="50"><?php echo $contenu; ?></textarea>
    <button type="submit">Modifier le Contenu</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contenuservices'])) {
    $nouveauContenu = $_POST['contenuservices'];
    file_put_contents('services.txt', $nouveauContenu);
    header("Location: gestiontexte.php");
    exit();
}
?>
</body>
</html>