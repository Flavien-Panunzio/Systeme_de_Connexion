<?php
//démarre session
session_start();
//si utilisateur est connecté, redirection sinon initialisation
if (isset($_SESSION["login"])&&$_SESSION["login"]==true) {
	header("location:admin.php");
}
else
$_SESSION["login"]=false;

//si form remplis
if (isset($_POST["login"])) {
	//récup var + encodage mdp
	$login=htmlspecialchars($_POST["login"]);
	$mdp=sha1(htmlspecialchars($_POST["mdp"]));

	//connexion BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	//Requete SQL
	$reponse = $bdd->query('SELECT * FROM identifiants WHERE login="'.$login.'"');
	$donnees = $reponse->fetch();

	//Comparaison avec BDD
	if ($mdp==$donnees["mdp"]) {
		$_SESSION["login"]=true;
		header("location:admin.php");
	}
	else
		echo "réessaye";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="login">
		<input type="password" name="mdp">
		<input type="submit">
	</form>
</body>
</html>