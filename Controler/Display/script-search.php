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



//$data = json_decode($data);
//Si data est vide alors on initialise à la racine

$string = $_POST['data'];
$string = "%".$string."%";
$sth = $db->prepare('SELECT * 
    FROM DOCUMENT 
    WHERE name LIKE ? ');

$sth->bindParam(1, $string);
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
