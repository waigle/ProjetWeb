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
            
            <img src="images/Jeuxplateau.jpg" alt="Profil" class="figure-img img-fluid rounded">
        </div>
        <div class="col-8 p-3 mb-2 bg-warning text-dark" >
            <p>PLA (Plateau Ludique Alliance) est une associtation de jeux, qui permet aux membres et amoureux de jeux de plateau de se retrouver et de propager la bonne hummeur.</p>
            <a href="http://www.esigelec.fr/fr" class="btn btn-info" type="buttons">En savoir plus</a>

        </div>
        
        <div class="col-2">
            <!-- Espace vide pour aligner les boutons -->
        </div>
    </div>

    <div class="row mt-4">
        <!-- 1er Colonne pour la présentation des jeux -->
        <div class="card col-4 ">
          <div class="col- ml-2 p-3 mb-2 bg-success text-white">
              <img src="images/Monopoly.png"class="card-img-top" alt="...">
              <div style="text-align:center">
                <h5><b>Monopoly</b></h5>
            </div>  
              <p> Le Monopoly est un jeu de société de stratégie qui simule l'achat, la vente et la construction de propriétés.</p>
                <p> <b>1. Objectif : </b> Le but du Monopoly est d'être le dernier joueur en jeu en ayant le monopole sur l'immobilier et en forçant les autres joueurs à faire faillite. </p>
                <p> <b>2.Propriétés et argent : </b> Chaque joueurs recoit de l'argent au début, et ils peuvent gagner ou perder de l'argent en fonction de leurs transactions immmobilières et des cartes Chance ou Caisses de communauté qu'ils tirent.</p>
                <p> <b>Fin de jeux : </b> Le jeu se termine lorsqu'il ne reste qu'un joueur en jeu tandis que les autres ont fait faillite en raison de dettes accumulées. </p>
                <p>Monopoly est un jeu classique qui nécessite des compétences de négociation, de gestion de l'argent et de prise de décision pour réussir. </p>
                

                <!-- <div class="card text-bg-dark"> -->
                        
                <div class="bouton-aligne">
                        <a href="PageRègles/pagepoker.php" target="_blank" class="btn btn-transparent">
                            <img src="images/Regle.png" class="card-img" alt="Règle" style="background: transparent;">
                        </a>

                        <a href="PageReservertation/MonopolyDates.php" target="_blank" class="btn btn-transparent">
                        <img src="images/Calendrier.png" class="card-img" alt="Règle" style="background: transparent;">
                        </a>
                </div>

                        
            </div>                
        </div>
        
        <!-- Colonne pour la deuxième jeux -->
        <div class="col-4">
              <div class="card - ml-2 p-3 mb-2 bg-success text-white">
              <img src="images/Risk.png" class="card-img-top" alt="...">
              <div style="text-align:center">
                <h5><b>Risk</b></h5>
            </div>  
              <p> Risk est un jeu de société classique axé sur la stratégie et la conquête mondiale.</p>
                <p> <b>1. Objectif : </b> Le but de Risk est de conquérir le monde en éliminant les armées adverses et en dominant des territoires clés.</p>
                <p> <b>2. Armées et territoires : </b> Les joueurs gagnet des territoires en lançant des clées pour des combats et pour occuper des zones clés du plateau.</p>
                <p> <b>3. Stratégie et diplomatie : </b> Risk combine des décisions tactiques de la formation d'alliances et planifier des attaques sur les continents entiers. </p>
                <p> <b>4. Fin du jeu : </b> Le jeu se termine lorsqu'un joueur réussit à conquérir tous les territoires ou lorsqu'il n'y a plus de joueurs capables de se défendre.</p>
                <p>Risk offre une éxpérience immersive et compétitive, mettant à l'épreuve les compétences de planification stratégique et de prise de décision des joueurs. </p>
                

                <!-- <div class="card text-bg-dark"> -->
                       
            <div class="bouton-aligne">
                <a href="pagepoker.php" target="_blank" class="btn btn-transparent">
                            <img src="images/Regle.png" class="card-img" alt="Règle" style="background: transparent;">
                        </a>

                        <a href="PageReservertation/RiskDates.php" target="_blank" class="btn btn-transparent">
                        <img src="images/Calendrier.png" class="card-img" alt="Règle" style="background: transparent;">
                        </a>
                        
            </div>

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

              <img src="images/Poker.png" class="card-img-top" alt="...">
              <div style="text-align:center">
                <h5><b>Poker</b></h5>
            </div>  
              <p> Le poker est un jeu de cartes compétitif où les joueurs parient sur la force de leur main
                n.</p>
                <p> <b>1. Distribution des carte : </b> Chaque joueur reçoit un certain nombre de cartes, selon la variante spécifique du poker. </p>
                <p> <b>2. Mises : </b> Les joeurs parient de l'argent en fonction de la valeur perçue de leur main ou de leurs capacité à bluffer</p>
                <p> <b>3. Combinaisons de cartes :</b> Les joueurs utilisent lerus cartes privées et/ou les cartes communes pour former la meilleure main possible en suivant des règles de combinaisons prédéfinies. </p>
                <p> <b>4. Dévoillement des cartes : </b> A la fin, les joueurs restants montrent leurs cartes, et le joueur avec la meilleure main remporte le pot</p>
                <p>Le poker combine des éléments chance, de psychologie et de stratégie, en faisant un jeu populaire et captivant pour les joueurs du monde entier. </p>
                

                <!-- <div class="card text-bg-dark"> -->
                           
                           
            <div class="bouton-aligne">
                <a href="pagepoker.php" target="_blank" class="btn btn-transparent">
                            <img src="images/Regle.png" class="card-img" alt="Règle" style="background: transparent;">
                        </a>

                        <a href="PageReservertation/PokerDates.php" target="_blank" class="btn btn-transparent">
                        <img src="images/Calendrier.png" class="card-img" alt="Règle" style="background: transparent;">
                        </a>
            </div>

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

    <div class="fixed-bottom text-center mb-4">
            <a href="inscription.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">S'inscrire</a>
            <a href="connexion.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Se connecter</a>
    </div>
                      
</div>
</html>

<?php
    include 'footer.inc.php';
?>
