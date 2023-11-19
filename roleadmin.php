<?php
session_start();
if(!(isset($_SESSION['PROFILE']) ))
header("location:connexion.php");
if(!($_SESSION['PROFILE']["role"]==1) )//si l'utilisateur est un élève
    header("location:index.php");//on renvoie à l'acceuil


?>