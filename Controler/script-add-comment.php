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
    $nom = $data->nom;
    $commentaire = $data->comment;
    $today = getdate();
    $mon = $today['mon'];
    $date = $today['year']."/".$mon."/".$today['mday'];
    


    $sth = $db->prepare('INSERT INTO  COMMENTAIRE (id_doc,auteur,commentaire,datepub)VALUES(?,?,?,?)');
    $sth->bindParam(1, $id_doc);
    $sth->bindParam(2, $nom);
    $sth->bindParam(3, $commentaire);
    $sth->bindParam(4, $date);
    $sth->execute();


    $db = null;
}
