<?php
ini_set('display_errors', 1);

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
$html = '<div class="ob-sections"> <div class="ob-section ob-section-html"><p style="margin:0cm 0cm 0.0001pt"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><u><span style="font-size:11.0pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">Le 20 f&eacute;vrier, 6 participants&nbsp;:</span></span></u></span></span></p> <ul> <li style="margin:0cm 0cm 0.0001pt 36pt"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="font-size:11.0pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">Histoire de la France : des Gaulois jusqu&rsquo;au 20<sup>&egrave;me</sup> si&egrave;cle &ndash; les grandes dates &ndash; document joint</span></span></span></span></li> <li style="margin:0cm 0cm 0.0001pt 36pt"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="font-size:11.0pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">L&rsquo;organisation politique de la France&nbsp;: les pouvoirs, les &eacute;lections&hellip; - document joint</span></span></span></span></li> <li style="margin:0cm 0cm 0.0001pt 36pt"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="font-size:11.0pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">Nouveau TCF : <b><i>rappel </i></b>- S&#39;exercer au nouveau TCF en faisant des &laquo;&nbsp;tests blancs&nbsp;&raquo; sur le site &laquo;&nbsp;TV5Monde&nbsp;&raquo;&nbsp;: <span style="color:#1f3e7d"><a href="https://apprendre.tv5monde.com/fr/tcf" style="color:blue; text-decoration:underline">https://apprendre.tv5monde.com/fr/tcf</a> </span>puis choix : <span style="color:blue">&laquo;&nbsp;Tester en situation r&eacute;elle&nbsp;&raquo;.</span></span></span></span></span></li> <li style="margin:0cm 0cm 0.0001pt 36pt"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><i><span style="font-size:11.0pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">DVD &laquo;&nbsp;La grande vadrouille&nbsp;&raquo; : Amel et Feten, &agrave; regarder et &agrave; rapporter &agrave; la rentr&eacute;e.</span></span></i></span></span></li> </ul> </div> <div class="ob-section ob-section-file"><div class="ob-ctn"><svg class="ob-icon" width="12px" height="29px" viewBox="0 0 12 29" xmlns="http://www.w3.org/2000/svg"><path d="M0,4.64 L0,22.33 C0,22.33 1.37974373e-10,29.0000025 6,29 C12,28.9999975 12,22.33 12,22.33 L12,4.64 C12,3.915 10.6666667,3.915 10.6666667,4.64 L10.6666667,22.3300007 C10.6666667,22.3300007 11.1515151,27.6818182 6,27.6818182 C1.33333333,27.6818182 1.33333333,22.3300007 1.33333333,22.3300007 L1.33333333,4.64 C1.33333333,4.64 1.33333333,1.31818302 4.66666667,1.31818182 C8,1.31818064 8,4.64 8,4.64 L8,22.3300007 C8,22.3300007 8,24.4095046 6.05442175,24.4095026 C4.10884348,24.4095008 4,22.3300007 4,22.3300007 L4,5.51 C4,4.785 2.66666667,4.785 2.66666667,5.51 L2.66666667,22.33 C2.66666667,22.33 2.41805811,25.859506 6.05442175,25.8595026 C9.33333333,25.8595001 9.33333333,22.33 9.33333333,22.33 L9.33333333,4.63999997 C9.33333333,4.63999997 9.33333333,-1.68759012e-06 4.66666667,0 C-4.03381032e-15,1.68759013e-06 0,4.64 0,4.64 L0,4.64 Z"></path><path d="M0,4.64 L0,22.33 C0,22.33 1.37974373e-10,29.0000025 6,29 C12,28.9999975 12,22.33 12,22.33 L12,4.64 C12,3.915 10.6666667,3.915 10.6666667,4.64 L10.6666667,22.3300007 C10.6666667,22.3300007 11.1515151,27.6818182 6,27.6818182 C1.33333333,27.6818182 1.33333333,22.3300007 1.33333333,22.3300007 L1.33333333,4.64 C1.33333333,4.64 1.33333333,1.31818302 4.66666667,1.31818182 C8,1.31818064 8,4.64 8,4.64 L8,22.3300007 C8,22.3300007 8,24.4095046 6.05442175,24.4095026 C4.10884348,24.4095008 4,22.3300007 4,22.3300007 L4,5.51 C4,4.785 2.66666667,4.785 2.66666667,5.51 L2.66666667,22.33 C2.66666667,22.33 2.41805811,25.859506 6.05442175,25.8595026 C9.33333333,25.8595001 9.33333333,22.33 9.33333333,22.33 L9.33333333,4.63999997 C9.33333333,4.63999997 9.33333333,-1.68759012e-06 4.66666667,0 C-4.03381032e-15,1.68759013e-06 0,4.64 0,4.64 L0,4.64 Z"></path></svg><a class="ob-link" href="http://data.over-blog-kiwi.com/2/02/01/47/20200220/ob_8f5cf5_histoire-de-france-dates-importantes.pdf"> [pdf] HISTOIRE DE FRANCE - DATES IMPORTANTES </a></div><p class="ob-desc"> Histoire de France – dates importantes : schéma chronologique (2 pages), qui correspond aux pages 12 à 17 du Livret du citoyen. </p></div> <div class="ob-section ob-section-file"><div class="ob-ctn"><svg class="ob-icon" width="12px" height="29px" viewBox="0 0 12 29" xmlns="http://www.w3.org/2000/svg"><path d="M0,4.64 L0,22.33 C0,22.33 1.37974373e-10,29.0000025 6,29 C12,28.9999975 12,22.33 12,22.33 L12,4.64 C12,3.915 10.6666667,3.915 10.6666667,4.64 L10.6666667,22.3300007 C10.6666667,22.3300007 11.1515151,27.6818182 6,27.6818182 C1.33333333,27.6818182 1.33333333,22.3300007 1.33333333,22.3300007 L1.33333333,4.64 C1.33333333,4.64 1.33333333,1.31818302 4.66666667,1.31818182 C8,1.31818064 8,4.64 8,4.64 L8,22.3300007 C8,22.3300007 8,24.4095046 6.05442175,24.4095026 C4.10884348,24.4095008 4,22.3300007 4,22.3300007 L4,5.51 C4,4.785 2.66666667,4.785 2.66666667,5.51 L2.66666667,22.33 C2.66666667,22.33 2.41805811,25.859506 6.05442175,25.8595026 C9.33333333,25.8595001 9.33333333,22.33 9.33333333,22.33 L9.33333333,4.63999997 C9.33333333,4.63999997 9.33333333,-1.68759012e-06 4.66666667,0 C-4.03381032e-15,1.68759013e-06 0,4.64 0,4.64 L0,4.64 Z"></path><path d="M0,4.64 L0,22.33 C0,22.33 1.37974373e-10,29.0000025 6,29 C12,28.9999975 12,22.33 12,22.33 L12,4.64 C12,3.915 10.6666667,3.915 10.6666667,4.64 L10.6666667,22.3300007 C10.6666667,22.3300007 11.1515151,27.6818182 6,27.6818182 C1.33333333,27.6818182 1.33333333,22.3300007 1.33333333,22.3300007 L1.33333333,4.64 C1.33333333,4.64 1.33333333,1.31818302 4.66666667,1.31818182 C8,1.31818064 8,4.64 8,4.64 L8,22.3300007 C8,22.3300007 8,24.4095046 6.05442175,24.4095026 C4.10884348,24.4095008 4,22.3300007 4,22.3300007 L4,5.51 C4,4.785 2.66666667,4.785 2.66666667,5.51 L2.66666667,22.33 C2.66666667,22.33 2.41805811,25.859506 6.05442175,25.8595026 C9.33333333,25.8595001 9.33333333,22.33 9.33333333,22.33 L9.33333333,4.63999997 C9.33333333,4.63999997 9.33333333,-1.68759012e-06 4.66666667,0 C-4.03381032e-15,1.68759013e-06 0,4.64 0,4.64 L0,4.64 Z"></path></svg><a class="ob-link" href="http://data.over-blog-kiwi.com/2/02/01/47/20200220/ob_b09e75_pouvoirs-executif-legislatif-electio.pdf"> [pdf] POUVOIRS EXECUTIF & LEGISLATIF_ELECTIONS_LE MAIRE </a></div><p class="ob-desc"> 3 schémas : pouvoirs Exécutif et Législatif – les élections – le Maire : correspond aux pages 9 et 10 du Livret du citoyen. </p></div> </div> ' 
$pdf->writeHTML($html, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
//$pdf->Output(__DIR__."/tmp-CR/".$_POST["titre"].".pdf", 'F');
$pdf->Output($_POST["titre"], 'F');




function reArrayFiles(&$file_post)
{

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_FILES['fileToUpload']) {
        $file_ary = reArrayFiles($_FILES['fileToUpload']);
        var_export($file_ary);
        echo "<br>";
        echo "<br>";

        $allowed = array('gif', 'jpg', 'jpe', 'jpeg', 'image/jpeg', 'png', 'image/png', 'pdf', 'docx', 'doc', 'ppx', 'pptx', 'mp3', 'aac', 'txt', 'odt', 'mp4', 'odt');
        if (sizeof($file_ary) < 5) {
            foreach ($file_ary as $file) {
                if ($file["error"] == 0) {

                    $filename = $file['name'];
                    $filetype = $file['type'];
                    $filesize = $file['size'];

                    // Vérifie l'extension du fichier
                    echo pathinfo($filename, PATHINFO_EXTENSION);
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!in_array($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide pour le fichier " . $filename);

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
                    if (in_array($filetype, $allowed)) {
                        // Vérifie si le fichier existe avant de le télécharger.
                        if (file_exists("../../../uploads/" . $filename)) {
                            echo $filename . " existe déjà.";
                        } else {

                            if (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $filename)) {
                                exit("Nom de fichier non valide");
                            } else if (move_uploaded_file($file["tmp_name"], "../../../uploads/" . $filename)) {
                                echo "Le fichier" . basename($filename) . "a été ajouté";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    } else {
                        echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                    }
                }
            }
            echo "Error: " . $file["error"];
        }
        echo "Le nombre de fichier est limité à 5";
    }
} else {
    header("Location: http://les-asl-abbaye.ovh");
}
