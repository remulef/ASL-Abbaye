<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisir compte rendu </title>
    <script src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <h1>Redaction de compte rendu </h1>
    <form action="test.php" method="post" enctype="multipart/form-data">
    
        <label for="">Titre du compte-rendu :</label>
        <input type="text" name="titre" value="test" required="required" /><br>
        <label for="">Nom de l'auteur:</label>
        <input type="text" name="auteur" value="testeur" required="required" /><br>
        <label for="">date du compte-rendu :</label>
        <input type="date" name="date" value="14/01/2015" required="required" /><br>
         <!--
        <label for="">Saisit du compt-rendu  :</label>
        <textarea name="editeur" id="editeur" value=" test" rows="8" cols="80"></textarea>
        <label for="">Fichier lié au compte rendu</label>
        MAX_FILE_SIZE doit précéder le champ input de type file -->
        <p>Format possible : image/audio/.doc/.docx/.pdf/.odt/.odp/.ppt/.pptx</p>
        <p>Nombre de fichier maximum  : 5 </p>
        <p>Taille maximal par fichier  : 5Mo </p>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        <input type="file" name="fileToUpload[]" multiple="multiple" name="submit" accept="image/*,audio/*,.doc,.docx,.pdf,.odt,.odp,.ppt,.pptx">
        <p>
            <input type="submit" value="Ajouter" />
            <input type="reset" value="Annuler" />
        </p>
    </form>
    <script>
        CKEDITOR.replace('editeur');
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>