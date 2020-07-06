<?php
session_start();
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

((count($data->ressource)>0)?$ressource = "  AND nom like \"%-%".implode("%\" AND nom like \"%-%",$data->ressource)."%\"":$ressource="");
((count($data->tags)>0)?$tags = " AND id_doc IN (SELECT id_doc FROM TAGS WHERE tag like\"%".implode("%\" OR tag like \"%",$data->tags)."%\")":$tags="");
((count($data->ressource)>0)?$ressource = "  AND nom like \"%-%".implode("%\" AND nom like \"%-%",$data->ressource)."%\"":$ressource="");
((count($data->typedoc)>0)?$typedoc =  " AND typedoc in (\"".implode("\",\"",$data->typedoc)."\")":$typedoc="");
($data->TEFANF == true?$TEFANF="AND nom like %tefanf%":$$TEFANF="");
((count($data->niveau)>0)?$niveau = " AND nom like \"%-%".implode("%\" AND nom like \"%-%",$data->niveau)."%\"":$niveau="");
($data->order ==""? $order="":$order = " ORDER BY ".$data->order);

//NODE DE RECHERCHE
($data->nodesearch ==-1?$nodesearch="":$nodesearch=" AND id_doc IN (SELECT DOCUMENT_id_doc FROM NODE_DOCUMENT WHERE NODE_id_node =".$data->nodesearch.")");

//ALPHA 
($data->alpha == true ? $alpha=" AND nom like \"%ALPHA%\"":$alpha=="");


//TEF/ANF
($data->tefanf == true ? $tefanf=" AND (nom like '%TCF%' OR nom like '%ANF%' )" :$tefanf=="");

$query = 'SELECT * FROM DOCUMENT WHERE 1 ';
$query = $query.$name.$typedoc.$niveau.$ressource.$tags.$alpha.$tefanf.$nodesearch.$order; //.$node
//echo $query;
//AJOUTER TEF ANF 
//https://codepen.io/stephengreig/pen/ogoPLv
$sth = $db->query($query);
$document = $sth->fetchAll(PDO::FETCH_ASSOC);
//var_dump($document);
foreach ($document as $key => $value) {
    $document[$key]["nom"] = utf8_encode($value["nom"]);
    $document[$key]["chemin"] = utf8_encode($value["chemin"]);
    $document[$key]["descri"] = utf8_encode($value["descri"]);
}

$json = json_encode($document);
echo $json;

$db = null;
