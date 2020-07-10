<?php session_start();
if(isset($_SESSION)){
  echo '<header class="header-user-dropdown">';
} else {
  echo '<header class="header-login-signup">';
}
?>

  <div class="header-limiter">
  <h1><a href="#">Company<span>logo</span></a></h1>
    <nav>
      <a href="#">Accueil</a>
      <a href="#">Recherche document</a>
      <a href="#">Proposer document</a>

    </nav>


  <?php
  $other = array("MODERATEUR","BENEVOLE ABBAYE");
 
  if (isset($_SESSION['role']) && $_SESSION['role'] != "") {
    $role = $_SESSION['role'];
    echo '
    <div class="header-user-menu">
    <svg class="bi-person-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
        </svg>
        
      <ul>';
    if ($role[0] == "ADMINISTRATEUR") {
      echo '<li><p class="highlight" >Mon rôle :   ADMINISTRATEUR </p></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/user-management.php">Gestion des comptes</a></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/gestiondoc.php">Gestion des documents</a></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/accueil.view/main\'.php?deconnexion=true">Déconnexion</a></li>
        </ul>  </div>';
    } else { //if (in_array($role[0],$other) ) {
      echo sprintf('
        <li><p>Mon rôle : %s </p><li>
        <li><a href="main\'.php?deconnexion=true">Déconnexion</a><li>
        </ul>  </div>', $role[0]);
    }
  } else {
    echo '<ul>
    <li>
    <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/authentication.view/login.php">
    Connexion  
    </a>
    </li>
    <ul>';
  }
  ?>
  </div>


</header>