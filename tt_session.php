<?php
  session_start(); // Pour les messages

$jeu=$_POST['jeusession'];
$date=$_POST['datesession'];
$hdebut=$_POST['heuredebut'];
$hfin=$_POST['heurefin'];

require_once("connpdo.php");
$req="INSERT INTO session(id_jeu, date, heure_debut, heure_fin) VALUES (?,?,?,?)";
$ps=$pdo->prepare($req);
$params=array($jeu,$date,$hdebut,$hfin);





if($ps->execute($params)) {
$_SESSION['message'] = "Ajout réussi.";

header("location:listjeux.php");
} else {  $_SESSION['message'] = "Problème Ajout.";

    header("location:listjeuxlll.php");  }
?>