<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Accueil Abbaye</title>
  <link rel="stylesheet" type="text/css" media="screen" href="main'.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/bootstrap-forms-button.css" />

</head>

<body>
<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");    ?>
 <main>
 
  <h1>Bienvenue sur la base de données pédagogique des Ateliers Socio-Linguistiques de l'Abbaye</h1>
 
    <!--style="float:left"-->
    <div class="container" style="margin-top: 80px;">
      <div class="row">
        <div class="col-xs-5">

          <div class="dropdown">
            <button class="dropbtn">Consulter</button>
            <div class="dropdown-content">
              <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php">Outils d'Évaluation</a>
              <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php">Ressources Pédagogiques</a>
              <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php">Actualités / Informations des ASL</a>
              <?php
              if (isset($_SESSION['role'])) {
                echo "<a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php\">Réalisations Apprenants</a>";
                echo "<a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php\">Comptes-Rendus</a>";
              }
              ?>
            </div>
          </div>
        </div>

        <div class="col-xs-2">

        </div>
        <!--style="float:right"-->
        <div class="col-xs-5">
          <div class="dropdown">
            <button class="dropbtn">Contribuer</button>
            <div class="dropdown-content" id="id">
              <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/proposer.view/proposer.php">Proposer un Document</a>
              <?php
              if (isset($_SESSION['role'])) {
                echo "<a href=\"http://les-asl-abbaye.ovh/ASL-Abbaye/View/saisir.view/saisir.php\">Saisir un Compte-Rendu</a>";
              }

              ?>
              <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/contact.view/contact.php">Nous contacter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>


</body>

</html>
