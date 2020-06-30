<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Saisir un compte-rendu</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="calendar.js"></script>
</head>

<body id="main_body">

	<img id="top" src="top.png" alt="">
	<div id="form_container">

		<h1><a>Saisir un compte-rendu</a></h1>
		<form id="form_116357" class="appnitro" enctype="multipart/form-data" method="post" action="">
			<div class="form_description">
				<h2>Saisir un compte-rendu</h2>
				<p>Outil de saisit de compte rendu</p>
			</div>
			<ul>

				<li id="li_1">
					<label class="description" for="element_1">Titre </label>
					<div>
						<input id="element_1" name="titre" class="element text medium" type="text" maxlength="255" value="" />
					</div>
					<p class="guidelines" id="guide_1"><small>Titre de votre compte rendu</small></p>
				</li>
				<li id="li_2">
					<label class="description" for="element_2">Auteur </label>
					<div>
						<input id="element_2" name="auteur" class="element text medium" type="text" maxlength="255" value="" />
					</div>
					<p class="guidelines" id="guide_2"><small>Votre nom</small></p>
				</li>
				<li id="li_3">
					<label class="description" for="element_3">Date du compte-rendu </label>
					<input type="date" name="date" required="required" /><br>
					<span>
						<p class="guidelines" id="guide_3"><small>Date effective du compte rendu </small></p>
				</li>
				<li id="li_4">
					<label class="description" for="editeur">Compte-rendu </label>
					<div>
						<textarea id="editeur" name="editeur" class="element textarea large"></textarea>
					</div>
				</li>
				<li id="li_5">
					<label class="description" for="element_5">Fichier rattaché </label>
					<div>

						<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
						<input id="element_5" name="element_5" class="element file" type="file" name="fileToUpload[]" multiple="multiple" accept="image/*,audio/*,.doc,.docx,.pdf,.odt,.odp,.ppt,.pptx" />
					</div>
					<p class="guidelines" id="guide_5"><small>Fichier lié au compte rendu

							Format possible : image/audio/.doc/.docx/.pdf/.odt/.odp/.ppt/.pptx

							Nombre de fichier maximum : 5

							Taille maximal par fichier : 5Mo

							Veillez a nommé vos fichiers correctement </small></p>
				</li>

				<li class="buttons">
					<input type="hidden" name="form_id" value="116357" />

					<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
				</li>
			</ul>
		</form>

		<script>
			CKEDITOR.replace('editeur');
		</script>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
</body>


</html>