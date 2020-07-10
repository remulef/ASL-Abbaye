<?php session_start(); ?>
<header class="header-user-dropdown">

  <div class="header-limiter">
    <h1><a href="#"><img src="../img/logoasl.png" alt="logo des ASL Abbaye"></a></h1>

    <nav>
      <a href="#">Home</a>
    </nav>


  </div>
  <?php if (isset($_SESSION['role']) && $_SESSION['role'] != "") {
    echo '
    <div class="header-user-menu">
      <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
      </svg>
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
    echo '<a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/authentication.view/login.php\">
        <button class="button" style="vertical-align:middle">
          <span>Se connecter</span>
        </button>
      </a>';
  }
  ?>

  </div>

  </div>

</header>