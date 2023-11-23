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
    <h1>Page de <?php echo $prenom, $nom ?> </h1>
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
    

        // Inclure le fichier de connexion PDO
        require_once("connpdo.php");
    
        // Récupérer l'e-mail de l'utilisateur depuis la session

        $login = $_SESSION['PROFILE']['email'];
        // Requête SQL pour obtenir la liste des noms de jeux pour un utilisateur donné
        $requete = "SELECT jeux.NOM AS nom_jeu
        FROM jeux
        JOIN liste_jeu ON liste_jeu.id_jeu = jeux.ID
        JOIN user ON liste_jeu.mail = user.email
        WHERE user.email = :login";

        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        // Pour récuperer le like de la page like.php
        // Récupérer les résultats de la requête
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Récupérer l'ID du jeu aimé depuis l'URL
        $jeuId_aime = isset($_GET['id_jeu']) ? $_GET['id_jeu'] : null;

        // Requête SQL pour obtenir la liste des noms de jeux aimés par l'utilisateur
        $requete_aime = "SELECT DISTINCT jeux.NOM AS nom_jeu
        FROM jeux
        JOIN liste_jeu ON liste_jeu.id_jeu = jeux.ID
        WHERE liste_jeu.mail = :mail";

        $stmt_aime = $pdo->prepare($requete_aime);
        $stmt_aime->bindParam(':mail', $login, PDO::PARAM_STR);
        $stmt_aime->execute();

        // Récupérer les résultats de la requête
        $resultats_aime = $stmt_aime->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Liste des Jeux de l'Utilisateur</title>
        </head>

        <body>
            <h3>Mes jeux favoris : </h3>
            <ul>
        <?php
        // Afficher la liste des noms de jeux
        foreach ($resultats_aime as $jeu_aime) {
            echo "<li>" . $jeu_aime['nom_jeu'] . "</li>";
        }
        ?>
            </ul>
        </body>
    </html>

    <?php
        // Récupérer l'e-mail de l'utilisateur depuis la session
        $login = $_SESSION['PROFILE']['email'];
        

        // Récupérer la date de la session depuis l'URL
        $id_session = isset($_GET['id_session']) ? $_GET['id_session'] : null;

        // Requête SQL pour obtenir la liste des noms de jeux aimés par l'utilisateur
        $session_jeu = "SELECT DISTINCT session.date, session.heure_debut, session.heure_fin, jeux.NOM
        FROM session
        JOIN jeux ON session.id_jeu = jeux.ID
        JOIN participe ON session.ID = participe.id_session
        JOIN user ON user.email = participe.mail_participant
        WHERE user.email = :login";

        $stmt_sessions = $pdo->prepare($session_jeu);
        $stmt_sessions->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt_sessions->execute();

        // Récupérer les résultats de la requête
        $resultats_session = $stmt_sessions->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Liste des Jeux de l'Utilisateur</title>
        </head>

        <body>
            <h3>Mes sessions de jeux : </h3>
            <ul>
        <?php
        // Afficher la liste des sessions de jeux
        foreach ($resultats_session as $session) {
            echo  '<li> Nom du jeu : ' . $session['NOM'] . '</li>';
            echo '<li>Date : ' . $session['date'] . ', Heure de début : ' . $session['heure_debut'] . ', Heure de fin : ' . $session['heure_fin'] . '</li>';
        }
        ?>
            </ul>
        </body>
    </html>



        

    
    <?php
    include 'footer.inc.php';
    ?>
</div>
