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

//$tefanf = $data->tefanf; 


($data->format == "" ? $search_format = "" : $search_format = " AND typedoc like \"%" . $data->format . "%\"");
($data->docname == "" ? $search_name = "" : $search_name = " AND nom like \"%" . $data->docname . "%\"");
((count($data->typedoc) > 0) ? $typedoc =  " AND typedoc in (\"" . implode("\",\"", $data->typedoc) . "\")" : $typedoc = "");
((count($data->niveau) > 0) ? $niveau = " AND nom like \"%" . implode("%", $data->niveau) . "%\"" : $niveau = "");
$order = " ORDER BY nom " . ($data->order == true ? "ASC" : "DESC");
$node = " AND id_doc IN (SELECT DOCUMENT_id_doc FROM NODE_DOCUMENT WHERE NODE_id_node = " . $data->pos . ")";
$query = 'SELECT * FROM DOCUMENT WHERE 1 ';
$query = $query . $search_format . $search_name . $typedoc . $niveau . $order; //.$node


$sth = $db->prepare($query);
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
