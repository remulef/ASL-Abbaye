<?php
header('Access-Control-Allow-Origin: *');


//if(isset( $_POST['id_doc'])){
if (true) {

  $id_doc = $_POST['data'];
  
  //il faudra checker l'identhitifcation



  //On ouvre la base de donnée
  $database = 'gsjrnmiasl.mysql.db';
  $user = 'gsjrnmiasl';
  $password = 'MJCAbbaye38';
  try {
    $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }


  $sth = $db->prepare('Select * FROM `DOCUMENT` WHERE id_doc = ?');
  $sth->bindParam(1, $id_doc);

  $sth->execute();
  $res = $sth->fetch(PDO::FETCH_ASSOC);


  //Passage en UTF8 pour corriger les erreurs de création du json
  $res["nom"] = utf8_encode($res["nom"]);
  $res["chemin"] = utf8_encode($res["chemin"]);
  $res["descri"] = utf8_encode($res["descri"]);

  //Encodage en Json pour envoie XHR
  $json = json_encode($res);
  echo $json;
  //var_dump($res);

  //Deconnexion
  $db = null;
}
