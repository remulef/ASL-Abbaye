<?php session_start();
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Gestion des documents</title>
  <link rel="stylesheet" href="css/view.css">
  <link rel="stylesheet" href="gestiondoc.css">	
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/bootstrap-forms-button.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />

</head>

<body>
  
  
    <?php
    include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");
    echo '<main style="margin: 5em;">';
    if ($_SESSION['role'] == "ADMINISTRATEUR") {

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
      $sth = $db->prepare('SELECT * from DOCUMENT where tmp= true;');
      $sth->execute();
      $res = $sth->fetchAll(PDO::FETCH_ASSOC);
      ((count($res) > 0) ? $alert = count($res) . "<h1>Document en attente de validation</h1>" : $alert = "<h1>Aucun Document en attente de validation</h1>");
      echo $alert;
      echo "<ul>";
      foreach ($res as $key => $value) {
        echo "<li>
        <img src=\"http://placehold.it/200x120\">
        <h3>" . $value["nom"] . "</h3>
        <p class='price'>" . $value["typedoc"] . "</p> 
        <a href='http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.admin.php?id_doc=" . $value["id_doc"] . "'>
        Ouvrir</a>
        </li>";
      }
      echo '</ul>';
    }else {
      header("Location : http://les-asl-abbaye.ovh");
    }
    ?>
</header>
  </main>
  <?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</body>

</html>