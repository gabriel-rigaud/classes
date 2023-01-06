<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<?php
// test si l'utilisateur est connecté
if (isset($_GET['deconnexion'])){
    if($_GET['deconnexion']==true){
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}
else if(isset($_SESSION['connexion'])){
    $login = $_SESSION['connexion'];
    echo "<div id='navside' class='navbar'>
<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;></a>
<a href='./'>Accueil</a>
<a href='index.php?deconnexion=true'>Déconnexion</a>
</div>
<div id='main'>
<span style='font-size: 30px;cursor: pointer;background-color: black;color: white;' onclick='openNav()'>&#9776;MENU</span>
</div>
<h3 style='color: white'>Bienvenue $login</h3>
";
    if ($login) {}
}
else{
    echo "<div id='navside' class='navbar'>
<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;></a>
<a href='./'>Accueil</a>
<a href='connexion.php'>Connexion</a>
<a href='inscription.php'>Inscription</a>
</div>
<div id='main'>
<span style='font-size: 30px;cursor: pointer;background-color: black;color: white;' onclick='openNav()'>&#9776;MENU</span>
</div>";
}
?>