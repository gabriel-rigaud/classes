<?php
session_start();

//La page ne s'affiche que si la SESSION 'connexion' est bien crée (en page connexion)
if(!isset($_SESSION['connexion']))
{
    //Autrement on redirige vers connexion
    header('location: connexion.php');
    exit();
}
//ici on stocke le contenu de la variable SESSION (le login entré precedemment) dans $loginverify
//pour pouvoir l'utiliser pour fixer la ligne lors de la requete UPDATE
$loginverify = $_SESSION['connexion'];

//on verifie que le boutton submit a bien été cliqué
if(isset($_POST['submit']))
{
    //on verifie que le formulaire ne soit pas vide
    if(!empty($_POST))
    {
        //on utilise des variables intermédiaires
        $password = $_POST['password'];
        $password2= $_POST['password2'];

        //on verifie que les deux mots de passe soit similaires
        if($password==$password2)
        {
            //hachage du password
            $password3 = password_hash($password, PASSWORD_BCRYPT, array('cost' =>10 ));

            //coonexion a la BDD
            $connexion = mysqli_connect("localhost","root","","classes") or die('erreur');
//            $connexion = mysqli_connect("localhost:3306","Gabriel","ViveLeDev","gabriel-rigaud_moduleconnexion") or die('erreur');
            //ici on verifie qu'une ligne contenant déjà le login choisi n'existe pas
            $reget = ("SELECT * FROM utilisateurs WHERE login");
            //lancement de la requete
            $regetx = mysqli_query($connexion, $reget);
            //cette fonction compte le nombre de lignes retourné
            $row = mysqli_num_rows($regetx); //elle ne retournera que 0 ou 1 puisque on a verouillé les doulbons dans la page inscription

            //si le resultat est 0 c'est qu'il n'y a pas de doublon
            if($row==0)
            {
            //on peut alors lancer la requete UPDATE pour changer les infos
            $requete = ("UPDATE `utilisateurs` SET password = '$password3' WHERE login = '$loginverify' ");
            $query = mysqli_query($connexion, $requete);
            echo "<p style='color: white'>" . "Vous avez bien modifié vos informations". "</p>";
            }
            else echo "<p style='color: white'>" . "Ce pseudo existe deja". "</p>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="icon" href="https://previews.123rf.com/images/r7cky/r7cky1609/r7cky160900019/62145551-swag-icon-illustration.jpg">
</head>
<header>
    <?php include 'header.php'?>
</header>
<body>
    <div class="menu">
        <div class="titre">
            <h1>Profil</h1>
            <p>Modifié vos informations !</p>
        </div>
        <form action="profil.php" method="post">
            <div>
                <label for="mdp">Password&nbsp;: </label>
                <input type="password" id="mdp" name="password" placeholder="Entrer votre password" required>
            </div>

            <div>
                <label for="confmdp">Confirmé&nbsp;:</label>
                <input type="password" id="confmdp" name="password2" placeholder="Re rentrer password" required>
            </div>

            <div><br>
                <button class="valide" type="submit" name="submit">Valider</button>
            </div>
        </form>
</body>
<footer>
    <?php include 'footer.php'?>
</footer>
</html>