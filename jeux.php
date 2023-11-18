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
    $titre = "Ajout Jeux";
    include 'header.inc.php';
    include 'menu.inc.php';

// Inclure le fichier de connexion PDO
require_once("connpdo.php");

    // Requête SQL pour récupérer les catégories
$requete_categories = "SELECT * FROM categorie";
$stmt_categories = $pdo->query($requete_categories);
$categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
<h1>Ajout d'un Jeux </h1>
<form  method="POST" action="tt_jeux.php" enctype="multipart/form-data">
    <div class="container">
    <div class="row my-3">
        <div class="row">

            <div class="col-md-6">
                <label for="nomjeux" class="form-label">Nom de jeux</label>
                <input type="text" class="form-control " id="nomjeux" name="nomjeux" placeholder="Nom du jeux..." required>
            </div>

            <div class="col-md-6">
            <label for="categorie_jeu">Catégorie</label>
            <select id="categorie_jeu" name="categorie_jeu" required>
        <?php
        // Afficher les options du menu déroulant avec les catégories
        foreach ($categories as $categorie) {
            echo "<option value='" . $categorie['id_categorie'] . "'>" . $categorie['nom_categorie'] . "</option>";
        }
        ?>
    </select><br>
            </div>

            

        </div>


        <div class="row my-3">

            <div class="col-md-12">
                <label for="nomjeux" class="form-label">Description</label>
                <!-- <input type="text" class="form-control " id="descriptionjeux" name="descriptionjeux" placeholder="rentrez la description..." required> -->
                <textarea class="form-control" id="descriptionjeux" name="descriptionjeux" rows="5" placeholder="rentrez la description..."></textarea>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
              <label  class="form-label">Ajout des règles</label>
              <input type="file" name="userfile1" class="form-control" />
            </div>

            <div class="col-md-6">
              <label  class="form-label">Ajout d'une photo</label>
              <input type="file" name="userfile" class="form-control" />
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