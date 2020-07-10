<?php session_start();
if(isset($_SESSION)){
  echo '<header class="header-user-dropdown">';
} else {
  echo '<header class="header-login-signup">';
}
?>

  <div class="header-limiter">
    <h1><a href="#"><img src="http://les-asl-abbaye.ovh/ASL-Abbaye/data/img/logoasl.png" alt="logo des ASL Abbaye" ></a></h1>

    <nav>
      <a href="#">Accueil</a>
      <a href="#">Recherche document</a>
      <a href="#">Proposer document</a>

    </nav>


  </div>
  <?php if (isset($_SESSION['role']) && $_SESSION['role'] != "") {
    echo '
    <div class="header-user-menu">
    <img src="assets/2.jpg" alt="User Image"/>
      <ul>';
    if ($role[0] == "ADMINISTRATEUR") {
      echo '<li><p class="highlight" >Mon rôle :   ADMINISTRATEUR </p></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/user-management.php">Gestion des comptes</a></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/gestiondoc.php">Gestion des documents</a></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/accueil.view/main\'.php?deconnexion=true">Déconnexion</a></li>
        </ul>';
    } else {
      echo sprintf('
        <li><p>Mon rôle : %s </p><li>
        <li><a href="main\'.php?deconnexion=true">Déconnexion</a><li>
        </ul>', $role[0]);
    }
  } else {
    echo '<ul>
    <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/authentication.view/login.php\">
    Connexion  
    </a>
    <ul>';
  }
  ?>

  </div>

</header>