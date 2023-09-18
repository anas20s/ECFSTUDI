<body>
    <?php include 'header.php'; ?>
    <!--presentation des voitures en vente-->
<div class="titrevente">
    <h1>Voici nos voiture d'occasions</h1>
</div>
<!--formulaire systeme de filtre-->
<form method="post" action="NosVoitures.php">
    <label for="prix">Prix :</label>
    <select name="prix">
        <option value="0-2000">0 - 2,000 €</option>
        <option value="2000-5000">2,000 - 5,000 €</option>
        <option value="5000-10000">5,000 - 10,000 €</option>
        <option value="10000+">10,000 € et plus</option>
    </select>

    <label for="kilometrage">Kilométrage :</label>
    <select name="kilometrage">
        <option value="0-50000">0 - 50,000 km</option>
        <option value="50000-100000">50,000 - 100,000 km</option>
        <option value="100000+">100,000 km et plus</option>
    </select>

    <label for="annee">Année :</label>
    <select name="annee">
        <option value="2000-2005">2000 - 2005</option>
        <option value="2005-2010">2005 - 2010</option>
        <option value="2010+">2010 et plus</option>
    </select>

    <input type="submit" value="Filtrer">
</form>


<!--systeme de filtre-->
<?php
include 'connexionBaseDeDonnées.php';
$sql = "SELECT * FROM voitures WHERE 1";

$prix = isset($_POST['prix']) ? $_POST['prix'] : '';
$kilo = isset($_POST['kilometrage']) ? $_POST['kilometrage'] : '';
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';

if ($prix) {
    switch ($prix) {
        case '0-2000':
            $sql .= " AND prix BETWEEN 0 AND 2000";
            break;
        case '2000-5000':
            $sql .= " AND prix BETWEEN 2000 AND 5000";
            break;
        case '5000-10000':
            $sql .= " AND prix BETWEEN 5000 AND 10000";
            break;
        case '10000+':
            $sql .= " AND prix >= 10000";
            break;
    }
}

if ($kilo) {
    switch ($kilo) {
        case '0-50000':
            $sql .= " AND kilometrage BETWEEN 0 AND 50000";
            break;
        case '50000-100000':
            $sql .= " AND kilometrage BETWEEN 50000 AND 100000";
            break;
        case '100000+':
            $sql .= " AND kilometrage >= 100000";
            break;
    }
}

if ($annee) {
    switch ($annee) {
        case '2000-2005':
            $sql .= " AND annee BETWEEN 2000 AND 2005";
            break;
        case '2005-2010':
            $sql .= " AND annee BETWEEN 2005 AND 2010";
            break;
        case '2010+':
            $sql .= " AND annee >= 2010";
            break;
    }
}
$query = $conn->query($sql);
$voitures = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="listevoitures">
<ul>
    <?php foreach ($voitures as $voiture) { ?>
        <li>
            <img src="images/<?= $voiture['image'] ?>" alt="<?= $voiture['modele'] ?>"><br>
            <strong>Modèle :</strong> <?= $voiture['modele'] ?><br>
            <strong>Prix :</strong> <?= $voiture['prix'] ?> €<br>
            <strong>Année :</strong> <?= $voiture['annee'] ?><br>
            <strong>Kilométrage :</strong> <?= $voiture['kilometrage'] ?> km<br>
        </li>
    <?php } ?>
</ul>
    </div>

<!--voici le footer de toutes les pages-->
<?php include 'footer.php' ?>





</body>
</html>
