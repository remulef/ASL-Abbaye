<?php



//if(isset( $_POST['id_doc'])){
if (true) {

    $data = $_POST['data'];



    $database = 'localhost';
    $user = 'root';
    $password = 'OUI';
    try{
      $db = new PDO("mysql:host=127.0.0.1:3308;dbname=asl", $user);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    $data = json_decode($data);
    $id_doc = $data->id_doc;
    $id_com = $data->id_com;

    // File redirect var dump
    ob_start();
    var_dump($GLOBALS['id_com']);
    $data = ob_get_clean();
    $fp = fopen("textfile.txt", "w");
    fwrite($fp, $data);
    fclose($fp);
   
    foreach ($id_com as $key => $value) {
        $sth = $db->prepare('DELETE  FROM COMMENTAIRE WHERE id_comment = ? AND id_doc = ?');
        $sth->bindParam(1, $value);
        $sth->bindParam(2, $id_doc);
         $sth->execute();
       
        
    }


    $db = null;
}
