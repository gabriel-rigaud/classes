<?php
session_start();

if(isset($_POST['submit']))
{
    if(!empty($_POST))
    {
        $login = $_POST['login'];
        $password= $_POST['password'];
        $bd = mysqli_connect("localhost","root","","classes");
//        $bd = mysqli_connect("localhost:3306","Gabriel","ViveLeDev","gabriel-rigaud_moduleconnexion");
        $requete = mysqli_query($bd, "SELECT login, password FROM `utilisateurs` WHERE login='$login' ");

        //on va utiliser num_rows pour verifier que l'utilisateur existe
        $resultat = mysqli_num_rows($requete);

        //on fait un fetch row pour recup la ligne
        $resultat2 = mysqli_fetch_row($requete);

        //Decryptage du password
        $verify = password_verify($password, $resultat2[1]);
    }

    //si verify existe
    if($verify==true)
    {
        if($resultat==1);
        {
            // session_start();
            $_SESSION['connexion'] =  $login ;
            header('location: index.php');
            exit();
        }

    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="icon" href="https://previews.123rf.com/images/r7cky/r7cky1609/r7cky160900019/62145551-swag-icon-illustration.jpg">
</head>
<header>
    <?php include 'header.php'?>
</header>
<body>
        <div class="menu">
            <div class="titre">
                <h1>Connexion</h1>
                <p>Connecte toi !</p>
            </div>
            <form action="connexion.php" method="post">
                <div>
                    <label for="login">Votre Login :</label>
                    <input type="text" id="login" name="login" placeholder="Entrer votre login" required>
                </div>

                <div>
                    <label for="motdepasse">Votre Password :</label>
                    <input type="password" id="mdp" name="password" placeholder="Entrer votre password" required>
                </div>
                <div><br>
                    <button class="valide" type="submit" name="submit" >Valider</button>
                </div>
            </form>
        </div>
</body>
<footer>
    <?php include 'footer.php'?>
</footer>
</html>