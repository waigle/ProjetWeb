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
?>
</div>
<?php
    include 'footer.inc.php';
?>