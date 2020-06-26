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
    <form action="../../controler/actualite/actualite.ctrl.php" method="post" enctype="multipart/form-data">
        <label for="">Titre du compte rendu :</label>
        <input type="text" name="title" value="" required="required"  /><br>
        <label for="">date du compte rendu :</label>
        <input type="date" name="date" value="" required="required"  /><br>
        <label for="">Description :</label>
        <textarea name="editeur" id="editeur" rows="8" cols="80"></textarea>
        <label for="">Fichier lié au compte rendu</label>
        <input type="file" name="files[]" multiple="multiple" name="submit" accept="image/*">
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