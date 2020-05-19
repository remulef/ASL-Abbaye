<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<header>
<a href="/localhost">HOME</a>
<a href="">ADMIN (pas encore fait )</a>
</header>




<?php
if(!empty($_POST['id_doc'])){
    $id_doc =$_POST['id_doc'];
    echo "<body onload=\"init(".$id_doc.")\">";
}
else{
    echo "<body onload=\"init(11)\"*>";
}
?>
<main>

<div id="Content">

<div id="media">

</div>


<div id="icontitre">

<h1 id="titre"> TITRE </h1>
<div id="icon">
<button type="button" id="deplacer" disabled>
    Deplacer
</button>

<button type="button" id="supprimer" disabled>
    Supprimer
</button>

<button type="button" id="modifier" disabled>
    Modifier
</button>


<a id="telecharger" href="">Telecharger</a>


<button type="button" id="partager">
    Partager
</button>

</div>
</div>

<div id="description">


</div>

</main>

<script src="document.view.js"></script>

</body>
</html>