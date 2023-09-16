<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class=footer>
 <ul>
    <li>Garage V.Parrot</li>
    <li>Adresse : <br> Carpin Sarl, Rn 504, Belley 01300</li>
    <li>Horaires :<br>Lundi: 08h-17h<br>Mardi: 08h-17h<br>Mercredi: 08h-17h<br>Jeudi: 08h-17h<br>Vendredi: fermé<br>Samedi: 08h-12h<br>Dimanche: fermé</li>
          <?php
            $contenu = file_get_contents('horaire.txt');
            echo $contenu;
            ?>
 </ul>
</div>
</body>
</html>