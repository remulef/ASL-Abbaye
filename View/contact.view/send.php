<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] == "Envoyé"){
    $mail = $_POST["mail"];
    $nom = $_POST["nom"];
    $message = $_POST["message"];
    
    $send = sprintf( '
    <html>
    <head>
        <title>Nouveau message</title>
    </head>
    <body>
        <p><strong> %s </strong> à envoyé :</p>
        <p>%s</p>
        <p><a href="%s">Répondre %s</a></p>
    </body>
    </html>',$nom,$message,$mail,$mail);
    
    
    $send2 = sprintf( '
         %s à envoyé le message suivant :
          %s
        

          Pour lui répondre : %s',$nom,$message,$mail);
    
         // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
         $headers[] = 'MIME-Version: 1.0';
         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
         // En-têtes additionnels
         $headers[] = 'To: Julie <asl.abbaye@grenoble.fr>';
         //$headers[] = 'From: Anniversaire <anniversaire@example.com>';
         //$headers[] = 'Cc: anniversaire_archive@example.com';
         //$headers[] = 'Bcc: anniversaire_verif@example.com';
        $to = 'fabienremule974@gmail.com';
         // Envoi
         try {
          
         mail($to,"Nouveau Message site", $send, implode("\r\n", $headers));
    
         } catch (\Throwable $th) {
            mail($to,"Nouveau Message site", $send2);
        }
    }else {
        header("Location: http://les-asl-abbaye.ovh/ASL-Abbaye/View/contact.view/contact.php");
    }
        
echo '<h1>Opération terminée, retour automatique dans 3 secondes </h1> <script>  setTimeout(() => {   window.history.length <= 1 ? location.replace("https://www.les-asl-abbaye.ovh"):window.history.back(-2); }, 3000);
</script>';

    ?>
</body>
</html>

<?php 
