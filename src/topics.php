<?php
session_start();


	if(isset($_GET['categorie'],$_GET['name']) && !empty($_GET['name']) && !empty($_GET['categorie']) AND strlen($_GET['categorie']) < 3 && strlen($_GET['name']) < 40)
	{
		$titre = htmlspecialchars($_GET['name']);
		$categorie = htmlspecialchars($_GET['categorie']);
		$categorie = intval($categorie);

	}
	else
		die('Erreur: Aucune catégorie sélectionnée');


switch ($categorie) {
	case '1':
		if($titre == "Forum général"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id  WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '2':
		if($titre == "Groupes et projet simplon"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '3':
		if($titre == "Groupes et projet personnel"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '4':
		if($titre == "Les languages de developpement"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '5':
		if($titre == "Vos exposés"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '6':
		if($titre == "Help me ! Besoin d'aide"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '7':
		if($titre == "Partage de ressources"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '8':
		if($titre == "Evenements Simplon"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	case '9':
		if($titre == "Discussion libre"){
			require('../include/connexion_bdd.php');
			$topics = $bdd->prepare("SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id WHERE categorie = ? ORDER BY id_topic_post DESC ");
			$topics->execute(array($_GET['categorie']));
			include("../views/topics.view.php");
		}
		else
			echo 'Veuillez choisir une catégorie valide !';
		break;

	
	default:
		echo 'Veuillez choisir une catégorie valide !';
		break;
}

?>