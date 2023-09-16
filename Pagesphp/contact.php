<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!--voici le l'en tete de toutes les pages-->
    <?php include 'header.php'; ?>


<div class="titrecontact">
    <h1>Nous contacter</h1>
</div>

<div class="formulaire">
<form action="/submit" method="post">

  <label for="nom">Nom :</label><br>
  <input type="text" id="nom" name="nom" required><br><br>

  <label for="prenom">Prénom :</label><br>
  <input type="text" id="prenom" name="prenom" required><br><br>

  <label for="email">Adresse Email :</label><br>
  <input type="email" id="email" name="email" required><br><br>

  <label for="telephone">Numéro de Téléphone :</label><br>
  <input type="tel" id="telephone" name="telephone" required><br><br>

  <label for="message">Message :</label><br>
  <textarea id="message" name="message" rows="4" required></textarea><br><br>

  <input type="submit" value="Envoyer">
</form>
</div>

    <!--voici le footer de toutes les pages-->
    <?php include 'footer.php'?>

</body>
</html>