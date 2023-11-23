
<?php
  session_start(); // Pour les messages
$id = $_GET['id'];
$nom=$_POST['nom'];
$categorie=$_POST['categorie'];
$description1=$_POST['description1'];
$photo=$_FILES['userfile']['name'];//recupérer le nom de fichier
$fichierTemp=$_FILES['userfile']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
move_uploaded_file($fichierTemp,'./imagesJeux/'.$photo);//transférer le fichier dans le dossier image du projet
$regles=$_FILES['userfile1']['name'];//recupérer le nom de fichier
$fichierTemp=$_FILES['userfile1']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
move_uploaded_file($fichierTemp,'./RèglesJeux/'.$regles);//transférer le fichier dans le dossier image du projet*/

require_once("connpdo.php");
$req="UPDATE jeux SET NOM=?, FILE=?, RULES=?, categorie=?, description1=? WHERE ID=?";
$ps=$pdo->prepare($req);
$params=array($nom,$photo,$regles,$categorie,$description1,$id);





if($ps->execute($params)) {
$_SESSION['message'] = "Ajout réussi.";

header("location:listjeux.php");
} else {  $_SESSION['message'] = "Problème Ajout.";

    header("location:listjeux.php");  }
?>