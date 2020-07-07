<!DOCTYPE html>
<html lang="fr">
<br><br>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="display.css">
    
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" /> 
    <!--<link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
-->    
    <title> Recherche documents</title>
</head>

<header>
    <?php
    include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/templateprofil.php");
    ?>
    <a href="http://les-asl-abbaye.ovh">
        <svg class="bi-house-door-fill" width="40px" height="40px" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
        </svg>
    </a>


    <div>

        <a class="button1" onclick="getback()">
            <svg class="bi bi-arrow-90deg-up" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.646 6.854a.5.5 0 0 0 .708 0L6 4.207l2.646 2.647a.5.5 0 1 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z" />
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 0-.5.5v6.5A2.5 2.5 0 0 0 8 13h5.5a.5.5 0 0 0 0-1H8a1.5 1.5 0 0 1-1.5-1.5V4a.5.5 0 0 0-.5-.5z" />
            </svg>
        </a>

        <a class="button1" href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/proposer.view/proposer.php">
            <svg width="1.33em" height="1.33em" viewBox="0 0 16 16" class="bi bi-cloud-upload" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
            </svg>
        </a>

        <br>
        <ul id="parcours">
        </ul>
        <div id="listdoss">
            <H3>Listes des thématiques </H3>
            <ul id="dossbar">
            </ul>
        </div>

    </div>
</header>


