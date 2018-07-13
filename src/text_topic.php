<?php
session_start();


	if(isset($_GET['id_topic_post'],$_GET['sujet']) && !empty($_GET['sujet']) && !empty($_GET['id_topic_post']) AND strlen($_GET['id_topic_post']) < 3 && strlen($_GET['sujet']) < 40)
	{
		$titre = htmlspecialchars($_GET['sujet']);
		$id_topic_post = htmlspecialchars($_GET['id_topic_post']);
		$id_topic_post = intval($id_topic_post);
		require('../include/connexion_bdd.php');
		$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE id_topic_post = ?");
		$topics->execute(array($id_topic_post));

		$reponse = $bdd->prepare("SELECT * FROM reponse LEFT JOIN user ON reponse.id_auteur = user.User_id WHERE id_sujet = ?");
		$reponse->execute(array($id_topic_post));

		if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
			$_SESSION['id_sujet'] = $id_topic_post;
			$_SESSION['sujet'] = $titre;
		}

		include("../views/texte_topic.view.php");
	}
	else
		die('Erreur: Aucune catégorie sélectionnée');

?>