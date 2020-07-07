<?php
session_start();
echo 
' <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function msieversion() {

  var ua = window.navigator.userAgent;
  var msie = ua.indexOf("MSIE ");

  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
  {
      alert(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))));
  }
  else  // If another browser, return 0
  {
      alert("otherbrowser");
  }

  return false;
}
</script>';
  if(isset($_SESSION['role']) && $_SESSION['role'] != ""){
    $role = $_SESSION['role'];
    if($role[0] == "BENEVOLE ABBAYE"){
      echo "<div class=\"drop\" onclick=\"affichage()\">
        <svg class=\"bi-person-circle\" width=\"4em\" height=\"4em\" viewBox=\"0 0 16 16\" fill=\"blue\" xmlns=\"http://www.w3.org/2000/svg\">
        <path d=\"M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z\"/>
        <path fill-rule=\"evenodd\" d=\"M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
        <path fill-rule=\"evenodd\" d=\"M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z\"/>
        </svg>
        <div id=\"myDropdown\" class=\"dropdown-contenu\">
          <p>Mon rôle : $role[0] </p>
          <a href=\"main'.php?deconnexion=true\">Déconnexion</a>
        </div>
      </div>";

    }else if($role[0] == "ADMINISTRATEUR"){
        echo "<div class=\"drop\" onclick=\"affichage()\">
          <svg class=\"bi-person-circle\" width=\"4em\" height=\"4em\" viewBox=\"0 0 16 16\" fill=\"magenta\" xmlns=\"http://www.w3.org/2000/svg\">
          <path d=\"M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z\"/>
          <path fill-rule=\"evenodd\" d=\"M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
          <path fill-rule=\"evenodd\" d=\"M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z\"/>
          </svg>
          <div id=\"myDropdown\" class=\"dropdown-contenu\">
            <p>Mon rôle : $role[0] </p>
            <a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/user-management.php\">Gestion des comptes</a>
            <a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/gestiondoc.php\">Gestion des documents</a>
            <a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/accueil.view/main'.php?deconnexion=true\">Déconnexion</a>
          </div>
        </div>";

    }else if($role[0] == "MODERATEUR"){
      echo "<div class=\"drop\" onclick=\"affichage()\">
        <svg class=\"bi-person-circle\" width=\"4em\" height=\"4em\" viewBox=\"0 0 16 16\" fill=\"purple\" xmlns=\"http://www.w3.org/2000/svg\">
        <path d=\"M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z\"/>
        <path fill-rule=\"evenodd\" d=\"M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
        <path fill-rule=\"evenodd\" d=\"M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z\"/>
        </svg>
        <div id=\"myDropdown\" class=\"dropdown-contenu\">
          <p>Mon rôle : $role[0] </p>
          <a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/accueil.view/main'.php?deconnexion=true\">Déconnexion</a>
        </div>
      </div>";

      }
  }else{
    echo "<a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/authentication.view/login.php\"><button class=\"button\" style=\"vertical-align:middle\"><span>Se connecter</span></button></a>";
  }
  if(isset($_GET['deconnexion']))
  {
     if($_GET['deconnexion']==true)
     {
        session_unset();
        header("location:http://les-asl-abbaye.ovh/ASL-Abbaye/View/accueil.view/main'.php");
     }
  }
 ?>
 <script>
     /* When the user clicks on the button,
   toggle between hiding and showing the dropdown content */
   function affichage() {
   document.getElementById("myDropdown").classList.toggle("show");
   }
 </script>
