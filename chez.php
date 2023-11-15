<?php
    session_start();
    if(!isset($_SESSION['PROFILE'])) {
        $_SESSION['erreur'] = "Vous devez être connecté";
        header('Location: index.php');
    }
    $login = $_SESSION['PROFILE']['email'];
    $nom = $_SESSION['PROFILE']['nom'];
    $prenom = $_SESSION['PROFILE']['prenom'];
    
    $titre = "Chez ".$login;
    include 'header.inc.php';
    include 'menu.inc.php';
?>
<div class="container">

<h1>Page de <?php echo $prenom, $nom; ?> </h1>
<h2>Mes informations : </h2>

<?php
    if ($_SESSION['PROFILE']['role'] == 1) {
        echo "Vous êtes un élève";
    } else {
        echo "Vous êtes un admin";
    }
    echo'<li>';
    echo '<a class="nav-link">'.$prenom.'</a>';
    echo'</li>';
    echo'<li>';
    echo '<a class="nav-link">'.$nom.'</a>';
    echo'</li>';
    echo'<li>';
    echo '<a class="nav-link">'.$login.'</a>';
    echo'</li>';
    echo'<li>';
    echo "Vos jeux mis en favoris :";
    echo'</li>';
    // Connexion :
require_once("connpdo.php");
// Requête SQL pour obtenir la liste des noms de jeux pour un utilisateur donné
$req="SELECT NOM FROM jeux
JOIN liste_jeu ON jeux.ID = liste_jeu.id_jeu
JOIN user ON liste_jeu.nom = user.email
WHERE email = :login";
$stmt = $pdo->prepare($req);
$stmt->bindParam(':email_utilisateur', $email_utilisateur, PDO::PARAM_STR);
$stmt->execute();

// Récupérer les résultats de la requête
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Liste des Jeux de l'Utilisateur</h1>

<ul>
    <?php
    // Afficher la liste des noms de jeux
    foreach ($resultats as $jeu) {
        echo "<li>" . $jeu['nom_jeu'] . "</li>";
    }
    ?>
</ul>

?>

</div>
<?php
    include 'footer.inc.php';
?>