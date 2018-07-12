<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{
	require ('../include/connexion_bdd.php');

	if(isset($_POST['form_message']))
	{
		if(!empty($_POST['dest']))
			$dest = htmlspecialchars($_POST['dest']);
		elseif(isset($_POST['dest2']) && !empty($_POST['dest2']))
			$dest = htmlspecialchars($_POST['dest2']);
		else
			$erreur = "Cet utilisateur n'existe pas !";

		if(isset($_POST['text_message'],$dest) AND !empty($_POST['text_message']) && !empty($dest))
		{
			$message = htmlspecialchars($_POST['text_message']);

			$id_destinataire = $bdd->prepare('SELECT User_id FROM user WHERE User_Pseudo = ?');
			$id_destinataire->execute(array($dest));
			$dest_exist = $id_destinataire->rowCount();

			if($dest_exist)
			{
				$id_destinataire = $id_destinataire->fetch();
				$id_destinataire = $id_destinataire['User_id'];

				$ins = $bdd->prepare('INSERT INTO message(id_expediteur, id_destinataire, message, date) VALUES (?,?,?,NOW())');
				$ins->execute(array($_SESSION['id'], $id_destinataire, $message));

				$validate = "Votre message a bien été envoyé !";
			}
			else
				$erreur = "Cet utilisateur n'existe pas !";
		}
		else
			$erreur = "Veuillez compléter les champs nécéssaire";
	}

	$destinataires = $bdd->query('SELECT User_Pseudo FROM user ORDER BY User_Pseudo');
	include('../views/message.view.php');
}
else 
header('Location: connexion.php');
?>