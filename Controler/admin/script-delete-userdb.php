<?php
header('Access-Control-Allow-Origin: *');
// Traitement db pour supprimer
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
    $requete = "DELETE FROM USER WHERE username = :data";
    $stmt = $bdd->prepare($requete);
    $stmt->bindParam(':data', $data, PDO::PARAM_STR);
    $stmt->execute();
?>
