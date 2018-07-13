<?php
session_start();

if(isset($_SESSION['id']))
{
	if (isset($_GET['categorie']) && strlen($_GET['categorie']) < 3)
	{
		$get_categorie = htmlspecialchars($_GET['categorie']);

		if(isset($_POST['form_topic']))
		{
			if(isset($_POST['sujet'], $_POST['topic_text']) && !empty($_POST['sujet']) && !empty($_POST['topic_text']))
			{
				if(isset($_POST['categorie']))
				{
					$categorie = htmlspecialchars($_POST['categorie']);
					$sujet = htmlspecialchars($_POST['sujet']);
					$text = htmlspecialchars($_POST['topic_text']);
					if(strlen($sujet) <= 70)
					{
						require('../include/connexion_bdd.php');

						$verif_categorie = $bdd->prepare("SELECT * FROM topics WHERE topic_id = ? ");
						$verif_categorie->execute(array($categorie));
						$verif_categorie = $verif_categorie->rowCount();
						if($verif_categorie)
						{
							$req_topic = $bdd->prepare("INSERT INTO topics_posted (categorie, sujet, text, auteur, post_time) VALUES (?,?,?,?,NOW())");
							$req_topic->execute(array($categorie,$sujet, $text, $_SESSION['id']));
							$validate = "Sucess votre sujet a bien été posté !";
						}
						else
							$erreur = "Catégorie invalide !";
					}
					else
						$erreur = "Votre sujet est trop long !";
				}
				else
					$erreur = "Choisissez une catégorie !";
			}
			else
				$erreur = "Veuillez remplire tout les champs !";
		}

		include("../views/post_topic.view.php");
	}
	else
		echo "Mauvaise catégorie choisie !";
}
else
	echo 'Vous devez être connecté pour poster un Sujet !';
?>