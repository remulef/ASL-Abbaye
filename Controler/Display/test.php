<?php
header('Access-Control-Allow-Origin: *');

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



$data = $_POST['data'];
$data = json_decode($data);



($data->docname ==""?$name="":$name=" AND nom like \"%".$data->docname."%\"");
((count($data->tags)>0)?$tags = " AND id_doc IN( SELECT id_doc FROM TAGS WHERE tags like\"%".implode("%",$data->tags)."%\"":$tags="");
//Version 1 de ressource
//((count($data->ressource)>0)?$ressource = " AND nom like \"%".implode("%",$data->ressource)."%\"":$ressource="");
//Version 2 de ressource 
((count($data->ressource)>0)?$ressource = "  AND nom like \"%-%".implode("%\" AND nom like \"%-%",$data->ressource)."%\"":$ressource="");

((count($data->typedoc)>0)?$typedoc =  " AND typedoc in (\"".implode("\",\"",$data->typedoc)."\")":$typedoc="");
($data->TEFANF == true?$TEFANF="AND nom like %tefanf%":$$TEFANF="");
((count($data->niveau)>0)?$niveau = " AND nom like \"%-%".implode("%\" AND nom like \"%-%",$data->niveau)."%\"":$niveau="");
($data->order ==""? $order="":$order = " ORDER BY".$data->order);

$query = 'SELECT * FROM DOCUMENT WHERE 1 ';
$query = $query.$name.$typedoc.$niveau.$ressource.$tags.$order; //.$node
echo $query;

/*
  $sth = $db->prepare($query);
 $sth->execute();
  $document = $sth->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($document);
  echo $json;
  
  $db = null;
  */ 
?>