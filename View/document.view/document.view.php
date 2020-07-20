<?php session_start();
$id_doc = $_GET["id_doc"];

if (isset($_SESSION['role']) && ($_SESSION['role'] == "ADMINISTRATEUR" || $_SESSION['role'] == "MODERATEUR"
    || $_SESSION['role'] == "BENEVOLE ABBAYE")) {
    $url = "Location: " . "http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.admin.php?id_doc=" . $id_doc;
    header($url);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="document.view.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/header.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/footer.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-forms.css" />
    <link rel="icon" type="image/png" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/img/logoasl.ico" />

    <title>Document ASL Abbaye</title>
</head>
<?php
$id_doc = $_GET['id_doc'];
echo '<body onload="init(' . $id_doc . ')">';
?>
<?php
include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/header.php");
?>

<main class="container">
    <div class="row">
        <div id="Content" class="col-sm-8">

            <div id="media">

            </div>


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
                <p>
                </p>
            </div>
            <div id="divtag">
                <h2>Etiquettes du document</h2>
                <ul class="tags " id="tags" onload="AJAXgettag()">
                </ul>
            </div>

        </div>
        <!-- Insipirée de https://codepen.io/leenalavanya/pen/YqGeoz et modifier pour convenir a nos besoin -->
        <div id="chat" class="col-sm-4" style="padding-left: 0px;padding-right: 0px;">
            <div class="chat_header"> <strong>Espace commentaire </strong></div>
            <div id="chat_s"></div>
            <script type="text/javascript">
                var submitted = false;
            </script>
            <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;" onload="if(submitted){add()}"></iframe>
            <form id="ss-form" onsubmit="submitted=true" action="https://docs.google.com/forms/d/1-PRLoHTtgldV5cNTvmVyjf-rf1p1kLhzKGXn2i1XGhQ/formResponse" method="POST" target="hidden_iframe">
                <input name="Nom" class="form-control" type="text" value="" id="entry_name" placeholder="Votre nom">
                <input name="entry.1732478127" title="" class="ss-q-short form-control" id="entry_comment" dir="auto" aria-label="Message  " type="text" value="" placeholder="Votre commentaire">

                <input name="draftResponse" type="hidden" value='[,,"-2195881827543510175"]&#10;'>
                <input name="pageHistory" type="hidden" value="0">
                <input name="fvv" type="hidden" value="0">
                <input name="fbzx" type="hidden" value="-2195881827543510175">
                <input name="submit" class="jfk-button jfk-button-action btn btn-primary" id="ss-submit" type="submit" value="Commenter" onClick="return check()">
                <input name="reset" class="jfk-button jfk-button-action btn btn-primary" id="ss-reset" type="reset" value="Réinitialiser" onClick="">
            </form>

        </div>
    </div>
</main>
<script src="document.view.js"></script>

<?php include("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/footer_template.php"); ?>

</body>

</html>