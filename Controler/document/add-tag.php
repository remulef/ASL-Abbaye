<?php
header('Access-Control-Allow-Origin: *');




//if(isset( $_POST['id_doc'])){
if (true) {

    $data = $_POST['data'];


    //On ouvre la base de donnée
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

    $id_doc = $data->id_doc;
    $tag = $data->tag;

    $sth = $db->prepare('SELECT count(*) from TAGS where id_doc = ?');
    $sth->bindParam(1, $id_doc);
    $sth->execute();
    $nbcolumn = $sth->fetchColumn();


    if (strlen($tag) <= 30 && $nbcolumn <= 10) {
        $sth = $db->prepare('INSERT INTO  TAGS (id_doc,tag)VALUES(?,?)');
        $sth->bindParam(1, $id_doc);
        $sth->bindParam(2, $tags);
        $sth->execute();
    }

    $db = null;
}
