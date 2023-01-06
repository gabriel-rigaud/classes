<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="icon" href="https://previews.123rf.com/images/r7cky/r7cky1609/r7cky160900019/62145551-swag-icon-illustration.jpg">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id"];
	} else {
		$id = $_GET["id"];
		$nom = $_GET["nom"];
		$prenom = $_GET["prenom"];
		$login = $_GET["login"];
		$email = $_GET["email"];
	}
	
	if ($action == "UPDATE") {
		updateUser($id, $nom, $prenom, $login, $email);
		echo "<p class='InfoUser'>User Update </p>";
		echo "<a class='ListeUser' href='index.php'>Liste des utilisateurs</a>";
	}
	if ($action == "DELETE") {
		deleteUser($id);
		echo "<p class='InfoUser'>User Delete </p>";
		echo "<a class='ListeUser' href='index.php'>Liste des utilisateurs</a>";
	}
?>
</body>
<footer>
    <?php include 'footer.php'?>
</footer>
</html>