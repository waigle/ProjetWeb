<?php
// Inclure le fichier de connexion PDO
require_once("connpdo.php");

var_dump($_GET['id']);
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les règles du jeu depuis la base de données
    $requete = "SELECT RULES FROM jeux WHERE ID = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultat) {
        // Configurer les en-têtes pour forcer le téléchargement du fichier
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="regles_jeu.pdf"');
        echo $resultat['RULES'];
        exit;
    } else {
        echo "Le fichier PDF n'a pas pu être trouvé.";
    }
} else {
    echo "ID du jeu non spécifié.";
}
?>