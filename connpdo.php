<?php
$host = "localhost";
$login = "root";
$passwd = "root";
$dbname = "amphi3";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $login, $passwd);
    // Paramètres pour avoir des erreurs SQL affichées
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $msg = 'Erreur PDO : ' . $e->getMessage();
    die($msg);
}
?>
