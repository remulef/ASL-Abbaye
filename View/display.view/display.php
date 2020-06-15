<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="display.css">
    <title> Listes des documents</title>
</head>


<body onload="init()">
    <nav class="sidenav">
        <div class="tri">
            <p>Chercher un document</p>
            <input type="text" placeholder="nom du document" onchange="search()">



        </div>
        <a href="">Deplacer</a>
        <a href="">Créer dossier</a>
        <a href="">Proposer document</a>
    </nav>



    <main class="main">
        <h2>Contenue de la thématique : <strong>Ressource Pedagogique</strong></h2>
        <span id="content" class="content">
            <div id="listdoss">
                <H3>Listes des dossiers</H3>
                <ul id="dossbar">
                </ul>
            </div>

            <div id="listdoc">
                <H3>Listes des documents</H3>
                <ul id="docbar">
                </ul>
            </div>
        </span>
    </main>

</body>
<script src="display.js"></script>

</html>