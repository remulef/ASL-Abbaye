


<?php

if (true) {

    //$data = $_POST['data'];


    //On ouvre la base de donnée
    $database = 'gsjrnmiasl.mysql.db';
    $user = 'gsjrnmiasl';
    $password = 'MJCAbbaye38';
    try {
        $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }




    $sth = $db->prepare('SELECT * FROM `DOCUMENT`');

    echo $sth->execute();


    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;

}

?>
