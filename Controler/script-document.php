<header>Access-Control-Allow-Origin: https://les-asl-abbaye.ovh</header>

<?php



//if(isset( $_POST['id_doc'])){
if(true){

    //$id_doc = $_POST['data'];
    $id_doc = 238;

    //il faudra checker l'identhitifcation



    //On ouvre la base de donnée
    $database = 'gsjrnmiasl.mysql.db';
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


  $sth= $db->prepare('Select * FROM `DOCUMENT` WHERE id_doc = ?');
  $sth->bindParam(1,$id_doc);

  $sth->execute();
  $res = $sth->fetch();


  $doc = array(
    "id"=>$res["id_doc"],
    "typedoc" =>  $res["typedoc"],
    "nom" => $res["nom"],
    "date" => $res["datepublication"],
    "lien" => $res["chemin"],
    "descrip" => $res["descri"]
  );




$json = json_encode($doc);



echo $json;

$db=null;



}


?>
