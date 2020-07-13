<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Nous contacter</title>
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/bootstrap-forms-button.css" />

</head>

<body>
  <?php
  include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");
  ?>

  <main>
    <div id="form_container">

      <h1><a>Nous contacter</a></h1>
      <form id="form_117718" class="appnitro" method="post" action="/formbuilder/view.php">
        <div class="form_description">
          <h2>Nous contacter</h2>
          <p>Nous avons hâte de vous lire
            Ce message sera envoyé à asl.abbaye@grenoble.fr</p>
        </div>
        <ul>

          <li id="li_1">
            <label class="description" for="element_1">Nom </label>
            <div>
              <input id="element_1" name="element_1" class="element text medium form-control" type="text" maxlength="255" value="" />
            </div>
            <p class="guidelines" id="guide_1"><small>Votre nom ou pseudonyme
              </small></p>
          </li>
          <li id="li_2">
            <label class="description" for="element_2">Email </label>
            <div>
              <input id="element_2" name="element_2" class="element text medium form-control" type="text" maxlength="255" value="" />
            </div>
            <p class="guidelines" id="guide_2"><small>Cette adresse mail nous permettrons de vous répondre si besoin</small></p>
          </li>
          <li id="li_3">
            <label class="description" for="element_3">Votre message </label>
            <div>
              <textarea id="element_3" name="element_3" class="element textarea medium form-control"></textarea>
            </div>
          </li>

          <li class="buttons">
          	<input type="hidden" name="form_id" value="116196" />
						<input id="saveForm" class=" btn btn-primary" type="submit" name="submit" value="Envoyé" />
						<input type="reset" class=" btn btn-primary" value="Reinitialiser">
					          </li>
        </ul>
      </form>
      <div id="footer">
        Generated by <a href="http://www.phpform.org">pForm</a>
      </div>
    </div>

  </main>
  <?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</body>


</html>
<!DOCTYPE html>