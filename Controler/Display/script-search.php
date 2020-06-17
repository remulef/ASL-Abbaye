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



$data = json_decode($data);

$id_node = $data->pos;
$search_name = "%".$data->docname."%";
$typedoc = $data->typedoc;
$search_format = $data->formats;
$niveau = $data->niveau;
$order =($data->order==true?"ASC":"DESC");
$tefanf = $data->tefanf; 

$typedoc = "(".implode(",",$typedoc).")";



$string = $_POST['data'];
$string = "%".$string."%";
$sth = $db->prepare('SELECT * 
    FROM DOCUMENT 
    WHERE nom LIKE ? 
    ORDER BY nom ?');

$sth->bindParam(1, $search_name);
$sth->execute();
$document = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($document as $key => $value) {
    $document[$key]["nom"] = utf8_encode($value["nom"]);
    $document[$key]["chemin"] = utf8_encode($value["chemin"]);
    $document[$key]["descri"] = utf8_encode($value["descri"]);
}
$json = json_encode($document);
echo $json;

$db = null;
