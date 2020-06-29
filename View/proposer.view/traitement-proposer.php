<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if ($_FILES['fileToUpload']) {
        var_export($_FILES['fileToUpload']);
        echo "<br>";
        echo "<br>";

        $allowed = array('gif', 'jpg', 'jpe', 'jpeg', 'image/jpeg', 'png', 'image/png', 'pdf', 'docx', 'doc', 'ppx', 'pptx', 'mp3', 'aac', 'txt', 'odt', 'mp4', 'odt');


        if ($_FILES['fileToUpload']["error"] == 0) {

            $filename = $_FILES['fileToUpload']['name'];
            $filetype = $_FILES['fileToUpload']['type'];
            $filesize = $_FILES['fileToUpload']['size'];

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
                    } else if (move_uploaded_file($_FILES['fileToUpload']["tmp_name"], "../../../uploads/" . $filename)) {
                        echo "Le fichier <strong>" . basename($filename) . "</strong> a été ajouté" . PHP_EOL;

                        //AJOUT A LA BASE DE DONNNE 

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
                        $sth = $db->prepare('INSERT INTO DOCUMENT (datepublication,typedoc,nom,chemin,descri,tmp) value (?,?,?,?,?,true)');
                        $sth->bindParam(1, $today);
                        $sth->bindParam(2, $filetype);
                        $sth->bindParam(3, $_POST['titre']);
                        $sth->bindParam(4, $chemin);
                        $sth->bindParam(5, $_POST['description']);
                        $sth->execute();

                        if (strlen($_POST['tags']) > 0 && strlen($_POST['tags']) < 200) {
                            $tags = explode("+", $_POST["tags"]);
                            $max_DOC = $db->query("SELECT max(id_doc)as max FROM DOCUMENT ")->fetchColumn();

                            foreach ($tags as $key => $value) {
                                $sth = $db->prepare('INSERT INTO TAGS (tag,id_doc) value (?,?)');
                                $sth->bindParam(1, $value);
                                $sth->bindParam(2, $max_DOC);
                            }
                        }


                        $db = null;

                        //NOTIFICATION PAR MAIL

                        $auteur = addslashes($_POST["auteur"]);
                        $titre = addslashes($_POST["titre"]);
                        $lienCR  = 'http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=' . $max_DOC;
                        $message = 'Un Document nommé ' . $titre . ' à été proposé, vous pourrez le voir  à l\'adresse suivante <a href="' . $lienCR . '"> COMPTE RENDU</a>';
                        mail('asl.abbaye@grenoble.fr', 'NOTIFICATION proposition d\'un document', $message);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
            }
        }

        echo "Error: " . $_FILES['fileToUpload']["error"];
    }
}
header("Location: http://les-asl-abbaye.ovh");
