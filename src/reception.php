<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{
	require ('../include/connexion_bdd.php');

	$msg = $bdd->prepare('SELECT * FROM message LEFT JOIN user ON message.id_expediteur = user.User_id WHERE id_destinataire = ? ORDER BY id_message DESC');
	$msg->execute(array($_SESSION['id']));
	

	include('../views/reception.view.php');
}
else 
header('Location: connexion.php');
?>