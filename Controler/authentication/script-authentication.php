<?php
header('Access-Control-Allow-Origin: *');
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'gsjrnmiasl';
    $db_password = 'MJCAbbaye38';
    $db_name     = 'gsjrnmiasl';
    $db_host     = 'gsjrnmiasl.mysql.db';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');

    // en PDO
    //$bdd = new PDO('mysql:host='$db_host';dbname='$db_name';charset=utf8', $db_username, $db_password);

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM USER where
              username = '".$username."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           $_SESSION['password'] = $password;
           $requete = "SELECT role FROM USER where
                  username = '".$username."'";
           $exec_requete = mysqli_query($db,$requete);
           $role = mysqli_fetch_array($exec_requete);
           $_SESSION['role'] = $role;
           header('Location: ../../View/accueil.view/main\'.php');
        }
        else
        {
           header('Location: ../../View/authentication.view/login.php?erreur=1'); // utilisateur ou mot de passe incorrect
           echo $username;
        }
    }
    else
    {
       header('Location: ../../View/authentication.view/login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../../View/authentication.view/login.php');
}
mysqli_close($db); // fermer la connexion
?>
