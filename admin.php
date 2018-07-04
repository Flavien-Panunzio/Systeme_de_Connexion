<?php
//démarre session
session_start();
	//vérifie que l'user est connecté, sinon redirige à la connexion
	if ($_SESSION["login"]==false) {
		header("location:/");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>
	<h1>COUCOU TOI</h1>
	<a href="logout.php">Déconnexion</a>
</body>
</html>