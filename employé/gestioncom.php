<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les commentaires</title>
</head>
<body>
<?php
include 'connexionBaseDeDonnées.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentaire_id']) && isset($_POST['action'])) {
    $commentaire_id = $_POST['commentaire_id'];
    $action = $_POST['action'];

    $sql = "UPDATE commentaire SET etat = :etat WHERE id = :id";
    $stmt = $conn->prepare($sql);

    if ($action == 'approuver') {
        $etat = 'Approuvé';
    } elseif ($action == 'rejeter') {
        $etat = 'Rejeté';
    }
    $stmt->bindParam(':etat', $etat, PDO::PARAM_STR);
    $stmt->bindParam(':id', $commentaire_id, PDO::PARAM_INT);
    if ($stmt->execute()) {   
    } else {
    }
}
$query = $conn->query("SELECT * FROM commentaire WHERE etat = 'En attente d''approbation'");
?>
<!-- Affichez les commentaires en attente d'approbation -->
<div class="liste-commentaires-attente">
    <h2>Commentaires en attente d'approbation :</h2>
    <ul>
        <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
            <li>
                <p>Pseudo: <?= $row['pseudo'] ?></p>
                <p>Commentaire: <?= $row['commentaire'] ?></p>
                <form action='gestioncom.php' method='post'>
                    <input type='hidden' name='commentaire_id' value='<?= $row['id'] ?>'>
                    <button type='submit' name='action' value='approuver'>Approuver</button>
                    <button type='submit' name='action' value='rejeter'>Rejeter</button>
                </form>
            </li>
        <?php } ?>
    </ul>
</div>
</body>
</html>