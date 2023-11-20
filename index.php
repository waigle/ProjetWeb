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

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Jeux</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .jeu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .jeu {
            width: 30%; /* Ajustez la largeur en fonction de vos besoins */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #fff;
        }

        .jeu img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .rules-button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php
// Inclure le fichier de connexion PDO
require_once("connpdo.php");

// Récupérer les jeux depuis la base de données
$requete = "SELECT * FROM jeux";
$resultat = $pdo->query($requete);
?>


<div class="jeu-container">
        <?php
        // Afficher les jeux sur la page web
        while ($jeu = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='jeu'>";
            echo "<h2>" . $jeu['NOM'] . "</h2>";
            echo '<img src="imagesJeux/'.$jeu['FILE'].'" width="350px" height="350px">';
            echo "<p>" . $jeu['description1'] . "</p>";
            
        

            //Affiche les bouttons pour règles, planning et like un jeu seulement si on est connecté
            if(isset($_SESSION['PROFILE'])) {
                // Affiche le bouton pour télécharger les règles
                echo '<a href="download.php?id=' . $jeu['ID'] . '"><img src="images/Regle.png" class="card-img" alt="Règle" style="background: transparent; display:block; width: 100px; height: 100px;"></a>';
                // Affiche le bouton pour réserver une date        
                echo '<a href="reservation.php?id=' . $jeu['ID'] . '"><img src="images/Calendrier.png" class="card-img" alt="Calendrier" style="background: transparent; display:block; width: 100px; height: 100px;"></a>';
                echo '<a href="like.php?id=' . $jeu['ID'] . '"><img src="images/coeur.png" class="card-img" alt="Like" style="background: transparent; display:block; width: 100px; height: 100px;"></a>';
            }
        echo "</div>";
        }
        ?>
    
</div>


<!-- Div qui affiche les bouttons s'inscrire et se connecter si l'utilisateur n'est pas connecté et n'affiche rien si il est connecté-->
<div class="fixed-bottom text-center mb-4">
    <?php
        // Vérifier si l'utilisateur est connecté
        if(isset($_SESSION['PROFILE'])) {
            // Utilisateur connecté
            
        } else {
            // Utilisateur non connecté, affichez les boutons "S'inscrire" et "Se connecter"
            echo '<a href="inscription.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">S\'inscrire</a>';
            echo '<a href="connexion.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Se connecter</a>';
        }
    ?>
</div>

</body>
</html>


<?php
    include 'footer.inc.php';
?>