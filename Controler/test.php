<?php



//if(isset( $_POST['id_doc'])){
if (true) {

    $data = $_POST['data'];


    //On ouvre la base de donnée
    $database = 'localhost';
    $user = 'root';
    $password = 'OUI';
    try {
        $db = new PDO("mysql:host=127.0.0.1:3308;dbname=asl", $user);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }





    $sth = $db->prepare('SELECT * FROM DOCUMENT ');

    echo $sth->execute();
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    $fp = fopen('res.json', 'w');
    fwrite($fp, $json);
    fclose($fp);
}
