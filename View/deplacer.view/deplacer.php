<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deplacer document</title>
</head>
<body>
<label for="pet-select">Choose a pet:</label>

<select  id="node-select" class="node-select" onload="init()" onchange="update()">
    <option value="">--Choisir un dossier--</option>
    <option value="dog">Dog</option>
</select>


</body>
</html>