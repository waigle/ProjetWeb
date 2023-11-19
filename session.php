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
    $login = $_SESSION['PROFILE']['email'];
    $titre = "Session ".$login;
    include 'header.inc.php';
    include 'menu.inc.php';

    // Inclure le fichier de connexion PDO
require_once("connpdo.php");

// Requête SQL pour récupérer les catégories
$requete_jeux = "SELECT * FROM jeux";
$stmt_jeux = $pdo->query($requete_jeux);
$jeux = $stmt_jeux->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">

<h1>Page d'ajout de session </h1>

<div class="container">

<form  method="POST" action="tt_session.php" enctype="multipart/form-data">
    <div class="container">
    <div class="row my-3">
        <div class="row">

            <div class="col-md-6">
            <label for="session_jeu">Choisir le jeu</label>
            <select id="session_jeu" name="session_jeu" required>
        <?php
        // Afficher les options du menu déroulant avec les catégories
        foreach ($jeux as $jeux) {  //1er $jeux=ligne22 2ème nom de la table dans BDD
            echo "<option value='" . $jeux['ID'] . "'>" . $jeux['NOM'] . "</option>";
        }
        ?>
    </select><br>
            </div>

        </div>


        <div class="row my-3">

            <div class="col-md-4">
                <label for="datesession" class="form-label">Date </label>
                <input type="date" class="form-control " id="datesession" name="datesession" placeholder="Rentrez la date..." required>
            </div>
            <div class="col-md-4">
                <label for="heuredebut" class="form-label">Heure de début </label>
                <input type="time" class="form-control " id="heuredebut" name="heuredebut" placeholder="h:m:s" required>
            </div>
            <div class="col-md-4">
                <label for="heurefin" class="form-label">heure de fin </label>
                <input type="time" class="form-control " id="heurefin" name="heurefin" placeholder="h:m:s" required>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
              
            </div>

            <div class="col-md-6">
              
            </div>

        </div>
        <div class="row my-3">
            <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Ajouter</button>
        </div>
    </div>
    </div>
</form>
</div>
<?php
    include 'footer.inc.php';
?>