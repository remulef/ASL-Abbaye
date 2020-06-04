<?php



//if(isset( $_POST['id_doc'])){
if(true){

    //$id_doc = $_POST['data'];
    $id_doc = 238;
    $id_doc = random_int(2,1000);
    echo $id_doc.PHP_EOL;

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
  $res = $sth->fetch(PDO::FETCH_ASSOC);


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
echo $doc;
var_dump($res);
$db=null;



}


?>
