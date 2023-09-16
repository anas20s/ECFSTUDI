<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>création de copmte pour employé</title>
</head>
<body>
<div class="creecompteemploye">
    <h1>Créer un compte employé</h1>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br>

        <input type="submit" name="creer_compte" value="Créer le compte">
    </form>
</div>
<?php
include 'connexionBaseDeDonnées.php';

if (isset($_POST["creer_compte"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
    $requete = "INSERT INTO employe (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
    try {
        $stmt = $conn->prepare($requete);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->execute();
        echo "Compte employé créé avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la création du compte : " . $e->getMessage();
    }
}
?>
</body>
</html>