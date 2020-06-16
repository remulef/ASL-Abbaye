<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="display.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Recherche documents</title>
</head>

<header>


    <div>

        <a class="button1" onclick="getback()">
            <svg class="bi bi-arrow-90deg-up" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.646 6.854a.5.5 0 0 0 .708 0L6 4.207l2.646 2.647a.5.5 0 1 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z" />
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 0-.5.5v6.5A2.5 2.5 0 0 0 8 13h5.5a.5.5 0 0 0 0-1H8a1.5 1.5 0 0 1-1.5-1.5V4a.5.5 0 0 0-.5-.5z" />
            </svg>
        </a>
        <br>
        <ul id="parcours">
        </ul>
        <div id="listdoss">
            <H3>Listes des dossiers </H3>
            <ul id="dossbar">
            </ul>
        </div>

    </div>
</header>


<body onload="init()">
    <div id="sortpanel">
            <ul>

                <li id="li_2">
                    <label class="description" for="element_2">Rechercher dans </label>
                    <span>
                        <input id="element_2_1" name="element_2" class="element radio" type="radio" value="1" />
                        <label class="choice" for="element_2_1">Toute la base de données</label>
                        <input id="element_2_2" name="element_2" class="element radio" type="radio" value="2" />
                        <label class="choice" for="element_2_2">Dossier et sous dossier courant</label>

                    </span>
                </li>
                <li id="li_1">
                    <label class="description" for="element_1">Rechercher </label>
                    <div>
                        <input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="" />
                    </div>
                    <p class="guidelines" id="guide_1"><small>Saisir nom du document</small></p>
                </li>
                <li id="li_5">
                    <label class="description" for="element_5">Format du document </label>
                    <span>
                        <input id="element_5_1" name="element_5_1" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_1">PDF</label>
                        <input id="element_5_2" name="element_5_2" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_2">Image (jpeg/png/gif/..)</label>
                        <input id="element_5_3" name="element_5_3" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_3">Audio (mp3/aac/..)</label>
                        <input id="element_5_4" name="element_5_4" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_4">Video (mp4/mpeg,..)</label>
                        <input id="element_5_5" name="element_5_5" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_5">Text (docx/doc/txt..)</label>
                        <input id="element_5_6" name="element_5_6" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_6">Diaporama (pptx,..)</label>
                        <input id="element_5_7" name="element_5_7" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_5_7">Autre</label>

                    </span>
                </li>
                <li id="li_3">
                    <label class="description" for="element_3">Niveau </label>
                    <span>
                        <input id="element_3_1" name="element_3_1" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_3_1">ALPHA</label>
                        <input id="element_3_2" name="element_3_2" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_3_2">D</label>
                        <input id="element_3_3" name="element_3_3" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_3_3">E</label>
                        <input id="element_3_4" name="element_3_4" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_3_4">A</label>
                        <input id="element_3_5" name="element_3_5" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_3_5">Pas de niveau</label>

                    </span>
                </li>
                <li id="li_4">
                    <label class="description" for="element_4">Trier par </label>
                    <span>
                        <input id="element_4_1" name="element_4" class="element radio" type="radio" value="1" />
                        <label class="choice" for="element_4_1">Alphabétique croissant</label>
                        <input id="element_4_2" name="element_4" class="element radio" type="radio" value="2" />
                        <label class="choice" for="element_4_2">Alphabétique décroissant</label>

                    </span>
                </li>
                <li id="li_6">
                    <label class="description" for="element_6">Option </label>
                    <span>
                        <input id="element_6_1" name="element_6_1" class="element checkbox" type="checkbox" value="1" />
                        <label class="choice" for="element_6_1">TEF/ANF</label>

                    </span>
                </li>

                <li class="buttons">
                    <input type="hidden" name="form_id" value="114662" />

                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                </li>
            </ul>
        
        <div id="footer">
            Generated by <a href="http://www.phpform.org">pForm</a>
        </div>
    </div>
    <main class="main">
        <span id="content" class="content">

            <div id="listdoc">
                <H3>Listes des documents</H3>
                <ul id="docbar">
                </ul>
            </div>
        </span>
    </main>

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="display.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>