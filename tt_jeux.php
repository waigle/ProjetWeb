<?php
  session_start(); // Pour les messages

$nom=$_POST['nomjeux'];
$description=$_POST['descriptionjeux'];
//$categorie=$_POST['categoriejeux'];
$photo=$_FILES['userfile1']['name'];//recupérer le nom de fichier
$fichierTemp1=$_FILES['userfile1']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
move_uploaded_file($fichierTemp1,'./images/'.$photo);//transférer le fichier dans le dossier image du projet
$regle=$_FILES['userfile2']['name'];//recupérer le nom de fichier
$fichierTemp2=$_FILES['userfile2']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
move_uploaded_file($fichierTemp2,'./images/'.$regle);//transférer le fichier dans le dossier image du projet
require_once("connpdo.php");
$req="INSERT INTO jeux(nom,description,categorie,RULES,FILE) VALUES (?,?,1,?,?)";
$ps=$pdo->prepare($req);
$params=array($nom,$description,$regle,$photo);

if($ps->execute($params)) {
$_SESSION['message'] = "Ajout réussi.";

header("location:listjeux.php");
} else {  $_SESSION['message'] = "Problème Ajout.";

    header("location:listjeux.php");  }
?>