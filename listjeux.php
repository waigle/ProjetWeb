<?php
session_start();

$titre = "Liste des jeux";
include 'header.inc.php';
include 'menu.inc.php';

?>

<div class="container">
    <h1>Liste des jeux</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Règles</th>
                <th scope="col">Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connexion à la base de données
            require_once("connpdo.php");

            $req = "SELECT * FROM jeux
                    JOIN categorie ON jeux.categorie = categorie.id_categorie";
            $ps = $pdo->prepare($req);
            $ps->execute();

            while ($row = $ps->fetch()) {
                echo '<tr>';
                echo '<th scope="row">' . htmlspecialchars($row['ID']) . '</th>';
                echo '<td>' . htmlspecialchars($row['NOM']) . '</td>';
                echo '<td>' . htmlspecialchars($row['description1']) . '</td>';
                echo '<td>' . htmlspecialchars($row['nom_categorie']) . '</td>';
                echo '<td><img src="RèglesJeux/' . htmlspecialchars($row['RULES']) . '" width="100px" height="100px"></td>';
                echo '<td><img src="imagesJeux/' . htmlspecialchars($row['FILE']) . '" width="100px" height="100px"></td>';
                if ($_SESSION['PROFILE']['role'] == 2) {
                echo '<td><a href="deletejeu.php?ID=' . $row['ID'] . '" >Supprimer</a></td>';
                echo '<td><a href="modifier.php?id=' . $row['ID'] . '" >Modifier</a></td>';
                echo '</tr>';
                }
            }

            ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.inc.php';
?>
