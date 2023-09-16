<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se conecter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <!--voici le l'en tete de toutes les pages-->
    <?php include 'header.php'; ?>

<div class="titreconnexion">
    <h1> Connexion <h1>
</div>

<!-- Formulaire de connexion pour les utilisateurs -->
<div class="formulaireconnexion">
<form action="connexion.php" method="post">
    <label for="role">Rôle :</label>
    <select id="role" name="role">
        <option value="admin">Administrateur</option>
        <option value="employe">Employé</option>
    </select><br>
    <label for="email">E-mail :</label>
    <input type="text" id="email" name="email" required><br>
    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
    <button type="submit">Se connecter</button>
</form>
</div>


<?php include 'connexionBaseDeDonnées.php';
?>

 <?php
 session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $query = $conn->prepare("SELECT * FROM administrateur WHERE email = :email AND mot_de_passe = :mot_de_passe");
    $query->bindParam(':email', $email);
    $query->bindParam(':mot_de_passe', $mot_de_passe);
    $query->execute();
    $administrateur = $query->fetch();

    $query = $conn->prepare("SELECT * FROM employe WHERE email = :email AND mot_de_passe = :mot_de_passe");
    $query->bindParam(':email', $email);
    $query->bindParam(':mot_de_passe', $mot_de_passe);
    $query->execute();
    $employe = $query->fetch();

    if ($administrateur) {
        $_SESSION['admin_id'] = $administrateur['id'];
        header("Location: accueiladmin.php"); 
        exit();
    } elseif ($employe) {
        $_SESSION['employe_id'] = $employe['id'];
        header("Location: accueilemployé.php"); 
        exit();
    } else {
        header("Location: connexion.php?erreur=1");
        exit();
    }
}
?>
    <!--voici le footer de toutes les pages-->
    <?php include 'footer.php'?>

</body>
</html>