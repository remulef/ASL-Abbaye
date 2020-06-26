<?php
echo $_POST["editeur"];
$fp = fopen('resultat.txt', 'a+');
fwrite($fp, $_POST["editeur"]);
fclose($fp)

?>
