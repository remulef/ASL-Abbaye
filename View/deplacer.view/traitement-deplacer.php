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

    $sql = 'SELECT tmp FROM DOCUMENT WHERE id_doc = '.$id_doc;
    //$sth->bindParam(1, $id_doc);
    //$tmp = $sth->fetch();
    $tmp = $db->query($sql)->fetchColumn();

    

    if ($tmp==true) {

        $sth = $db->prepare('UPDATE DOCUMENT SET tmp=false WHERE id_doc = ?');
        $sth->bindParam(1, $id_doc);
        $sth->execute();
        echo "le fichier n'est plus temporaire";
    
        $sth = $db->prepare('INSERT INTO NODE_DOCUMENT (NODE_id_node,DOCUMENT_id_doc) value(?,?)');
        $sth->bindParam(1, $id_node);
        $sth->bindParam(2, $id_doc);
        $sth->execute();
        echo "le fichier est déplacé";
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
