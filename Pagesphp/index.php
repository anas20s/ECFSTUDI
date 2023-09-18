<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--voici l'en tete de toutes les pages-->
<?php include 'header.php'?>


    <section class="home">
        <div class="left">
            <h1>Nos<span> Services </span></h1>
            <h4>Par nos meilleurs techniciens</h4>
            <p>Notre garage offre des services de qualité d'une grande envergure</p>
            <p>Les voici :</p>
            <div id="services">
            <?php
            $contenu = file_get_contents('services.txt');
            echo $contenu;
            ?>
            </div>
        </div>
        <div class="right">
            <img src="images/image.jpg">
        </div>
    </section>


    <script>
        var small_menu = document.querySelector(".small_menu");
        var menu = document.querySelector(".menu");
        small_menu.onclick = function(){
            small_menu.classList.toggle('active');
            menu.classList.toggle('small');
        }
    </script>

<!--espace commentaire avec PHP-->

<?php
    include 'connexionBaseDeDonnées.php';
?>
<?php
$database = new Database();
$conn = $database->getConnection();
class CommentairesManager {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getCommentairesApprouves() {
        $commentairesApprouves = $this->conn->query("SELECT * FROM commentaire WHERE etat = 'Approuvé'")->fetchAll(PDO::FETCH_ASSOC);
        return $commentairesApprouves;
    }
}
$commentairesManager = new CommentairesManager($conn);
$commentairesApprouves = $commentairesManager->getCommentairesApprouves();
?>

<!-- Formulaire pour soumettre un commentaire -->
<div class="comm">
    <h2>Commentaires :</h2>
    <form method="POST">
        <input type="text" name="pseudo" placeholder="Votre pseudo" /><br />
        <textarea name="commentaire" placeholder="Votre commentaire"></textarea><br />
        <input type="submit" value="Publier" name="submit_commentaire" />
    </form>
</div>

<!-- Affichage des commentaires approuvés -->
<div class="listecomm">
    <div class="Avis">
        <h3>Avis des clients</h3>
    </div>
    <ul>
        <?php foreach ($commentairesApprouves as $commentaireApprouve): ?>
            <li><?php echo "{$commentaireApprouve['pseudo']}: {$commentaireApprouve['commentaire']}"; ?></li>
        <?php endforeach; ?>
    </ul>
</div>




<!--voici le footer de toutes les pages-->
<?php include 'footer.php'?>



</body>
</html>
