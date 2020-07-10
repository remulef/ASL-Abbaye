<?php session_start();
?>
<header class="header-user-dropdown">
    <div class="header-limiter">
        <h1><a href="#">ASL<span> Abbaye</span></a></h1>
        <nav>
            <a href="http://les-asl-abbaye.ovh">Accueil</a>
            <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php">Recherche document</a>
            <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/proposer.view/proposer.php">Proposer document</a>

        </nav>


        <?php
        $other = array("MODERATEUR", "BENEVOLE ABBAYE");

        if (isset($_SESSION['role']) && $_SESSION['role'] != "") {
            $role = $_SESSION['role'];
            echo '
    <div class="header-user-menu">
    <img src="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/index.png" >
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
            echo '
    <div class="header-user-menu">
    Connexion
    <ul>
        <form action="#" method="post">
            <label for="username">Identifiant</label>
            <input type="text" id="username" class="form-control"  required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock" required>
        </form>
      </ul>  
      </div>';
        }
        ?>
    </div>

</header>