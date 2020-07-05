<?php
session_start();

ini_set('display_errors', 1);
//Si la page est généré par une requete POST 
//Sinon redirection 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $sucess = array();
    if ($_FILES['fileToUpload']) {
        $file_ary = reArrayFiles($_FILES['fileToUpload']);
        //var_dump($file_ary);
        echo "<br>";
        echo "<br>";


        $allowed = array(
            'gif', 'image/gif', 'jpg', 'image/jpg', 'jpe', 'image/jpe', 'jpeg', 'image/jpeg',
            'png', 'image/png', 'pdf', 'application/pdf', 'docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'doc', 'application/msword', 'ppx', 'application/vnd.ms-powerpoint',
            'pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'mp3', 'audio/mpeg', 'aac', 'audio/aac', 'txt', 'text/txt', 'odt', 'application/vnd.oasis.opendocument.text',
            'mp4', 'video/mpeg', 'odt', 'application/vnd.oasis.opendocument.text'
        );
        if (sizeof($file_ary) < 5) {
            foreach ($file_ary as $file) {
                if ($file["error"] == 0) {

                    $filename = $file['name'];
                    $filetype = $file['type'];
                    $filesize = $file['size'];

                    // Vérifie l'extension du fichier
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
                                echo "Le fichier <strong>" . basename($filename) . "</strong> a été ajouté" . PHP_EOL;

                                //On ouvre la base de donnée
                                $database = 'gsjrnmiasl.mysql.db';
                                $user = 'gsjrnmiasl';
                                $password = 'MJCAbbaye38';
                                try {
                                    $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user, $password);
                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    //echo "Connected successfully"; 
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }

                                $today = getdate();
                                $mon = $today['mon'];
                                $date = $today['year'] . "/" . $mon . "/" . $today['mday'];
                                $chemin = "uploads/" . $filename;
                                $sth = $db->prepare('INSERT INTO DOCUMENT (datepublication,typedoc,nom,chemin,tmp,cr) value (?,?,?,?,true,false)');
                                $sth->bindParam(1, $date);
                                $sth->bindParam(2, $ext);
                                $sth->bindParam(3, $filename);
                                $sth->bindParam(4, $chemin);
                                $sth->execute();
                                $max_DOC = $db->query("SELECT max(id_doc)as max FROM DOCUMENT ")->fetchColumn();
                                $file["id_doc"] = $max_DOC;
                                $file["chemin"] = $chemin;
                                $file["typefile"] = $ext;
                                // var_dump($file);
                                array_push($sucess, $file);

                                $db = null;
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
    //NOTIFICATION PAR MAIL

    // Include the main TCPDF library (search for installation path).
    require_once('TCPDF-master/tcpdf.php');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(addslashes($_POST["auteur"]));
    $pdf->SetTitle(addslashes($_POST["titre"]));

    $string = "Publié par " . addslashes($_POST["auteur"]) . " le " . addslashes($_POST["date"]);
    // set default header data
    $pdf->SetHeaderData('logoasl.jpg', '50', addslashes($_POST["titre"]), $string);

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
    var_dump($sucess);
    $html = $_POST["editeur"];
    $ul = PHP_EOL . " <h3> Documents rattachés </h3>" . PHP_EOL;
    foreach ($sucess as  $key => $value) {
        $titre_doc = sprintf("[%s]  %s", $sucess[$key]["typefile"], $sucess[$key]["name"]);

        $ul = $ul . " <ul>" . PHP_EOL .
            '<li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/mitigeur.php?id_doc=' . $sucess[$key]["id_doc"] . '">' . $titre_doc . '</a>'
            . " </ul>" . PHP_EOL;
    }
    echo $html;
    echo $ul;
    $html = $html . $ul;
    $pdf->writeHTML($html, true, false, true, false, '');
    // reset pointer to the last page
    $pdf->lastPage();
    //Close and output PDF document
    //$pdf->Output(__DIR__."/tmp-CR/".$_POST["titre"].".pdf", 'F');
    $txt = $pdf->Output($_POST["titre"] . ".pdf", "S");
    $fp = fopen("../../../tmp-CR/" . addslashes($_POST["titre"]) . ".pdf", 'w');
    fwrite($fp, $txt);
    fclose($fp);

    $database = 'gsjrnmiasl.mysql.db';
    $user = 'gsjrnmiasl';
    $password = 'MJCAbbaye38';
    try {
        $db = new PDO("mysql:host=gsjrnmiasl.mysql.db;dbname=gsjrnmiasl", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $nomduCR = $_POST["titre"] . ".pdf";
    $chemin = "tmp-CR/" . $nomduCR;
    $titre = '[Compte-Rendu]'.$_POST["titre"];
    $sth = $db->prepare('INSERT INTO DOCUMENT (titre,datepub,auteur,chemin,tmp) value (?,?,?,?,true)');
    $sth->bindParam(1, $titre);
    $sth->bindParam(2, $_POST["date"]);
    $sth->bindParam(3, $_POST["auteur"]);
    $sth->bindParam(4, $chemin);
    $sth->execute();
    $max_DOC = $db->query("SELECT max(id_doc)as max FROM DOCUMENT ")->fetchColumn();

    $db = null;

    $auteur = addslashes($_POST["auteur"]);
    $titre = addslashes($_POST["titre"]);
    $nbdoc = count($sucess);
    //$lienCR  = 'http://les-asl-abbaye.ovh/tmp-CR/' . $titre . '.pdf';
    $lienCR = 'http://les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/mitigeur.php?id_doc=' . $max_DOC;
    $message = 'Un Compte rendu nommé ' . $titre . ' à été saisit par ' . $auteur . ' et accompagné de ' . $nbdoc . ' document <br>
     Vous pourrez retrouver le compte rendu à l\'adresse suivante :' . $lienCR .'(*Veillez a valider le document en le deplacant
     **Les documents qui accompagnent les comptes rendu sont dans le fichier pdf et doivent aussi etre validés)';
       mail('asl.abbaye@grenoble.fr', 'NOTIFICATION ajout d\'un comtpe-rendu', $message);

    echo '<h1>Opération terminé, retour automatique dans 3 secondes </h1> <script>  setTimeout(() => {   window.history.length <= 1 ? location.replace("https://www.les-asl-abbaye.ovh"):window.history.back(-2); }, 3000);
</script>';
} else {
    header("Location: http://les-asl-abbaye.ovh");
}
