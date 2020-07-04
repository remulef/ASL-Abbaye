<?php
session_start();
$id_doc = $_GET["id_doc"];
$allowed = array("ADMINISTRATEUR","MODERATEUR","BENEVOLE ABBAYE");


$fp = fopen('data.txt', 'w');
fwrite($fp, $_SESSION['role'][0]);
fwrite($fp, '23');
fclose($fp);


if(isset($_SESSION['role']) && in_array( $_SESSION['role'][0],$allowed)){
    $url = "Location: "."http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.admin.php?id_doc=".$id_doc;
    header($url);
}else {
    $url = "Location: "."http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=".$id_doc;
    header($url);
}
    
    ?>