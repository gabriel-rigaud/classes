<?php

if(isset($_POST['submit']))
{   
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($login && $prenom && $nom && $email && $password)
    {

        if($password==$password2)
        {
            //hachage du password
            $password3 = password_hash($password, PASSWORD_BCRYPT, array('cost' =>10 ));

            $connexion = mysqli_connect("localhost","root","","classes") or die('erreur');
//            $connexion = mysqli_connect("localhost:3306","Gabriel","ViveLeDev","gabriel-rigaud_moduleconnexion") or die('erreur');
            $reget = ("SELECT * FROM utilisateurs WHERE login='$login' ");
            $regetx = mysqli_query($connexion, $reget);
            $row = mysqli_num_rows($regetx);

            if($row==0)
            {
            $requete = ("INSERT INTO utilisateurs (`login`, `prenom`, `nom`, `email`, `password`) VALUE ('$login','$prenom','$nom','$email','$password3')");
            $query = mysqli_query($connexion, $requete);
            header('location: connexion.php');
            }
            else echo "<p style='color: white'>" . "Ce pseudo existe deja !". "</p>";
        }
        else echo "<p style='color: white'>" . "les deux mots de passe doivent être identiques !". "</p>";
    }
    else $erreur= 'Renseignez tous les champs !';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="icon" href="https://previews.123rf.com/images/r7cky/r7cky1609/r7cky160900019/62145551-swag-icon-illustration.jpg">
</head>
<header>
    <?php include 'header.php'?>
</header>
<body>
    <div class="menu">
        <div class="titre">
            <h1>Inscription</h1>
            <p>Crée vous un nouveau compte c'est gratuit !</p>
        </div>
        <form action="inscription.php" method="post">
            <div>
                <label for="name">Votre Nom :</label>
                <input type="text" id="name" name="nom" placeholder="Entrer votre nom">
            </div>

            <div>
                <label for="first">Votre Prénom :</label>
                <input type="text" id="first" name="prenom" placeholder="Entrer votre prénom">
            </div>

            <div>
                <label for="log">Votre Login&nbsp;:</label>
                <input type="text" id="log" name="login" placeholder="Entrer un login">
            </div>

            <div>
                <label for="mail">Votre Email :</label>
                <input type="email" id="mail" name="email" placeholder="Entrer votre mail">
            </div>

            <div>
                <label for="mdp">Password&nbsp;: </label>
                <input type="password" id="mdp" name="password" placeholder="Entrer un password">
            </div>

            <div>
                <label for="confmdp">Confirmé&nbsp;:</label>
                <input type="password" id="confmdp" name="password2" placeholder="Retapé votre password">
            </div>

            <div><br>
                <button class="valide" type="submit" value="Submit"  name="submit">Valider</button>
                <?php if(isset($erreur)){echo $erreur;}?>
            </div>
            </form>
    </div>
</body>
<footer>
    <?php include 'footer.php'?>
</footer>
</html>