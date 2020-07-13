<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="style.css">	
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/bootstrap-forms-button.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />

  </head>
  <body>
    <?php
      include ("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");
    ?>
    <h1 class="az">Nous contacter</h1>
    <form action="mailto:asl.abbaye@grenoble.fr" method="post" enctype="text/plain">

      <p id="J">Votre Message : </p>
      <textarea required cols="50" class="form-control" rows="30" type="text" name="Message" value="">
      </textarea>
      <input type="submit" class="btn btn-primary" name="" value="Envoyer">
      <input type="reset" class="btn btn-primary" name="" value="Réinitialiser">
      <p>Ce message sera envoyé à :</p>
      <p id="Ju">asl.abbaye@grenoble.fr</p>
    </form>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

  </body>


</html>
<!DOCTYPE html>
