<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion Compte</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/template.css" />
  </head>
  <body id="body">
    <?php
    include ("{$_SERVER['DOCUMENT_ROOT']}/ASL-Abbaye/data/template/templateprofil.php");
      $db_username = 'gsjrnmiasl';
      $db_password = 'MJCAbbaye38';
      $db_name     = 'gsjrnmiasl';
      $db_host     = 'gsjrnmiasl.mysql.db';
      try
      {
	       // On se connecte à MySQL
	        $bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);
      }
      catch(Exception $e)
      {
	       // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : '.$e->getMessage());
       }

       // Si tout va bien, on peut continuer

       // On récupère tout le contenu de la table user
       $reponse = $bdd->query('SELECT * FROM USER ORDER BY username');
       if(isset($_SESSION['role']) && $_SESSION['role'][0] == "ADMINISTRATEUR"){
       ?>
       <a href="http://les-asl-abbaye.ovh">
         <svg class="bi-house-door-fill" width="40px" height="40px" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
           <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
           <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
         </svg>
       </a>
         <h1>Liste des Comptes</h1>
         <section>
           <div class="tbl-header">
             <table cellpadding="0" cellspacing="0" border="0">
               <thead>
                 <tr>
                   <th>Boutons</th>
                   <th>Nom d'utilisateur</th>
                   <th>Mot de passe</th>
                   <th>Rôle</th>
                   <th>Valider</th>
                 </tr>
              </thead>
             </table>
           </div>
           <div class="tbl-content">
             <table id="tableau" cellpadding="0" cellspacing="0" border="0">
               <tbody>
         <?php
         // On affiche chaque entrée une à une
         while ($donnees = $reponse->fetch())
         {
           ?>
           <tr>
             <td>
               <!-- Supprimer -->
               <svg class="bi bi-trash" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" onclick="removeRow(this)">
                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
               <!-- Modifier -->
               <svg class="bi bi-pencil-square" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" onclick="modifyRow(this)">
                 <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                 <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
               </svg>
             </td>
             <td><div type="text"><?php echo $donnees['username']; ?></div> </td>
             <td><input type="text" name="" value="<?php echo $donnees['password']; ?>" style="display:none"> <div><?php echo $donnees['password']; ?></div></td>
             <td>
               <select class="sel" name="" style="display:none">
                 <option value="BENEVOLE ABBAYE">Bénévole Abbaye</option>
                 <option value="MODERATEUR">Modérateur</option>
                 <option value="ADMINISTRATEUR">Administrateur</option>
               </select>
               <div><?php echo $donnees['role']; ?></div>
             </td>
             <td>
               <svg class="bi bi-check2-square" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" onclick="ValidateModify(this)" style="display:none">
                 <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                 <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
               </svg>
             </td>
           </tr>
         <?php
         }
         ?>
                </tbody>
              </table>
            </div>
       <?php
         $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    <p>
      <input type="button" id="addRow" value="Add New Row" onclick="ajouterLigne()" />
    </p>
    <p><input type="button" id="bt" value="Submit Data" onclick="submit()" /></p>
    </section>
    <?php
  }else{
    echo "<p>Vous n'êtes pas connecté en tant qu'Administrateur, veuillez vous authentifier.</p>";
    echo "<a href=\"http://les-asl-abbaye.ovh\"> Cliquez ici pour retourner sur la page d'accueil</a>";
  }
    ?>

  <script src="https://code.jquery.com/jquery.js"></script>
  <script type="text/javascript" src="myTable.js"></script>
  </body>
</html>
