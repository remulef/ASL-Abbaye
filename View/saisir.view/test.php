<?php

$fp = fopen('resultat.txt', 'w');
fwrite($fp, $_POST["editeur"]);
fclose($fp)

?>
