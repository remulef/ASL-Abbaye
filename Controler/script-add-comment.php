<?php



//if(isset( $_POST['id_doc'])){
if (true) {

    $data = $_POST['data'];


    //On ouvre la base de donnée
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
    $nom = $data->nom;
    $commentaire = $data->comment;
    $today = getdate();
    $mon = $today['mon'];
    $mon +=1;
    $date = $today['year']."/".$mon."/".$today['mday'];



    $sth = $db->prepare('INSERT INTO  COMMENTAIRE (id_doc,auteur,commentaire,datepub)VALUES(?,?,?,?)');
    $sth->bindParam(1, $id_doc);
    $sth->bindParam(2, $nom);
    $sth->bindParam(3, $commentaire);
    $sth->bindParam(4, $date);
    $sth->execute();
   


    $db = null;
}
