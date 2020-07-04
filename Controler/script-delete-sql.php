<?php
echo session_start();
var_dump($_SESSION);
header('Access-Control-Allow-Origin: *');

//if(isset( $_POST['id_doc'])){
if (true) {

  $id_doc = $_POST['data'];


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

  $sql = 'SELECT chemin FROM DOCUMENT WHERE id_doc = ' . $id_doc;
  $chemin = $db->query($sql)->fetchColumn();


  $sth = $db->prepare('DELETE  FROM NODE_DOCUMENT WHERE DOCUMENT_id_doc = ?');
  $sth->bindParam(1, $id_doc);
  $sth->execute();

  $sth = $db->prepare('DELETE  FROM TAGS WHERE id_doc = ?');
  $sth->bindParam(1, $id_doc);
  $sth->execute();

  $sth = $db->prepare('DELETE  FROM COMMENTAIRE WHERE id_doc = ?');
  $sth->bindParam(1, $id_doc);
  $sth->execute();

  $sth = $db->prepare('DELETE  FROM DOCUMENT WHERE id_doc = ?');
  $sth->bindParam(1, $id_doc);
  $sth->execute();

  if ($sth->execute()) {

    try {
      echo $_SERVER['DOCUMENT_ROOT'].$chemin;
      unlink($_SERVER['DOCUMENT_ROOT'].$chemin);
    } catch (Throwable $th) {
      throw $th;
    }
  };

  $db = null;
}
