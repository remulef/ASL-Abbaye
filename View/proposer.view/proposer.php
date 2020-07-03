<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Proposer un document</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" />
	<script type="text/javascript" src="view.js"></script>

</head>

<body id="main_body">
	 <a href="http://les-asl-abbaye.ovh">
		 <svg class="bi-house-door-fill" width="40px" height="40px" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
			 <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
			 <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		 </svg>
	 </a>
	<div id="form_container">

		<h1><a>Proposer un document</a></h1>
		<form id="form_116196" class="appnitro" enctype="multipart/form-data" method="post" action="traitement-proposer.php">
			<div class="form_description">
				<p>Ce formulaire nous aidera à traiter au mieux le document que vous nous proposez</p>
			</div>
			<ul>

				<li id="li_2">
					<label class="description" for="element_2">Titre </label>
					<div>
						<input required id="element_2" name="titre" class="element text medium" type="text" maxlength="255" value="" />
					</div>
					<p class="guidelines" id="guide_2"><small>Titre de votre document</small></p>
				</li>
				<li id="li_3">
					<label class="description" for="element_3">Description </label>
					<div>
						<textarea required id="element_3" name="description" class="element textarea medium"></textarea>
					</div>
					<p class="guidelines" id="guide_3"><small>Description rapide de votre document.
							En quoi est-ce une bonne ressource pédagogique ? </small></p>
				</li>
				<li id="li_1">
					<label class="description" for="element_1">Upload a File </label>
					<div>
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

						<input required id="element_1" name="fileToUpload" class="element file" type="file" />
					</div>
					<p class="guidelines" id="guide_1"><small>Formats possibles : image/audio/.doc/.docx/.pdf/.odt/.odp/.ppt/.pptx

							Taille maximale par fichier : 5Mo </small></p>
				</li>
				<li id="li_4">
					<label class="description" for="element_4">Etiquettes </label>
					<div>
						<input required id="element_4" name="tags" class="element text medium" type="text" maxlength="255" value="" />
					</div>
					<p class="guidelines" id="guide_4"><small>Séparer les étiquettes par des caractères "+"
							Ces etiquettes nous aideront à mieux rechercher votre document si nous ajoutons celui-ci à notre base </small></p>
				</li>
				<!--
				<li id="li_5">
					<label class="description" for="element_5">Email </label>
					<div>
						<input id="element_5" name="mail" class="element text medium" type="text" maxlength="255" value="" />
					</div>
				</li>
				-->
				<li class="buttons">
					<input type="hidden" name="form_id" value="116196" />
					<input type="reset" value="Reinitialiser">
					<input id="saveForm" class="button_text" type="submit" name="submit" value="Proposer" />
				</li>
			</ul>
		</form>
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<footer>
		<a class="Contact" href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/contact.view/contact.php">Contact</a>
		<a href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/RGPD.pdf" onclick = "window.open(this.href); return false;" >Mentions Légales</a>
		<img id="logos" src="http://les-asl-abbaye.ovh/ASL-Abbaye/data/img/Logos.PNG" alt="Logos des Financeurs" width="20%" height="10%">
	</footer>
</body>

</html>
