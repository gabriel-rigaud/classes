<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = getNewUser();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = readUser($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Update/Delete</title>
    <link rel="icon" href="https://previews.123rf.com/images/r7cky/r7cky1609/r7cky160900019/62145551-swag-icon-illustration.jpg">
</head>
<header>
    <?php include 'header.php'?>
</header>
<body>
<div class="menu">
    <div class="titre">
        <h2>Liste des utilisateurs</h2>
    </div>
    <form action="createUpdate.php" method="get">
        <p>
            <input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		    <input type="hidden" name="action" value="<?php echo $action;  ?>"/>

        <div>
            <label for="name">Nom :</label>
        	<input type="text" id="nom" name="nom" value="<?php echo $user['nom'];?>">
	    </div>

	    <div>
	        <label for="prenom">Prenom</label>
	        <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom'];?>">
	    </div>

	    <div>
	        <label for="login">Login:</label>
	        <input type="text" id="log" name="login" value="<?php echo $user['login'];?>">
	    </div>

	    <div>
	        <label for="mail">Email :</label>
	        <input type="email" id="mail" name="email" placeholder="<?php echo $user['email'];?>">
	    </div>

        <div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
		</div>
        </p>
</form>

<?php if ($action!="CREATE") { ?>
    <form action="createUpdate.php" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>
	</form>
<?php } ?>
</div>
</body>
<footer>
    <?php include 'footer.php'?>
</footer>
</html>