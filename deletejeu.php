<?php
$ID=$_GET['ID'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// Désactiver la vérification des clés étrangères temporairement
$mysqli->query("SET foreign_key_checks = 0");

// Supprimer de la table 'jeux'
if ($stmt = $mysqli->prepare("DELETE FROM jeux WHERE ID=?")) {
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Supprimer de la table 'liste_jeu'
if ($stmt = $mysqli->prepare("DELETE FROM liste_jeu WHERE id_jeu=?")) {
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Supprimer de la table 'session'
if ($stmt = $mysqli->prepare("DELETE FROM session WHERE id_jeu=?")) {
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Réactiver la vérification des clés étrangères
$mysqli->query("SET foreign_key_checks = 1");


header("location:listjeux.php")

?>