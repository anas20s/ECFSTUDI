<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter de nouvelles voitures</title>
</head>
<body>
Vous pouvez ajouter des nouvelles voitures <br> citation du garage : Le commerce est le moteur de l'econmie mondiale il crée des opportunités et favorise l'échange entre les nations
<br>
<!-- Formulaire pour ajouter une nouvelle voiture -->
<form method="post" action="ajoutvoiture.php" enctype="multipart/form-data">
    <label for="modele">Modèle :</label>
    <input type="text" name="modele" required>
    
    <label for="prix">Prix :</label>
    <input type="number" name="prix" required>
    
    <label for="annee">Année :</label>
    <input type="number" name="annee" required>
    
    <label for="kilometrage">Kilométrage :</label>
    <input type="number" name="kilometrage" required>
    
    <label for="image">Image :</label>
    <input type="file" name="image" required>
    
    <input type="submit" value="Ajouter la voiture">
</form>
<?php
include 'connexionBaseDeDonnées.php';

$modele = $_POST["modele"];
$prix = $_POST['prix'];
$annee = $_POST['annee'];
$kilometrage = $_POST['kilometrage'];

$target_dir = "images/";
$image_name = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $image_name;
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$sql = "INSERT INTO voitures (modele, prix, annee, kilometrage, image) VALUES (:modele, :prix, :annee, :kilometrage, :image)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':modele', $modele, PDO::PARAM_STR);
$stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
$stmt->bindParam(':annee', $annee, PDO::PARAM_INT);
$stmt->bindParam(':kilometrage', $kilometrage, PDO::PARAM_INT);
$stmt->bindParam(':image', $image_name, PDO::PARAM_STR);
$stmt->execute();

header("Location: NosVoitures.php");
exit();
?>
</body>
</html>