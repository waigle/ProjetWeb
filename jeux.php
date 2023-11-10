<?php
session_start();
    $titre = "Ajout Jeux";
    include 'header.inc.php';
    include 'menu.inc.php';
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
                <label for="nomjeux" class="form-label">Catégorie</label>
                <input type="text" class="form-control " id="categoriejeux" name="categoriejeux" placeholder="catégorie du jeux..." required>
            </div>

            <!--<div class="col-md-6">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Catégorie
                    </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">1.</a></li>
                        <li><a class="dropdown-item" href="#">2.</a></li>
                        <li><a class="dropdown-item" href="#">3.</a></li>
                     </ul>
                </li>
            </div>-->

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