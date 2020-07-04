<?php
session_start();
$id_doc = $_GET["id_doc"];
$allowed = array("ADMINISTRATEUR","MODERATEUR","BENEVOLE ABBAYE");

ob_flush();
ob_start();
var_dump($_SESSION);
file_put_contents("dump.txt", ob_get_flush());

$fp = fopen('log.txt', 'a+');

fwrite($fp,$_SESSION['role'][0].PHP_EOL);

if(!isset($_SESSION['role']) && in_array( $_SESSION['role'][0],$allowed)){
    
    $url = "Location: "."http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.admin.php?id_doc=".$id_doc;
    fwrite($fp,"admin".PHP_EOL);

    header($url);
}else {
    $url = "Location: "."http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=".$id_doc;
    fwrite($fp,"pas admin".PHP_EOL);

    header($url);
}
fclose($fp);



    ?>