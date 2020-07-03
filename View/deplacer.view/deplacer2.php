<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Untitled Form</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="deplacer.js"></script>


</head>

<body id="main_body" onload="init()">

	<img id="top" src="top.png" alt="">
	<div id="form_container">

		<h1><a>Deplacer un document</a></h1>
		<form id="form_116623" class="appnitro" method="post" action="">
			<div class="form_description">
				<h2>Untitled Form</h2>
				<p>This is your form description. Click here to edit.</p>
			</div>
			<ul>

				<li id="li_1">
					<label class="description" for="element_1">Titre du document </label>
					<div>
						<input id="element_1" readonly name="element_1" class="element text medium" type="text" maxlength="255" value="" />
					</div>
				</li>
				<li id="li_4">
					<label class="description" for="element_4">Numéro du document </label>
					<div>
						<input id="element_4" readonly name="id_doc" class="element text medium" type="text" maxlength="255" value="" />
					</div>
				</li>
				<li class="section_break">
					<h3>Selecteur de destination</h3>
					<p>Déplacez vous au seins des dossiers jusqu'a la destination de votre choix
						Le dossier courant est en bleu</p>
				</li>

				<li id="li_5">
					<label class="description" for="element_4">Thématique</label>
					<ul id="parcours">
						</ul>
					
				</li>
				<li class="section_break">
					<h3>Destination possible</h3>
					<p>hhhhhhhhhhhhh</p>
				</li>
				<li id="li_6">
					<label class="description" for="element_4">Sous-thématique</label>
					<div id="listdoss">
							<H3>Listes des thématiques </H3>
							<ul id="dossbar">
							</ul>
						</div>
					
				</li>
				
				<li id="li_3">
					<label class="description" for="element_3">Destination </label>
					<div>
						<input id="element_3" readonly name="element_3" class="element text medium" type="text" maxlength="255" value="" />
					</div>
				</li>

				<li class="buttons">
					<input type="hidden" name="form_id" value="116623" />

					<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
				</li>
			</ul>
		</form>
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
</body>

</html>