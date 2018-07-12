<?php
session_start();


if(isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION['id']) AND $_GET['id'] == $_SESSION['id'])
{
	require('../include/connexion_bdd.php');

	$get_id = intval($_GET['id']);
	$req_user = $bdd->prepare('SELECT * FROM user WHERE User_id = ?');
	$req_user->execute(array($get_id));
	$user_info = $req_user->fetch();

	include ("../views/profile.view.php");
}
else
	header('Location: connexion.php');
?>