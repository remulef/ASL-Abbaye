<?php

/*
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-master/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($_POST["auteur"]);
$pdf->SetTitle($_POST["titre"]);

$string = "Publié par ".$_POST["auteur"]." le ".$_POST["date"];
// set default header data
$pdf->SetHeaderData('logoasl.jpg','50',$_POST["titre"], $string);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

$html = $_POST["editeur"];
 
$pdf->writeHTML($html, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output($_POST['title'], 'F');


*/
var_export($_FILES["fileToUpload"]);
$allowed = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'pdf', 'docx', 'doc', 'ppx', 'pptx', 'mp3', 'aac', 'txt', 'odt', 'mp4', 'odt');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    foreach ($_FILES['files']['name'] as $f => $name) {
        // Vérifie si le fichier a été uploadé sans erreur.
        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"][$f] == 0) {
            $filename = $_FILES["fileToUpload"]["name"][$f];
            $filetype = $_FILES["fileToUpload"]["type"][$f];
            $filesize = $_FILES["fileToUpload"]["size"][$f];

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide pour le fichier ".$filename);

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

            // Vérifie le type MIME du fichier
            if (in_array($filetype, $allowed)) {
                // Vérifie si le fichier existe avant de le télécharger.
                if (file_exists("~/uploads/" . $filename)) {
                    echo $filename . " existe déjà.";
                } else {

                    if (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $filename)) {
                        exit("Nom de fichier non valide");
                    } else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$f], "~/uploads/".$filename)) {
                        echo "The file " . basename($filename) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
            }
        } else {
            echo "Error: " . $_FILES["fileToUpload"]["error"][$f];
        }
    }
}else {
    header("HTTP/1.0 404 Not Found");
}
