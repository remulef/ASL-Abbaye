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
        $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    $data = json_decode($data);
    $id_doc = $data->id_doc;
    $id_com = $data->id_com;

    foreach ($id_com as $key => $value) {
        $sth = $db->prepare('DELETE  FROM COMMENTAIRE WHERE id_comment = ? AND id_doc = ?');
        $sth->bindParam(1, $value);
        $sth->bindParam(2, $id_doc);
        $sth->execute();
    }

    $db = null;
}
