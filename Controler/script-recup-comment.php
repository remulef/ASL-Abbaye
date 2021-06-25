<?php
header('Access-Control-Allow-Origin: *');



//if(isset( $_POST['id_doc'])){
if (true) {

    $id_doc = $_POST['data'];
    //$id_doc = 238;


    //On ouvre la base de donnée
    $database = 'gsjrnmiasl.mysql.db';
    $user = 'gsjrnmiasl';
    $password = 'MJCAbbaye38';
    try {
        $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    //le plus recent en premier
    $sth = $db->prepare('SELECT *  FROM COMMENTAIRE WHERE id_doc = ? ORDER BY id_comment DESC ');
    $sth->bindParam(1, $id_doc);
    $sth->execute();
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;


    $db = null;
}
