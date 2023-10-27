<?php
    session_start();
    $titre = "Accueil";
    $file = '/Profil.jpg'; 
    include 'header.inc.php';
    include 'menu.inc.php';
    


?>


<div class="container">


<?php
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
    ?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  
  </head>
  <body>

<div class="container">


    
<!doctype html>
<html lang="fr">



<div class="container">
    <div class="row mt-4">
        <div class="col-2">
            <!-- Logo de l'Esigelec à gauche -->
            <img src="Image/Profil.jpg" alt="Profil" class="figure-img img-fluid rounded">
        </div>
        <div class="col-8 p-3 mb-2 bg-warning text-dark" >
            <p>PLA (Plateau Ludique Alliance) est une associtation de jeux, qui permet aux membres et amoureux de jeux de plateau de se retrouver et de propager la bonne hummeur.</p>
        </div>
        <div class="col-2">
            <!-- Espace vide pour aligner les boutons -->
        </div>
    </div>

    <div class="row mt-4">
        <!-- 1er Colonne pour la présentation des jeux -->
        <div class="card col-4 ">
          <div class="col- ml-2 p-3 mb-2 bg-success text-white">
              <img src="Image/Monopoly.png" class="card-img-top" alt="...">
              <h5><b> Monopoly</b></h5>
              <p> Le poker est un jeu de cartes compétitif où les joueurs parient sur la force de leur main
                n.</p>
                <p> <b>1. Distribution des carte : </b> Chaque joueur reçoit un certain nombre de cartes, selon la variante spécifique du poker. </p>
                <p> <b>2. Mises : </b> Les joeurs parient de l'argent en fonction de la valeur perçue de leur main ou de leurs capacité à bluffer</p>
                <p> <b>3. Combinaisons de cartes :</b> Les joueurs utilisent lerus cartes privées et/ou les cartes communes pour former la meilleure main possible en suivant des règles de combinaisons prédéfinies. </p>
                <p> <b>4. Dévoillement des cartes : </b> A la fin, les joueurs restants montrent leurs cartes, et le joueur avec la meilleure main remporte le pot</p>
                <p>Le poker combine des éléments chance, de psychologie et de stratégie, en faisant un jeu populaire et captivant pour les joueurs du monde entier. </p>
                

                <!-- <div class="card text-bg-dark"> -->
                           
                        <button  href="pagepoker.php" target="_blank" class="btn btn-primary">
                        <img src="Image/pokerregle.png" class="card-img" alt="Règle" >
                            <h5 href="connexion.php" target="_blank" class="btn btn-primary"> Règle </h5>
                        </button>
            </div>                
        </div>
        
        <!-- Colonne pour la deuxième jeux -->
        <div class="col-4">
              <div class="card - ml-2 p-3 mb-2 bg-success text-white">
              <img src="Image/Risk.jpg" class="card-img-top" alt="...">
              <h5><b> Risk</b></h5>
              <p> Le poker est un jeu de cartes compétitif où les joueurs parient sur la force de leur main
                n.</p>
                <p> <b>1. Distribution des carte : </b> Chaque joueur reçoit un certain nombre de cartes, selon la variante spécifique du poker. </p>
                <p> <b>2. Mises : </b> Les joeurs parient de l'argent en fonction de la valeur perçue de leur main ou de leurs capacité à bluffer</p>
                <p> <b>3. Combinaisons de cartes :</b> Les joueurs utilisent lerus cartes privées et/ou les cartes communes pour former la meilleure main possible en suivant des règles de combinaisons prédéfinies. </p>
                <p> <b>4. Dévoillement des cartes : </b> A la fin, les joueurs restants montrent leurs cartes, et le joueur avec la meilleure main remporte le pot</p>
                <p>Le poker combine des éléments chance, de psychologie et de stratégie, en faisant un jeu populaire et captivant pour les joueurs du monde entier. </p>
                

                <!-- <div class="card text-bg-dark"> -->
                           
                        <button  href="pagepoker.php" target="_blank" class="btn btn-primary">
                        <img src="Image/pokerregle.png" class="card-img" alt="Règle" >
                            <h5 href="connexion.php" target="_blank" class="btn btn-primary"> Règle </h5>
                        </button>
            </div>                
        </div>

                  <!--div class="ratio ratio-16x9">
                      <iframe src="https://www.youtube.com/embed/IrAS32KplXQ" title="YouTube video" allowfullscreen></iframe>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">Le Projet Ingénieur : qu'est-ce que c'est ?</h5>
                      <p class="card-text">Le Projet Ingénieur consiste à conduire un projet intégrant l’ensemble des dimensions technologiques, organisationnelles, financières et humaines. Vous menez ce projet en équipe de 6 en 3e année du cycle ingénieur, d'octobre à février. </p>
                      <a href="https://welcome-esigelec.fr/videos/ping-projet-ingenieur/" target="_blank" class="btn btn-primary">EN SAVOIR +</a>
                  </div>
              </div>
        </div>
                 Colonne pour la deuixème carte -->
        
             <div class="col-4 ">
              <div class="card - ml-2 p-3 mb-2 bg-success text-white">

              <img src="Image/Poker.jpg" class="card-img-top" alt="...">
              <h5><b> Poker</b></h5>
              <p> Le poker est un jeu de cartes compétitif où les joueurs parient sur la force de leur main
                n.</p>
                <p> <b>1. Distribution des carte : </b> Chaque joueur reçoit un certain nombre de cartes, selon la variante spécifique du poker. </p>
                <p> <b>2. Mises : </b> Les joeurs parient de l'argent en fonction de la valeur perçue de leur main ou de leurs capacité à bluffer</p>
                <p> <b>3. Combinaisons de cartes :</b> Les joueurs utilisent lerus cartes privées et/ou les cartes communes pour former la meilleure main possible en suivant des règles de combinaisons prédéfinies. </p>
                <p> <b>4. Dévoillement des cartes : </b> A la fin, les joueurs restants montrent leurs cartes, et le joueur avec la meilleure main remporte le pot</p>
                <p>Le poker combine des éléments chance, de psychologie et de stratégie, en faisant un jeu populaire et captivant pour les joueurs du monde entier. </p>
                

                <!-- <div class="card text-bg-dark"> -->
                           
                        <button  href="pagepoker.php" target="_blank" class="btn btn-primary">
                        <img src="Image/pokerregle.png" class="card-img" alt="Règle" >
                            <h5 href="connexion.php" target="_blank" class="btn btn-primary"> Règle </h5>
                        </button>
            </div>                
        </div>

                 <!-- <div class="ratio ratio-16x9">
                      <iframe src="https://www.youtube.com/embed/Pd7vdGO4B40" title="YouTube video" allowfullscreen></iframe>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">Immersion dans les Projets Ingénieurs (PING) - 2023</h5>
                      <p class="card-text">Les projets ingénieurs en réponse aux enjeux socio-écologiques ! Découvrez en vidéo quelques projets ingénieurs (PING) de 5ème année de l’ESIGELEC parmi les 65 de la Promo 2023   </p>
                      <a href="https://www.youtube.com/embed/Pd7vdGO4B40" target="_blank" class="btn btn-primary">EN SAVOIR +</a>
                  </div>
              </div>
        </div> -->

    </div>

<nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3 mt-5">
  <a class="navbar-brand" href="#">Sujets pour le PING 2024</a>

</nav>

    <div class="container">
                <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Parcours</th>
                                    </tr>
            </thead>
            <tbody>
        <tr><td>1</td><td>Sujet 1</td><td>Description du sujet 1</td><td>TIC</td></tr><tr><td>2</td><td>Sujet 2</td><td>Description du sujet 2</td><td>ET</td></tr><tr><td>3</td><td>Sujet 3</td><td>Description du sujet 3</td><td>GEE</td></tr><tr><td>4</td><td>Sujet 4</td><td>Description du sujet 4</td><td>TIC</td></tr><tr><td>5</td><td>Sujet 5</td><td>Description du sujet 5</td><td>ET</td></tr><tr><td>6</td><td>Sujet 6</td><td>Description du sujet 6</td><td>GEE</td></tr><tr><td>7</td><td>Sujet 7</td><td>Description du sujet 7</td><td>TIC</td></tr><tr><td>8</td><td>Sujet 8</td><td>Description du sujet 8</td><td>ET</td></tr><tr><td>9</td><td>Sujet 9</td><td>Description du sujet 9</td><td>GEE</td></tr><tr><td>10</td><td>Sujet 10</td><td>Description du sujet 10</td><td>TIC</td></tr><tr><td>11</td><td>test</td><td>test</td><td>GEE</td></tr><tr><td>12</td><td>test</td><td>test1</td><td>TIC</td></tr><tr><td>13</td><td>test</td><td>test1</td><td>TIC</td></tr><tr><td>14</td><td>test</td><td>test</td><td>TIC</td></tr><tr><td>15</td><td>aez</td><td>eza</td><td>TIC</td></tr><tr><td>16</td><td>re</td><td>re</td><td>TIC</td></tr><tr><td>17</td><td>re</td><td>re</td><td>TIC</td></tr><tr><td>18</td><td>re</td><td>re</td><td>TIC</td></tr></table>
<!-- Boutons "S'inscrire" et "Se connecter" tout en bas et au centre seulement si pas connecté -->
        <div class="fixed-bottom text-center mb-4">
            <a href="inscription.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">S'inscrire</a>
            <a href="connexion.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Se connecter</a>
        </div>
 
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    include 'footer.inc.php';
?>
