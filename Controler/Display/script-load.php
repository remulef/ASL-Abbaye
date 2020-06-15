<?php
$database = 'gsjrnmiasl.mysql.db';
$user = 'gsjrnmiasl';
$password = 'MJCAbbaye38';
try {
    $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



$data = $_POST['data'];
if (empty($data)) {
    echo "vide";
}
else {
    echo "pas vide";
}

echo PHP_EOL;    


$node_name = "%jeux%";
    $sth = $db->prepare('SELECT * 
    FROM DOCUMENT 
    WHERE id_doc IN (SELECT DOCUMENT_id_doc 
                     FROM NODE_DOCUMENT 
                     WHERE NODE_id_node IN 
                                     (SELECT id_node 
                                     FROM NODE 
                                     WHERE name LIKE ? ))');

    $sth->bindParam(1, $node_name);
    $document = $sth->fetchAll(PDO::FETCH_ASSOC);
    var_dump($document);
    echo PHP_EOL;    

    $sth = $db->prepare(
    'SELECT * 
    FROM NODE 
    WHERE parent_node_id IN (SELECT id_node 
                            FROM NODE 
                            WHERE name LIKE ? )');

    $sth->bindParam(1, $node_name);
    $node = $sth->fetchAll(PDO::FETCH_ASSOC);
    var_dump($node);


    
    
    
    
$db = null;
