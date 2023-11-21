<?php
session_start();

// Récupérer l'ID de la session depuis la requête
$sessionId = $_GET['id'];

// Inclure le fichier de connexion PDO
require_once("connpdo.php");

// Requête SQL pour insérer la participation dans la base de données
$requeteInsert = "INSERT INTO participe (mail_participant, id_session) VALUES (:mail, :sessionId)";
$stmtInsert = $pdo->prepare($requeteInsert);
$stmtInsert->bindParam(':mail', $_SESSION['PROFILE']['email'], PDO::PARAM_STR);
$stmtInsert->bindParam(':sessionId', $sessionId, PDO::PARAM_INT);
$stmtInsert->execute();

// Rediriger l'utilisateur vers la page d'origine (chez.php)
header('Location: chez.php?id_session=' . $sessionId);
exit();
?>