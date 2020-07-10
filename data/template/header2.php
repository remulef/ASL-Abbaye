<?php session_start();

if (isset($_SESSION["role"])) {
    echo "ENTRE";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        //var_dump($_POST);
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username !== "" && $password !== "") {
                $sth = $db->prepare('Select * FROM USER WHERE username = ? AND password = ?');
                $sth->bindParam(1, $username);
                $sth->bindParam(2, $password);
                $sth->execute();
                $res = $sth->fetch();
                var_dump($res);
                if (count($res) == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['role'] = $res->role;
                    header("Refresh:0");
                }
                //echo "<script> alert('Couple identifiant/motdepasse incorrect'); </script>";
            }
            //echo "<script> alert('identifiant ou mdp vide'); </script>";
        }
        //echo "<script> alert ('identifiant ou mdp vide 2') </script>";
    }
}
?>
<header class="header-user-dropdown">
    <div class="header-limiter">
        <h1><a href="#">ASL<span> Abbaye</span></a></h1>
        <nav>
            <a href="http://les-asl-abbaye.ovh">Accueil</a>
            <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/display.view/display.php">Recherche document</a>
            <a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/proposer.view/proposer.php">Proposer document</a>

        </nav>


        <?
        $other = array("MODERATEUR", "BENEVOLE ABBAYE");

        if (isset($_SESSION['role']) && $_SESSION['role'] != "") {
            $role = $_SESSION['role'];
            echo '
    <div class="header-user-menu">
    <img src="http://les-asl-abbaye.ovh/ASL-Abbaye/data/template/index.png" >
      <ul>';
            if ($role[0] == "ADMINISTRATEUR") {
                echo '<li><p class="highlight" >Mon rôle :   ADMINISTRATEUR </p></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/user-management.php">Gestion des comptes</a></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/admin.view/gestiondoc.php">Gestion des documents</a></li>
        <li><a href="http://les-asl-abbaye.ovh/ASL-Abbaye/View/accueil.view/main\'.php?deconnexion=true">Déconnexion</a></li>
        </ul>  </div>';
            } else { //if (in_array($role[0],$other) ) {
                echo sprintf('
        <li><p>Mon rôle : %s </p><li>
        <li><a href="main\'.php?deconnexion=true">Déconnexion</a><li>
        </ul>  </div>', $role[0]);
            }
        } else {
            echo '
    <div class="header-user-menu-connexion">
    Connexion
    <ul>    
    <form action="#" method="post">
            <li>   
            <label for="username">Identifiant</label>
            <input type="text" id="username" name="username" class="form-control"  required>
            </li>
            <li>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" required>
            </li>
            <li>
            <input id="saveForm" class=" btn btn-primary" type="submit" name="submit" value="Connexion" />
            </li>
            </form>
      </ul>
        
      </div>';
        }
        ?>
    </div>

</header>