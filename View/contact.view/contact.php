<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />

  </head>
  <body>
    <?php
      include ("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/templateprofil.php");
    ?>
    <a href="http://les-asl-abbaye.ovh">
      <svg class="bi-house-door-fill" width="40px" height="40px" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
      </svg>
    </a>
    <h1 class="az">Nous contacter</h1>
    <form action="mailto:asl.abbaye@grenoble.fr" method="post" enctype="text/plain">

      <p id="J">Votre Message : </p><textarea required cols="50" rows="30" type="text" name="Message" value=""></textarea>
<br> <br>
      <input type="reset" name="" value="Réinitialiser">
      <input type="submit" name="" value="Envoyer">
      <p>Ce message sera envoyé à :</p>
      <p id="Ju">asl.abbaye@grenoble.fr</p>
    </form>
    <footer><img id="logos" src="../../data/img/Logos.PNG" alt="Logos des Financeurs" width="20%" height="10%"></footer>
  </body>

  <?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</html>
.<!DOCTYPE html>
