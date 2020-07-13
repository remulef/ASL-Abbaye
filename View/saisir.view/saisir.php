<?php session_start();

$id_doc = $_GET["id_doc"];
$allowed = array("ADMINISTRATEUR", "MODERATEUR", "BENEVOLE ABBAYE");


if (!in_array($_SESSION['role'], $allowed)) {
	header("location: http://les-asl-abbayes.ovh");
}

//var_dump($_SESSION);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Saisir un compte-rendu</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/bootstrap-forms-button.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
</head>

<body id="main_body">
	<?php
	include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");

	?>
	<main>
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
							<input id="element_1" name="titre" class="element text medium form-control" type="text" maxlength="255" value="" />
						</div>
						<p class="guidelines" id="guide_1"><small>Titre de votre compte-rendu</small></p>
					</li>
					<li id="li_2">
						<label class="description" for="element_2">Auteur </label>
						<div>
							<input id="element_2" name="auteur" class="element text medium form-control" type="text" maxlength="255" value="<?php echo $_SESSION["username"] ?>" />
						</div>
						<p class="guidelines" id="guide_2"><small>Votre nom</small></p>
					</li>
					<li id="li_3">
						<label class="description" for="element_3">Date du compte-rendu </label>
						<input type="date" name="date" class="element text medium form-control" required="required" /><br>
						<span>
							<p class="guidelines" id="guide_3"><small>Date effective du compte-rendu </small></p>
					</li>
					<li id="li_4">
						<label class="description" for="">Compte-rendu </label>
						<div>
							<textarea id="editeur" name="editeur" class="element textarea large  form-control"></textarea>
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
							<input type="file" name="fileToUpload[]" multiple="multiple" class=" form-control" accept="image/*,audio/*,.doc,.docx,.pdf,.odt,.odp,.ppt,.pptx">

						</div>
						<p class="guidelines" id="guide_5"><small>Fichier lié au compte-rendu

								Format possible : image/audio/.doc/.docx/.pdf/.odt/.odp/.ppt/.pptx

								Nombre de fichiers maximum : 5

								Taille maximale par fichier : 5Mo

								Veillez à nommer vos fichiers correctement </small></p>
					</li>

					<li class="buttons">
							<input type="hidden" name="form_id" value="116357" /> 
						<input id="saveForm" class=" btn btn-primary" type="submit" name="submit" value="Ajouter" />
						<input type="reset" class=" btn btn-primary" value="Reinitialiser">
					</li>
				</ul>
			</form>

			<script>
				CKEDITOR.replace('editeur');
			</script>
			<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		</div>
	</main>
</body>

<?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</html>