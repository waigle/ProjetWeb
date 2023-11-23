<?php
    session_start();
    if(!isset($_SESSION['PROFILE'])) {
        $_SESSION['erreur'] = "Vous devez être connecté";
        header('Location: index.php');
    }
    if ($_SESSION['PROFILE']['role'] != 2) {
        $_SESSION['erreur'] = "Vous n'avez pas accès à cette page";
        header('Location: index.php');
      }    
    


    $titre = "Liste Inscripts";
    include 'header.inc.php';
    include 'menu.inc.php';

    // Inclure le fichier de connexion PDO
    require_once("connpdo.php");

    // Requête SQL pour obtenir la liste des noms de jeux aimés par l'utilisateur
    $session = "SELECT DISTINCT session.date, session.heure_debut, session.heure_fin, jeux.NOM, user.email
    FROM session
    JOIN jeux ON session.id_jeu = jeux.ID
    JOIN participe ON session.ID = participe.id_session
    JOIN user ON user.email = participe.mail_participant
    ORDER BY session.date, session.heure_debut";

    $stmt_session = $pdo->prepare($session);
    $stmt_session->execute();

    // Récupérer les résultats de la requête
    $resultats_session = $stmt_session->fetchAll(PDO::FETCH_ASSOC);

    // Structure de données pour stocker les sessions et leurs participants
    $sessions = [];

    // Remplir la structure de données
    foreach ($resultats_session as $session) {
        $session_id = $session['NOM'] . '_' . $session['date'] . '_' . $session['heure_debut'] . '_' . $session['heure_fin'];
        $sessions[$session_id]['NOM'] = $session['NOM'];
        $sessions[$session_id]['date'] = $session['date'];
        $sessions[$session_id]['heure_debut'] = $session['heure_debut'];
        $sessions[$session_id]['heure_fin'] = $session['heure_fin'];
        $sessions[$session_id]['participants'][] = $session['email'];
    }

    // Afficher la liste des sessions de jeux et leurs participants
    echo '<ul>';
    foreach ($sessions as $session) {
        echo  '<li> Nom du jeu : ' . $session['NOM'] . '</li>';
        echo '<li>Date : ' . $session['date'] . ', Heure de début : ' . $session['heure_debut'] . ', Heure de fin : ' . $session['heure_fin'] . '</li>';
        echo  '<li> Participants : ' . implode(', ', $session['participants']) . '</li>';
        echo '<br>';
    }
    echo '</ul>';


    include 'footer.inc.php';
?>

