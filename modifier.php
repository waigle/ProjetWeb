<?php
session_start();
$id = $_GET['id'];
if(!isset($_SESSION['PROFILE'])) {
    $_SESSION['erreur'] = "Vous devez être connecté";
    header('Location: index.php');
}
if ($_SESSION['PROFILE']['role'] != 2) {
    $_SESSION['erreur'] = "Vous n'avez pas accès à cette page";
    header('Location: index.php');
  }    
    $titre = "Modification Jeux";
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
<h1>Ajout d'un Jeu </h1>
<form  method="POST" action="modifierjeu.php?id=<?php echo $id?>" enctype="multipart/form-data">
    <div class="container">
    <div class="row my-3">
        <div class="row">

            <div class="col-md-6">
                <label for="nom" class="form-label">Nom du jeu</label>
                <input type="text" class="form-control " id="nom" name="nom" placeholder="Nom du jeu..." required>
            </div>

            <div class="col-md-6">
            <label for="categorie">Catégorie</label>
            <select id="categorie" name="categorie" required>
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
                <label for="description1" class="form-label">Description</label>
                <!-- <input type="text" class="form-control " id="descriptionjeux" name="descriptionjeux" placeholder="rentrez la description..." required> -->
                <textarea class="form-control" id="description1" name="description1" rows="5" placeholder="rentrez la description..."></textarea>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
              <label  class="form-label">Ajout des règles</label>
              <input type="file" id="regles" name="RULES" class="form-control" />
            </div>

            <div class="col-md-6">
              <label  class="form-label">Ajout d'une photo</label>
              <input type="file" name="FILE" class="form-control" />
            </div>

        </div>
        <div class="row my-3">
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-outline-primary" type="submit">Modifier</button>
        </div>
    </div>
    </div>
</form>
</div>
<?php
    include 'footer.inc.php';
?>