<body onload="init()">
    <div>
        <a id="hider" onclick="hide()" class="button1" style="margin-left:2em;">
            cacher le panel <br> de tri/recherche <br>
            <svg class="bi bi-arrow-bar-left" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z" />
                <path fill-rule="evenodd" d="M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z" />
            </svg>
        </a>


    <main class="main">

    <div id="sortpanel" style="display: block;">
            <form>

                <label class="description" for="element_8">Lieu de recherche (cliquer à droite des cases)</label>

                <a data-tooltip="La recherche sera effectuée soit dans la totalité des documents disponibles soit dans le dossier où vous vous situez actuellement" style="padding: 5px;border: none;background: none;">
                    <svg class="bi bi-question-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>
                </a>
                <input type="checkbox" checked id="id-name--1" name="set-name" class="switch-input" oninput="careful()">

                <label for="id-name--1" class="switch-label">
                    <span class="toggle--on">BDD</span>
                    <span class="toggle--off">Thématique</span></label>

                <hr>

                <label class="description" for="element_1">Rechercher par nom </label>
                <div style="float: left;">
                    <input onblur="search(this)" id="element_1" name="docname" class="element text large" type="search" maxlength="255" value="" placeholder="Recherche par nom" />
                    <hr>
                </div>
                <br><br><br><br>


                <label class="description" for="element_7">Type de ressource </label>
                <span>
                    <input id="element_7_2" name="element_7_2" oninput="search(this)" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_7_2">Fiche pédagogique</label>
                    <input id="element_7_3" name="element_7_3" class="element checkbox" oninput="search(this)" type="checkbox" value="1" />
                    <label class="choice" for="element_7_3">Jeux </label>
                    <input oninput="search(this)" id="element_7_4" name="element_7_4" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_7_4">Doc authentique</label>
                    <input id="element_7_5" oninput="search(this)" name="element_7_5" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_7_5">video/site internet/mp3</label>
                    <input id="element_7_7" oninput="search(this)" name="element_7_7" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_7_6">exos/activités</label>
                </span>

                <hr>
                <label class="description" for="element_5">Format de document </label>
                <span>
                    <input id="element_5_1" oninput="search(this)" name="element_5_1" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_5_1">PDF</label>
                    <input id="element_5_2" name="element_5_2" oninput="search(this)" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_5_2">Image (jpeg/png/gif/..)</label>
                    <input id="element_5_3" name="element_5_3" class="element checkbox" oninput="search(this)" type="checkbox" value="1" />
                    <label class="choice" for="element_5_3">Audio (mp3/aac/..)</label>
                    <input oninput="search(this)" id="element_5_4" name="element_5_4" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_5_4">Video (mp4/mpeg,..)</label>
                    <input id="element_5_5" oninput="search(this)" name="element_5_5" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_5_5">Texte (docx/doc/txt..)</label>
                    <input id="element_5_6" oninput="search(this)" name="element_5_6" class="element checkbox" type="checkbox" value="1" />
                    <label class="choice" for="element_5_6">Diaporama (pptx,..)</label>
                    <hr>
                    <label class="description" for="element_1">Recherche par étiquette</label>
                    <div>
                        <input list="format" id="element_1" name="element_1" onblur="search(this)" class="element text large" type="search" maxlength="255" value="" placeholder="&#128269; exemple : verbe+present" />
                        <a data-tooltip="Séparez les étiquettes par des signes + si il y en a plusieurs" style="padding: 0;border: none;background: none; margin: 49%;">
                            <svg class="bi bi-question-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                            </svg>
                        </a>

                    </div>
                </span>
                <hr>
                <label class="description" for="element_3">Niveau </label>
                <span>
                    <input id="element_3_1" name="element_3_1" class="element checkbox" type="checkbox" oninput="search(this)" value="1" />
                    <label class="choice" for="element_3_1">Tous Niveaux</label>
                    <input id="element_3_2" name="element_3_2" class="element checkbox" type="checkbox" oninput="search(this)" value="1" />
                    <label class="choice" for="element_3_2">Découverte</label>
                    <input id="element_3_3" name="element_3_3" class="element checkbox" type="checkbox" oninput="search(this)" value="1" />
                    <label class="choice" for="element_3_3">Exploration</label>
                    <input id="element_3_4" name="element_3_4" class="element checkbox" type="checkbox" oninput="search(this)" value="1" />
                    <label class="choice" for="element_3_4">Approfondissement</label>
                </span>
                <hr>
                <label class="description" for="element_4">Trier par </label>
                <span>

                    <input id="element_4_1" name="element_4" class="element radio" checked type="radio" oninput="search(this)" value="1" />
                    <label class="choice" for="element_4_1">Alphabétique croissant</label>
                    <input id="element_4_2" name="element_4" class="element radio" type="radio" oninput="search(this)" value="2" />
                    <label class="choice" for="element_4_2">Alphabétique décroissant</label>
                    <input id="element_4_3" name="element_4" class="element radio" type="radio" oninput="search(this)" value="1" />
                    <label class="choice" for="element_4_3">Popularité croissante</label>
                    <input id="element_4_4" name="element_4" class="element radio" type="radio" oninput="search(this)" value="2" />
                    <label class="choice" for="element_4_4">Popularité décroissante</label>

                </span>
                <hr>
                <label class="description" for="element_6">Option </label>
                <span>
                    <input id="element_6_1" name="element_6_1" class="element checkbox" type="checkbox" oninput="search(this)" value="1" />
                    <label class="choice" for="element_6_1">TEF/ANF</label>
                    <input id="element_6_2" name="element_6_2" class="element checkbox" type="checkbox" oninput="search(this)" value="1" />
                    <label class="choice" for="element_6_2">Niveau ALPHA</label>

                </span>
                <hr>
                <input style="margin: 1%;width: 98%;" type="reset" value="Vider le formulaire">
            </form>
        </div>
    </div>


        <img style="display:none" src="http://les-asl-abbaye.ovh/ASL-Abbaye/data/img/presentation.png" id="presentation" alt="organisation de ressource pedagogique">


        <span id="content" class="content">

            <div id="listdoc">
                <H3 id="h3doc">Liste des documents</H3>
                <p style=" justify-content: center; font-size:1.5em;">Vous pouvez rechercher dans l'ensemble de la Base de données à partir du pavé de recherche à gauche OU rechercher par thématiques à partir des capsules ci-dessus</p>
                <ul id="docbar">
                </ul>
            </div>
        </span>
    </main>
</body>

<?php //include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Optional JavaScript -->
<script src="display.js"></script>
<script>
    $(document).keypress(function(e) {
        if (e.which == 13) {
            search();
        }
    });
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
-->

</html>