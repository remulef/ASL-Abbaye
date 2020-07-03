<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Document en attente de validation</h1>
<ul>
<?php

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
    $sth = $db->prepare('SELECT * from DOCUMENT where tmp= true ;');
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
  

    foreach ($res as $key => $value) {
        echo "<li> <a href='http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.admin.view.php?id_doc=".$value["id_doc"]."'>
        ".$value["nom"]."</a></li>";
    }
?>
</ul>
    
</body>
</html>