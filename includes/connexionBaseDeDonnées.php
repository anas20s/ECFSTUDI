<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>base de données</title>
</head>
<body>
<?php
$servername = 'localhost';
$username = 'root';
$password = ''; 
$dbname = 'ecfgaragestudi';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

</body>
</html>
