<?php session_start();
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="document.view.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" /> 
    <title>Document ASL Abbaye</title>
</head>

<header>
  <?php
   include ("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/templateprofil.php");
   ?>
     
        <div>
            <h3>Changer de document</h3>
            <a href="http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=<?php echo  $_GET["id_doc"] - 1 ?>" class="previous round">
                <svg class="bi bi-arrow-left-circle" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z" />
                    <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z" />
                </svg></a>
            <a href="http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=<?php echo  $_GET["id_doc"] + 1 ?>" class="next round">
                <svg class="bi bi-arrow-right-circle" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                    <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z" />
                </svg></a>
        </div>



    </header>




    <?php
    if (empty($_GET['id_doc'])) {
        $id_doc = random_int(1, 1000);
        echo "<body onload=\"init(" . $id_doc . ")\">";
    } else {
        $id_doc = $_GET['id_doc'];
        echo "<body onload=\"init(" . $id_doc . ")\">";
    }
    ?>

    <main>

        <div id="Content">

            <div id="media">

            </div>

                <?php if ($_GET["mode"] == "admin") echo '
                <div class="tooltip">
                    <button type="button" id="supprimer" onclick="supprimer()" disabled>
                        <svg class="bi bi-trash" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd" />
                        </svg>
                        <span class="tooltiptext">Supprimer le document</span>
                    </button>
                </div>
                <div class="tooltip">
                    <button type="button" id="modifier" onclick="modifier()">
                        <svg class="bi bi-pencil-square" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <span class="tooltiptext">Modifier le document</span>
                </div>' ?>

            <div id="icontitre">
                <div id="titre">
                    <h1 id="titreh1"> TITRE </h1>
                </div>
                <div id="icon">


                    <div class="tooltip">
                        <a id="telecharger" onclick="popu()" href="">
                            <button type="button">
                                <svg class="bi bi-download" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.5 8a.5.5 0 01.5.5V12a1 1 0 001 1h12a1 1 0 001-1V8.5a.5.5 0 011 0V12a2 2 0 01-2 2H2a2 2 0 01-2-2V8.5A.5.5 0 01.5 8z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M5 7.5a.5.5 0 01.707 0L8 9.793 10.293 7.5a.5.5 0 11.707.707l-2.646 2.647a.5.5 0 01-.708 0L5 8.207A.5.5 0 015 7.5z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 1z" clip-rule="evenodd" />
                                </svg>
                                <span class="tooltiptext">Telecharger le document</span>
                            </button></a>
                    </div>

                    <div class="tooltip" id="divinput">


                        <button type="button" id="copy" onclick="myFunction()" onmouseout="outFunc()">
                            <svg class="bi bi-link-45deg" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.715 6.542L3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.001 1.001 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                <path d="M5.712 6.96l.167-.167a1.99 1.99 0 0 1 .896-.518 1.99 1.99 0 0 1 .518-.896l.167-.167A3.004 3.004 0 0 0 6 5.499c-.22.46-.316.963-.288 1.46z" />
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 0 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 0 0-4.243-4.243L6.586 4.672z" />
                                <path d="M10 9.5a2.99 2.99 0 0 0 .288-1.46l-.167.167a1.99 1.99 0 0 1-.896.518 1.99 1.99 0 0 1-.518.896l-.167.167A3.004 3.004 0 0 0 10 9.501z" />
                            </svg>

                            <span class="tooltiptext" id="myTooltip">Copier le lien</span>
                        </button>
                    </div>


                </div>
            </div>

            <div id="description">

                <p></p>


            </div>

            <div id="divtag">


                <h2>Etiquettes du document</h2>
                <ul class="tags" id="tags" onload="AJAXgettag()">
                </ul>
            </div>

            <script src="test.js"></script>





        </div>
        <!-- Insipirée de https://codepen.io/leenalavanya/pen/YqGeoz et modifier pour convenir a nos besoin -->
        <div id="chat">
            <div class="chat_header">Commentaires</div>
            <div id="chat_s"></div>
            <script type="text/javascript">
                var submitted = false;
            </script>
            <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;" onload="if(submitted){add()}"></iframe>
            <form id="ss-form" onsubmit="submitted=true" action="https://docs.google.com/forms/d/1-PRLoHTtgldV5cNTvmVyjf-rf1p1kLhzKGXn2i1XGhQ/formResponse" method="POST" target="hidden_iframe">
                <input name="Nom" type="text" value="" id="entry_name" placeholder="Votre nom">
                <input name="entry.1732478127" title="" class="ss-q-short" id="entry_comment" dir="auto" aria-label="Message  " type="text" value="" placeholder="Votre commentaire">
                <input name="draftResponse" type="hidden" value='[,,"-2195881827543510175"]&#10;'>
                <input name="pageHistory" type="hidden" value="0">
                <input name="fvv" type="hidden" value="0">
                <input name="fbzx" type="hidden" value="-2195881827543510175">

                <input name="submit" class="jfk-button jfk-button-action " id="ss-submit" type="submit" value="Commenter" onClick="return check()">
            </form>

        </div>





    </main>

    <script src="document.view.js"></script>

</body>

</html>
