<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Esigelec</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page.php">Une page</a>
        </li>

        <?php

if((isset($_SESSION['PROFILE']) ))
{
$nom=$_SESSION['PROFILE']['nom'];
  echo'<li class="nav-item">';
  echo '<a class="nav-link" href="session.php">Chez '.$nom.'</a>';
  echo'</li>';
}
?>


      </ul>

      <?php   
if(!(isset($_SESSION['PROFILE']) ))
{
      
      
     echo ' <ul class="navbar-nav mb-lg-0">
     <li class="nav-item">
          <a class="nav-link"  href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Connexion</a>
        </li>

      </ul>';
}
  else {

    echo ' <ul class="navbar-nav mb-lg-0">
       <li class="nav-item">
         <a class="nav-link" href="logout.php">Deconnexion</a>
       </li>

     </ul>';

  }


 ?>     
    </div>
  </div>
</nav>