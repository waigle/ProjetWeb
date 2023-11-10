<?php
  session_start(); // Pour les messages

$nom=$_POST['nomjeux'];
$categorie=$_POST['categoriejeux'];
$description1=$_POST['descriptionjeux'];
$photo=$_FILES['userfile']['name'];//recupérer le nom de fichier
$fichierTemp=$_FILES['userfile']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
move_uploaded_file($fichierTemp,'./images/'.$photo);//transférer le fichier dans le dossier image du projet
$regles=$_FILES['userfile1']['name'];//recupérer le nom de fichier
$fichierTemp=$_FILES['userfile1']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
move_uploaded_file($fichierTemp,'./images/'.$regles);//transférer le fichier dans le dossier image du projet*/
require_once("connpdo.php");
$req="INSERT INTO jeux(NOM,FILE,RULES,categorie,description1) VALUES (?,?,?,?,?)";
$ps=$pdo->prepare($req);
$params=array($nom,$photo,$regles,$categorie,$description1);





if($ps->execute($params)) {
$_SESSION['message'] = "Ajout réussi.";

header("location:listjeux.php");
} else {  $_SESSION['message'] = "Problème Ajout.";

    header("location:listjeuxlll.php");  }
?>