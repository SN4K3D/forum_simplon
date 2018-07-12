<?php
session_start();


	if(isset($_SESSION['id_sujet'],$_SESSION['id']) && !empty($_SESSION['id_sujet']) && !empty($_SESSION['id']))
	{

		if(isset($_POST['form_reponse'], $_POST['text_reponse']))
		{
			if(!empty($_POST['text_reponse']))
			{
				$text_reponse = htmlspecialchars($_POST['text_reponse']);

				require('../include/connexion_bdd.php');
				$topics = $bdd->prepare("INSERT INTO reponse (id_sujet, id_auteur, text_reponse, date_reponse) VALUES (?,?,?,NOW())");
				$topics->execute(array($_SESSION['id_sujet'], $_SESSION['id'], $text_reponse));
				$validate = "Success votre réponse a bien été envoyer !";
				header("Location: text_topic.php?sujet=".$_SESSION['sujet']."&id_topic_post=".$_SESSION['id_sujet']);
			}
			else
				$erreur = "Veuillez remplire tout les champs !";
		}
		include("../views/reponse.view.php");
	}
	else
		die('Veuillez vous connecter pour répondre a un sujet !');

?>
