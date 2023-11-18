<?php
session_start();

// Récupérer l'ID du jeu à liker depuis la requête
$jeuId = $_GET['id'];

// Vous devrez implémenter la gestion de session et récupérer l'ID de l'utilisateur connecté
$userId = $_SESSION['PROFILE']['id']; // Assurez-vous de vérifier la session de l'utilisateur

// Assurez-vous de ne pas permettre aux utilisateurs de liker plusieurs fois
// Vous pouvez utiliser une vérification dans la base de données pour cela

// Inclure le fichier de connexion PDO
require_once("connpdo.php");

// Requête SQL pour insérer le like dans la base de données
$requeteInsertLike = "INSERT INTO liste_jeu (mail, id_jeu) VALUES (:mail, :jeuId)";
$stmtInsertLike = $pdo->prepare($requeteInsertLike);
$stmtInsertLike->bindParam(':mail', $_SESSION['PROFILE']['email'], PDO::PARAM_STR);
$stmtInsertLike->bindParam(':jeuId', $jeuId, PDO::PARAM_INT);
$stmtInsertLike->execute();

// Rediriger l'utilisateur vers la page d'origine (chez.php)
header('Location: chez.php?id_jeu=' . $jeuId);
exit();
?>
