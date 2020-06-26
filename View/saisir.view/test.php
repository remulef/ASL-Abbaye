<?php
echo $_POST["editeur"];
$fp = fopen('resultat.pdf', 'a+');
fwrite($fp, $_POST["editeur"]);
fclose($fp)

?>
