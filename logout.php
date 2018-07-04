<?php
	session_start();
	//déconnexion
	$_SESSION["login"]=false;
	header("location:/");
?>