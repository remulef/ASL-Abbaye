
<?php
header('Access-Control-Allow-Origin: *');



//if(isset( $_POST['id_doc'])){
if(true){

    $data = $_POST['data'];


    //On ouvre la base de donnée
  $$database = 'gsjrnmiasl.mysql.db';
  $user = 'gsjrnmiasl';
  $password = 'MJCAbbaye38';
  try {
      $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

  $data = json_decode($data);

  $id_doc = $data->id_doc;
  $title = $data->title;
  $description = $data->descr;





  $sth= $db->prepare('UPDATE  DOCUMENT SET nom = ?, descri = ? WHERE id_doc = ?');
  $sth->bindParam(1,$title);
  $sth->bindParam(2,$description);
  $sth->bindParam(3,$id_doc);
    
  echo $sth->execute();
  //$res = $sth->fetch();
  
$db=null;
  


}


?>