<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Saisir un compte-rendu</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" />
	<script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="calendar.js"></script>
</head>

<body id="main_body">
	<?php
		include ("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/templateprofil.php");
		if(isset($_SESSION['role'])){
	?>
	<a href="http://les-asl-abbaye.ovh">
	<svg class="bi-house-door-fill" width="40px" height="40px" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
		<path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
		<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
	</svg>
	</a>
	<!-- <img id="top" src="top.png" alt=""> -->
	<div id="form_container">
		<form id="form_116357" class="appnitro" enctype="multipart/form-data" method="post" action="CR_traitement.php">
			<div class="form_description">
				<h2>Saisir un compte-rendu</h2>
				<p>Outil de saisie de compte-rendu</p>
			</div>
			<ul>

				<li id="li_1">
					<label class="description" for="element_1">Titre </label>
					<div>
						<input id="element_1" name="titre" class="element text medium" type="text" maxlength="255" value="" />
					</div>
					<p class="guidelines" id="guide_1"><small>Titre de votre compte-rendu</small></p>
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
						<p class="guidelines" id="guide_3"><small>Date effective du compte-rendu </small></p>
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
					<!--
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
						<input id="element_5" name="fileToUpload[]" class="element file" type="file" multiple="multiple" accept="image/*,audio/*,.doc,.docx,.pdf,.odt,.odp,.ppt,.pptx" />
						-->
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
						<input type="file" name="fileToUpload[]" multiple="multiple" accept="image/*,audio/*,.doc,.docx,.pdf,.odt,.odp,.ppt,.pptx">

					</div>
					<p class="guidelines" id="guide_5"><small>Fichier lié au compte-rendu

							Format possible : image/audio/.doc/.docx/.pdf/.odt/.odp/.ppt/.pptx

							Nombre de fichiers maximum : 5

							Taille maximale par fichier : 5Mo

							Veillez à nommer vos fichiers correctement </small></p>
				</li>

				<li class="buttons">
				<!--	<input type="hidden" name="form_id" value="116357" /> -->

					<input id="saveForm" class="button_text" type="submit" name="submit" value="Ajouter" />
				</li>
			</ul>
		</form>

		<script>
			CKEDITOR.replace('editeur');
		</script>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</div>
	<footer>
		<a class="Contact" href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/contact.view/contact.php">Contact</a>
		<a href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/RGPD.pdf" onclick = "window.open(this.href); return false;" >Mentions Légales</a>
		<img id="logos" src="../../data/img/Logos.PNG" alt="Logos des Financeurs" width="20%" height="10%">
	</footer>
	<?php
		}else{
			echo "<p>Vous n'êtes pas connecté, veuillez vous authentifier.</p>";
			echo "<a href=\"http://les-asl-abbaye.ovh\">Cliquez ici pour retourner sur la page d'accueil</a>";
		}
	 ?>
</body>


</html>
