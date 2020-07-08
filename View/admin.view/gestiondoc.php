<?php session_start();
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
  <link rel="stylesheet" href="gestiondoc.css">

</head>

<body>
  <?php
  include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/templateprofil.php");
  if ($_SESSION['role'][0] == "ADMINISTRATEUR") {
  ?>
    <a href="http://les-asl-abbaye.ovh">
      <svg class="bi-house-door-fill" width="40px" height="40px" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
      </svg>
    </a>
    <main>
      <?php

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


      ?>
      </ul>
    <?php
  } else {
    echo "<p>Vous n'êtes pas connecté en tant qu'Administrateur, veuillez vous authentifier.</p>";
    echo "<a href=\"http://les-asl-abbaye.ovh\">Cliquez ici pour retourner sur la page d'accueil</a>";
  }
    ?>
    </main>
</body>
<?php     include ("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</html>