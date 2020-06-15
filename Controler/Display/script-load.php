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
//$data = json_decode($data);
$data = 12;
//Si data est vide alors on initialise à la racine
if (!isset($data)) {
    $node_name = "Ressourcepeda";
    $sth = $db->prepare('SELECT * 
    FROM DOCUMENT 
    WHERE id_doc IN (SELECT DOCUMENT_id_doc 
                     FROM NODE_DOCUMENT 
                     WHERE NODE_id_node IN 
                                     (SELECT id_node 
                                     FROM NODE 
                                     WHERE name = ? ))');

    $sth->bindParam(1, $node_name);
    $sth->execute();
    $document = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sth = $db->prepare(
        'SELECT * 
    FROM NODE 
    WHERE parent_node_id IN (SELECT id_node 
                            FROM NODE 
                            WHERE name = ? )'
    );

    $sth->bindParam(1, $node_name);
    $sth->execute();
    $node = $sth->fetchAll(PDO::FETCH_ASSOC);

    //Conversion en UTF8 pour compatibilité JSON 
    foreach ($node as $key => $value) {
        $node[$key]["name"] = utf8_encode($value["name"]);
    }

    foreach ($document as $key => $value) {
        $document[$key]["nom"] = utf8_encode($value["nom"]);
        $document[$key]["chemin"] = utf8_encode($value["chemin"]);
        $document[$key]["descri"] = utf8_encode($value["descri"]);
    }

    $array = array_merge($node, $document);
    $json = json_encode($array);
    echo $json;
}else if(isset($data)) {
    //$id_node = $data->id_node;
    $id_node = $data;
    $sth = $db->prepare('SELECT * 
    FROM DOCUMENT 
    WHERE id_doc IN (SELECT DOCUMENT_id_doc 
                     FROM NODE_DOCUMENT 
                     WHERE NODE_id_node = ?');

    $sth->bindParam(1, $id_node);
    $sth->execute();
    $document = $sth->fetchAll(PDO::FETCH_ASSOC);
    var_dump($document);
    $sth = $db->prepare(
        'SELECT * 
    FROM NODE 
    WHERE parent_node_id = ? '
    );

    $sth->bindParam(1, $id_node);
    $sth->execute();
    $node = $sth->fetchAll(PDO::FETCH_ASSOC);
    var_dump($node);


    foreach ($node as $key => $value) {
        $node[$key]["name"] = utf8_encode($value["name"]);
    }

    foreach ($document as $key => $value) {
        $document[$key]["nom"] = utf8_encode($value["nom"]);
        $document[$key]["chemin"] = utf8_encode($value["chemin"]);
        $document[$key]["descri"] = utf8_encode($value["descri"]);
    }

    $array = array_merge($node, $document);
    $json = json_encode($array);
    echo $json;
}
$db = null;
