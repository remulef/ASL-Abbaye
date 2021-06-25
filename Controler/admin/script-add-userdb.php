<?php
header('Access-Control-Allow-Origin: *');
// Traitement db pour ajouter
  $data = isset($_POST['result']) ? $_POST['result'] : NULL;
  $data = json_decode("$data",true);

  $db_username = 'gsjrnmiasl';
  $db_password = 'MJCAbbaye38';
  $db_name     = 'gsjrnmiasl';
  $db_host     = 'gsjrnmiasl.mysql.db';

  try
  {
     // On se connecte à MySQL
      $bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);
  }
  catch(Exception $e)
  {
     // En cas d'erreur, on affiche un message et on arrête tout
     die('Erreur : '.$e->getMessage());
   }

   // Si tout va bien, on peut continuer
   $taille = count($data);
   for ($i=0; $i < $taille/3; $i++) {
     $temp = array_splice($data,0,3);
     $requete = $bdd->exec("INSERT INTO USER (username, password, role) VALUES ($temp[0], $temp[1], $temp[2])");
     echo $temp[0];
     echo $temp[1];
     echo $temp[2];
   }
?>
