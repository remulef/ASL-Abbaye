<?php
header('Access-Control-Allow-Origin: *');
// Traitement db pour modifier
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

   $username = substr($data[0],1,strlen($data[0])-2);
   echo $username;
   // $username = "Jonas";
   // $password = $data[1];
   // $password = "KAL";
   $password = substr($data[1],1,strlen($data[1])-2);
   // $role = $data[2];
   // $role = "Appreneur";
   $role = substr($data[2],1,strlen($data[2])-2);
   for ($i=0; $i < count($data); $i++) {
     echo $data[$i];
   }
    // Si tout va bien, on peut continuer
    $requete = "UPDATE USER SET password = :password,
                                        role = :role
                        WHERE username = :username";
    $stmt = $bdd->prepare($requete);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->bindParam(":role", $role);
    $stmt->execute();
    $stmt->rowCount();

?>
