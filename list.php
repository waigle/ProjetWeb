<?php
    session_start();
    if(!isset($_SESSION['PROFILE'])) {
        $_SESSION['erreur'] = "Vous devez être connecté";
        header('Location: index.php');
    }
    if ($_SESSION['PROFILE']['role'] != 2) {
        $_SESSION['erreur'] = "Vous n'avez pas accès à cette page";
        header('Location: index.php');
      }    
    


    $titre = "Liste Utilisateur";
    include 'header.inc.php';
    include 'menu.inc.php';

?>
<div class="container">
<h1>Contenu</h1>



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  <?php

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}


$i=1;
if ($stmt = $mysqli->prepare("SELECT * FROM user WHERE 1")) 
{
 
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row['nom'].'</td>';
    echo'<td>'.$row['prenom'].'</td>';
    echo'<td>'.$row['email'].'</td>';
    echo '<td>';
    if ($row['role'] == 1) {
        echo 'Élève';
    } elseif ($row['role'] == 2) {
      echo 'Admin';
    } else {
       echo 'Autre'; // pas de raison d'être normalement
    }
    echo '</td>';
    echo'<td><a href="delete.php?email='.$row['email'].'" >Supprimer</a></td>';
    echo '</tr>';
$i++;   
}
}

?>

</tbody>

</table>


</div>
<?php
    include 'footer.inc.php';
?>
