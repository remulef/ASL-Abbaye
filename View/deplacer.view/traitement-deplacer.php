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

    
    $sth = $db->prepare('UPDATE NODE_id_node = ? WHERE DOCUMENT_id_doc = ?');
    $sth->bindParam(1, $id_node);
    $sth->bindParam(2, $id_doc);
    echo $sth->execute();    
}
