<?php
    //require_once("roleadmin.php");
    session_start();
    $titre = "Administratuer";
    include 'header.inc.php';
    include 'menuadmin.php';
?>
<div class="container">
<?php
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
    ?>

<h1>Administratuer</h1>

</div>
<?php
    include 'footer.inc.php';
?>

