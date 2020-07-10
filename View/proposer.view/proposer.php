<?php session_start();
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Proposer un document</title>
<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
	
	<link rel="stylesheet" type="text/css" href="view2.css" media="all">
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />

	<!--	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body id="main_body">
	<?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php"); ?>
	<main>
		<div id="form_container">

			<h1><a>Proposer un document</a> </h1>
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
						<p class="guidelines" id="guide_1"><small>Formats possibles : image/audio/.doc/.docx/.pdf/.odt/.odp/.ppt/.pptx/.xls

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
	</main>
	<?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</body>

</html>