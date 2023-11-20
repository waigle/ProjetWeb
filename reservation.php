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
//echo '<h1>Page pour réserver le jeu ' . htmlspecialchars($jeu['NOM']) . '</h1>';

?>
<div class="container">

<h1>Page pour reserver le jeu <?php echo $jeu['NOM']; ?> </h1>

<div class="container">

<form  method="POST" action="tt_sessionDate.php" enctype="multipart/form-data">
    <div class="container">
    <div class="row my-3">
        <div class="row">

            <div class="col-md-6">
                <label for="jeusession" class="form-label">Rentrer le nom du jeu souhaité : </label>
                <input type="text" class="form-control " id="jeusession" name="jeusession" placeholder="Rentrez le jeu..." required>
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