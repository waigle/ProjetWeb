<?php
    session_start();
    if(!isset($_SESSION['PROFILE'])) {
        $_SESSION['erreur'] = "Vous devez être connecté";
        header('Location: index.php');
    }

    $login = $_SESSION['PROFILE']['email'];
    $titre = "Reservation ".$login;
    include 'header.inc.php';
    include 'menu.inc.php';

    // Inclure le fichier de connexion PDO
require_once("connpdo.php");

// Récupérer l'ID du jeu depuis l'URL
$jeuId = isset($_GET['id']) ? $_GET['id'] : null;

// Requête SQL pour récupérer les catégories
$requete_jeu = "SELECT * FROM jeux WHERE ID = :jeuId";
$stmt = $pdo->prepare($requete_jeu);
$stmt->bindParam(':jeuId', $jeuId, PDO::PARAM_STR);
$stmt->execute();

// Récupérer les résultats de la requête
$jeu = $stmt->fetch(PDO::FETCH_ASSOC);
echo '<h1>Page pour réserver le jeu ' . htmlspecialchars($jeu['NOM']) . '</h1>';

// Requête SQL pour récupérer les sessions de jeu disponibles
$requete_sessions = "SELECT * FROM session WHERE id_jeu = :jeuId";
$stmt_sessions = $pdo->prepare($requete_sessions);
$stmt_sessions->bindParam(':jeuId', $jeuId, PDO::PARAM_STR);
$stmt_sessions->execute();

// Récupérer les résultats de la requête
$resultats_sessions = $stmt_sessions->fetchAll(PDO::FETCH_ASSOC);

// Afficher les sessions disponibles
echo '<h2>Sessions disponibles :</h2>';
echo '<ul>';
foreach ($resultats_sessions as $session) {
    echo '<li>Date : ' . $session['date'] . ', Heure de début : ' . $session['heure_debut'] . ', Heure de fin : ' . $session['heure_fin'] . '</li>';
    echo '<a href="inscriptionsession.php?id=' . $session['ID'] . '"><img src="images/coeur.png" class="card-img" alt="Like" style="background: transparent; display:block; width: 100px; height: 100px;"></a>';
    echo '<br>';
}
?>

<?php
    include 'footer.inc.php';
?>