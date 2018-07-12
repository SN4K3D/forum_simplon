<?php
session_start();
	if(isset($_SESSION['id']) AND $_SESSION['id'] == 5)
	{
		require('../include/connexion_bdd.php');

		$membres = $bdd->query('SELECT * FROM user ORDER BY User_id DESC');

		if(isset($_GET['suprimer']) && !empty($_GET['suprimer']))
		{
			$suprime = (int) $_GET['suprimer'];
			$req = $bdd->prepare('DELETE FROM user WHERE User_id = ?');
			$req->execute(array($suprime));
		}


		include('../views/administration.view.php');
	}
	else{
		echo "Vous n'êtes pas un administrateur ! Barrez vous !!!";
		exit();	
	}

?>
