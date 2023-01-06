<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="icon" href="https://previews.123rf.com/images/r7cky/r7cky1609/r7cky160900019/62145551-swag-icon-illustration.jpg">
</head>
<header>
    <?php include 'header.php'?>
</header>
<body class="primaire">
<h1 class="text">Bienvenue !</h1>
<p class="description">Clique sur L'ID d'un utilisateur pour pouvoir modifié/supprimé un utilisateur</p>
<?php
include 'mesFunctionsSQL.php';
include 'mesFunctionsTable.php';

$headers = getHeaderTable();
$users = getAllUsers();
afficherTableau($users, $headers);
?>
<p class="paragraphe">Pour crée un compte il te suffit de <a href="inscription.php" id="clique" class="valide">Clique Ici !</a></p>
</body>
<footer>
    <?php include 'footer.php'?>
</footer>
</html>