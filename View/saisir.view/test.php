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
$pdf->Output($_POST['title'], 'I');


$acc_type = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'pdf', 'docx', 'doc', 'ppx', 'pptx', 'mp3', 'aac', 'txt', 'odt', 'mp4', 'odt');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
*/
var_export($_FILES["fileToUpload"]);
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le fichier a été uploadé sans erreur.
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["fileToUpload"]["name"];
        $filetype = $_FILES["fileToUpload"]["type"];
        $filesize = $_FILES["fileToUpload"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed)) {
            // Vérifie si le fichier existe avant de le télécharger.
            if (file_exists("upload/" . $_FILES["fileToUpload"]["name"])) {
                echo $_FILES["fileToUpload"]["name"] . " existe déjà.";
            } else {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], ".");
                echo "Votre fichier a été téléchargé avec succès.";
            }
        } else {
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        }
    } else {
        echo "Error: " . $_FILES["fileToUpload"]["error"];
    }
}


// Usage: uploadfile($_FILE['file']['name'],'temp/',$_FILE['file']['tmp_name'])
function uploadfile($origin, $dest, $tmp_name)
{
  $origin = strtolower(basename($origin));
  $fulldest = $dest.$origin;
  $filename = $origin;
  for ($i=1; file_exists($fulldest); $i++)
  {
    $fileext = (strpos($origin,'.')===false?'':'.'.substr(strrchr($origin, "."), 1));
    $filename = substr($origin, 0, strlen($origin)-strlen($fileext)).'['.$i.']'.$fileext;
    $fulldest = $dest.$newfilename;
  }
 
  if (move_uploaded_file($tmp_name, $fulldest))
    return $filename;
  return false;
}
?>