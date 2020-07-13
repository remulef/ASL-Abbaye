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
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
  <?php
  include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");
  ?>
  <!------ Include the above in your HEAD tag ---------->

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
            <fieldset>
              <legend class="text-center">Contact us</legend>

              <!-- Name input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="name">Name</label>
                <div class="col-md-9">
                  <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                </div>
              </div>

              <!-- Email input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="email">Your E-mail</label>
                <div class="col-md-9">
                  <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                </div>
              </div>

              <!-- Message body -->
              <div class="form-group">
                <label class="col-md-3 control-label" for="message">Your message</label>
                <div class="col-md-9">
                  <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                </div>
              </div>

              <!-- Form actions -->
              <div class="form-group">
                <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</body>


</html>
<!DOCTYPE html>