<?php
session_start();


if(isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION['id']) AND $_GET['id'] == $_SESSION['id'])
{
	require('../include/connexion_bdd.php');
	$req_user = $bdd->prepare("SELECT * FROM user WHERE User_id = ?");
	$req_user->execute(array($_SESSION['id']));
	$user = $req_user->fetch();
	
	if(isset($_POST['form_edition']) && !empty($_POST['form_edition']))
	{
		if(isset($_POST['new_pseudo']) && !empty($_POST['new_pseudo']) AND $_POST['new_pseudo'] != $user['User_Pseudo'])
		{
			$new_pseudo = htmlspecialchars($_POST['new_pseudo']);
			if(strlen($new_pseudo) <= 25)
			{
				$insert_pseudo = $bdd->prepare("UPDATE user SET User_Pseudo = ? WHERE User_id = ?");
				$insert_pseudo->execute(array($new_pseudo, $_SESSION['id']));
				header('Location: profile.php?id='.$_SESSION['id']);
			}
			else
				$erreur = "Votre pseudo ne doit pas dépasser 25 caractères !";
		}

				if(isset($_POST['new_nom']) && !empty($_POST['new_nom']) AND $_POST['new_nom'] != $user['User_Nom'])
		{
			$new_nom = htmlspecialchars($_POST['new_nom']);
			if(strlen($new_nom) <= 50)
			{
				$insert_nom = $bdd->prepare("UPDATE user SET User_Nom = ? WHERE User_id = ?");
				$insert_nom->execute(array($new_nom, $_SESSION['id']));
				header('Location: profile.php?id='.$_SESSION['id']);
			}
			else
				$erreur = "Votre nom ne doit pas dépasser 50 caractères !";
		}


		if(isset($_POST['new_prenom']) && !empty($_POST['new_prenom']) AND $_POST['new_prenom'] != $user['User_Prenom'])
		{
			$new_prenom = htmlspecialchars($_POST['new_prenom']);
			if(strlen($new_prenom) <= 50)
			{
				$insert_prenom = $bdd->prepare("UPDATE user SET User_Prenom = ? WHERE User_id = ?");
				$insert_prenom->execute(array($new_prenom, $_SESSION['id']));
				header('Location: profile.php?id='.$_SESSION['id']);
			}
			else
				$erreur = "Votre Prénom ne doit pas dépasser 50 caractères !";
		}			
		

		if(isset($_POST['new_birth']) && !empty($_POST['new_birth']) AND $_POST['new_birth'] != $user['User_Birthday'])
		{
			$new_birth = htmlspecialchars($_POST['new_birth']);
			$insert_birth = $bdd->prepare("UPDATE user SET User_Birthday = ? WHERE User_id = ?");
			$insert_birth->execute(array($new_birth, $_SESSION['id']));
			header('Location: profile.php?id='.$_SESSION['id']);
			
		}


		if(isset($_POST['new_adresse']) && !empty($_POST['new_adresse']) AND $_POST['new_adresse'] != $user['User_Location'])
		{
			$new_adresse = htmlspecialchars($_POST['new_adresse']);
			$insert_adresse = $bdd->prepare("UPDATE user SET User_Location = ? WHERE User_id = ?");
			$insert_adresse->execute(array($new_adresse, $_SESSION['id']));
			header('Location: profile.php?id='.$_SESSION['id']);
			
		}


		if(isset($_POST['new_cp']) && !empty($_POST['new_cp']) AND $_POST['new_cp'] != $user['Region'])
		{
			$new_cp = htmlspecialchars($_POST['new_cp']);
			$insert_cp = $bdd->prepare("UPDATE user SET Region = ? WHERE User_id = ?");
			$insert_cp->execute(array($new_cp, $_SESSION['id']));
			header('Location: profile.php?id='.$_SESSION['id']);
			
		}


		if(isset($_POST['new_pays']) && !empty($_POST['new_pays']) AND $_POST['new_pays'] != $user['Pays'])
		{
			$new_pays = htmlspecialchars($_POST['new_pays']);
			$insert_pays = $bdd->prepare("UPDATE user SET Pays = ? WHERE User_id = ?");
			$insert_pays->execute(array($new_pays, $_SESSION['id']));
			header('Location: profile.php?id='.$_SESSION['id']);
			
		}


		if(isset($_POST['new_web']) && !empty($_POST['new_web']) AND $_POST['new_web'] != $user['User_WebSite'])
		{
			$new_web = htmlspecialchars($_POST['new_web']);
			$insert_web = $bdd->prepare("UPDATE user SET User_WebSite = ? WHERE User_id = ?");
			$insert_web->execute(array($new_web, $_SESSION['id']));
			header('Location: profile.php?id='.$_SESSION['id']);
			
		}

		if(isset($_POST['new_Int']) && !empty($_POST['new_Int']) AND $_POST['new_Int'] != $user['User_Interest'])
		{
			$new_Int = htmlspecialchars($_POST['new_Int']);
			$insert_Int = $bdd->prepare("UPDATE user SET User_Interest = ? WHERE User_id = ?");
			$insert_Int->execute(array($new_Int, $_SESSION['id']));
			header('Location: profile.php?id='.$_SESSION['id']);
			
		}

		if(isset($_POST['new_mail']) && !empty($_POST['new_mail']) AND $_POST['new_mail'] != $user['User_Email'])
		{
			$new_mail = htmlspecialchars($_POST['new_mail']);

			if(strlen($new_mail) <= 100)
			{
				if(filter_var($new_mail, FILTER_VALIDATE_EMAIL))
				{
					$req_mail = $bdd->prepare("SELECT * FROM user WHERE User_Email = ?");
					$req_mail->execute(array($new_mail));
					$mail_exist = $req_mail->rowCount();
					if($mail_exist == 0)
					{				
						$insert_pseudo = $bdd->prepare("UPDATE user SET User_Email = ? WHERE User_id = ?");
						$insert_pseudo->execute(array($new_mail, $_SESSION['id']));
						header('Location: profile.php?id='.$_SESSION['id']);
					}
					else
						$erreur = "Cette adresse mail existe déjà !";
				}
				else
					$erreur = "Votre adresse mail est invalide !";
			}
			else
				$erreur = "Votre mail ne doit pas dépasser 100 caractères !";
		}

		if(isset($_POST['new_password']) && !empty($_POST['new_password']) AND isset($_POST['new_password2']) && !empty($_POST['new_password2']))
		{
			if($_POST['new_password'] == $_POST['new_password2'])
			{
				$password = htmlspecialchars($_POST['new_password']);
				$password2 = htmlspecialchars($_POST['new_password2']);
				$mdp1 = sha1($password);
				$mdp2 = sha1($password2);

				$insert_password = $bdd->prepare("UPDATE user SET User_Password = ? WHERE User_id = ?");
				$insert_password->execute(array($mdp1, $_SESSION['id']));
				$validate = "Sucess votre compte va ce mettra  jour !";
				header('Location: profile.php?id='.$_SESSION['id']);
			}	
			else
				$erreur = "Vos deux mots de passe ne correspondent pas !";		
		}
	}
	include ("../views/edition_profile.view.php");
}
else
	header('Location: connexion.php');
?> 


