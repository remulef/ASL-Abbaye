<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">

            <a href='main.php?deconnexion=true'><span>Déconnexion</span></a>

            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                {
                   if($_GET['deconnexion']==true)
                   {
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if(isset($_SESSION['username']) && $_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    $pass = $_SESSION['password'];
                    $role = $_SESSION['role'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés !";
                    echo "<br>Ton mdp salo : $pass.";
                    echo "<br>Ton role est $role[0].";
                }else{
                  header("location:login.php");
                }
            ?>

        </div>
    </body>
</html>
