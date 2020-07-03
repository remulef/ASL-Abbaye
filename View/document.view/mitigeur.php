<?php
session_start();
$id_doc = $_GET["id_doc"];

if(isset($_SESSION['role']) && ($_SESSION['role'][0] == "ADMINISTRATEUR" || $_SESSION['role'][0] == "MODERATEUR" 
|| $_SESSION['role'][0] == "BENEVOLE ABBAYE")){
    $url = "Location: "."http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view.admin.php?id_doc=".$id_doc;
    header($url);
}else {
    $url = "Location: "."http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view.php?id_doc=".$id_doc;
    header($url);
}
    
    ?>