<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="display.css">
    <title> Listes des documents</title>
</head>

<header>

    <a class="button1" onclick="getback()">
        <svg class="bi bi-arrow-90deg-up" width="1.33em" height="1.33em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.646 6.854a.5.5 0 0 0 .708 0L6 4.207l2.646 2.647a.5.5 0 1 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z" />
            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 0-.5.5v6.5A2.5 2.5 0 0 0 8 13h5.5a.5.5 0 0 0 0-1H8a1.5 1.5 0 0 1-1.5-1.5V4a.5.5 0 0 0-.5-.5z" />
        </svg>
    </a>
    <span>
        <h3>Parcours</h3>
        <ul id="parcours">
        </ul>
    </span>
</header>


<body onload="init()">



    <main class="main">
        <nav class="sidenav">
            <div class="tri">
                <p>Chercher un document</p>
                <input type="text" placeholder="nom du document" onchange="search()">



            </div>
            <a href="">Deplacer</a>
            <a href="">Créer dossier</a>
            <a href="">Proposer document</a>
        </nav>


        <h2 id="pos">Contenue de la thématique : <strong>Ressource Pedagogique</strong></h2>
        <span id="content" class="content">
            <div id="listdoss">
                <H3>Listes des dossiers (fonctionne) </H3>
                <ul id="dossbar">
                </ul>
            </div>

            <div id="listdoc">
                <H3>Listes des documents(fonctionne)</H3>
                <ul id="docbar">
                </ul>
            </div>
        </span>
    </main>

</body>
<script src="display.js"></script>

</html>