<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accueil V2</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main'.css" />
  </head>
  <body>
    <h1>Bienvenue sur la base de données pédagogique des ASL de l'Abbaye</h1>
    <?php
      if(isset($_SESSION['role']) && $_SESSION['role'] != ""){
        $role = $_SESSION['role'];
        if($role[0] == "Bénévole Abbaye"){
          echo "<svg class=\"bi bi-person-circle\" width=\"4em\" height=\"4em\" viewBox=\"0 0 16 16\" fill=\"blue\" xmlns=\"http://www.w3.org/2000/svg\">
            <path d=\"M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z\"/>
            <path fill-rule=\"evenodd\" d=\"M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
            <path fill-rule=\"evenodd\" d=\"M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z\"/>
            </svg>";
          }else if($role[0] == "Administrateur"){
            echo "<svg class=\"bi bi-person-circle\" width=\"4em\" height=\"4em\" viewBox=\"0 0 16 16\" fill=\"red\" xmlns=\"http://www.w3.org/2000/svg\">
              <path d=\"M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z\"/>
              <path fill-rule=\"evenodd\" d=\"M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
              <path fill-rule=\"evenodd\" d=\"M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z\"/>
              </svg>";
              echo "<a href=\"../admin.view/user-management.php\"><button class=\"admin\" style=\"vertical-align:middle\"><span>Gestion Compte</span></button></a>";
          }else{
            echo "<svg class=\"bi bi-person-circle\" width=\"4em\" height=\"4em\" viewBox=\"0 0 16 16\" fill=\"green\" xmlns=\"http://www.w3.org/2000/svg\">
              <path d=\"M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z\"/>
              <path fill-rule=\"evenodd\" d=\"M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
              <path fill-rule=\"evenodd\" d=\"M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z\"/>
              </svg>";
          }
        // $role = $_SESSION['role'];
        echo "<br>Ton rôle est $role[0]. ";
        echo "<a href=\"main'.php?deconnexion=true\"><span>Déconnexion</span></a>";
      }else{
        echo "<a href=\"../authentication.view/login.php\"><button class=\"button\" style=\"vertical-align:middle\"><span>Se connecter</span></button></a>";
      }
      if(isset($_GET['deconnexion']))
      {
         if($_GET['deconnexion']==true)
         {
            session_unset();
            header("location:main'.php");
         }
      }
     ?>
    <div class="dropdown" style="float:left">
     <button class="dropbtn">Consulter</button>
     <div class="dropdown-content">
       <a href="#">Outils d'Évaluation</a>
       <a href="../display.view/display.php">Ressources Pédagogiques</a>
       <a href="#">Actualités / Informations des ASL</a>
       <?php
        if(isset($_SESSION['role'])){
          echo "<a href=\"#\">Réalisations Apprenants</a>";
          echo "<a href=\"#\">Comptes-Rendus</a>";
        }
        ?>
       <!-- <a href="#">Réalisations Apprenants</a> -->
       <!-- <a href="#">Comptes-Rendus</a> -->
     </div>
    </div>
    <div class="dropdown" style="float:right">
     <button class="dropbtn">Contribuer</button>
     <div class="dropdown-content" id="id">
       <?php
        if(isset($_SESSION['role'])){
          echo "<a href=\"#\">Ajouter un Document</a>";
        }else{
       ?>
       <a href="#">Proposer un Document</a>
       <?php
        }
          if(isset($_SESSION['role'])){
            echo "<a href=\"#\">Ajouter un Compte-Rendu</a>";
          }
        ?>
       <a href="#">FAQ</a>
       <a href="#">Forum</a>
     </div>
    </div>
  </body>
</html>
