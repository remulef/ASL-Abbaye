<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_node = $_POST["id_node"];
    $id_doc = $_POST["id_doc"];


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

    $sth = $db->prepare('SELECT tmp FROM DOCUMENT WHERE id_doc = ?');
    $sth->bindParam(1, $id_node);
    $tmp = $sth->fetch();

    if ($tmp==true) {
        $sth = $db->prepare('UPDATE DOCUMENT SET tmp=false WHERE id_doc = ?');
        $sth->bindParam(1, $id_node);
        $sth->execute();
    
        $sth = $db->prepare('INSERT INTO DOCUMENT_NODE (NODE_id_node,DOCUMENT_id_node) value(?,?)');
        $sth->bindParam(1, $id_node);
        $sth->bindParam(2, $id_doc);
        $sth->execute();
    }else {

        $sth = $db->prepare('UPDATE NODE_DOCUMENT SET NODE_id_node = ? WHERE DOCUMENT_id_doc = ?');
        $sth->bindParam(1, $id_node);
        $sth->bindParam(2, $id_doc);
        //var_dump($id_node);
        //var_dump($id_doc);
        if ($sth->execute()==1) {
            echo"Déplacé avec succés";
        } 
        else {
            echo "ERREUR";
        }
    }




    header( "refresh:2; url=http://les-asl-abbaye.ovh/" ); 
}
