<?php
session_start();

if(isset($_POST['form_connexion']))
{
	if(!empty($_POST['mail']) && !empty($_POST['password']) && strlen($_POST['mail']) <= 100 && strlen($_POST['password']) <= 25 && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
	{
		require('../include/connexion_bdd.php');
		$mail_connect = htmlspecialchars($_POST['mail']);
		$password_connect = htmlspecialchars($_POST['password']);
		$password_connect = sha1($password_connect);
		
		$req_user = $bdd->prepare('SELECT * FROM user WHERE User_Email = ? AND User_Password = ?');
		$req_user->execute(array($mail_connect, $password_connect));
		$user_exist = $req_user->rowCount();
		if($user_exist == 1)
		{
			$user_info = $req_user->fetch();
			$_SESSION['id'] = $user_info['User_id'];
			$_SESSION['pseudo'] = $user_info['User_Pseudo'];
			$_SESSION['mail'] = $user_info['User_Email'];
			header("Location: profile.php?id=".$_SESSION['id']);

		}
		else
			$erreur = "Mauvais mail ou mot de passe !";
	}
	else 
		$erreur = "Tout les champs doivent être complétés correctement !";
}	

include ("../views/connexion.view.php");
?>