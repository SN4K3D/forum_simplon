<?php  

if(isset($_POST['form_inscription']))
{
	if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['password']) && !empty($_POST['password2']))
		{
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$mail = htmlspecialchars($_POST['mail']);
			$mail2 = htmlspecialchars($_POST['mail2']);
			$mdp1 = htmlspecialchars($_POST['password']);
			$mdp2 = htmlspecialchars($_POST['password2']);
			$password = sha1($mdp1);
			$password2 = sha1($mdp2);

			if(strlen($pseudo) <= 25)
			{
				if(strlen($mail) <= 100 && strlen($mail2) <= 100)
				{
					if(filter_var($mail, FILTER_VALIDATE_EMAIL))
					{
						if($mail == $mail2)
						{
							require('../include/connexion_bdd.php');
							$req_mail = $bdd->prepare("SELECT * FROM user WHERE User_Email = ?");
							$req_mail->execute(array($mail));
							$mail_exist = $req_mail->rowCount();
							if($mail_exist == 0)
							{				
								if($password == $password2)
								{
									$inscription_user = $bdd->prepare("INSERT INTO user(User_Pseudo, User_Email, User_Password) VALUES (?,?,?)");
									$inscription_user->execute(array($pseudo, $mail, $password));
									$validate = "Votre compte a bien été créé !";
								}
								else
									$erreur = "Vos mots de passes ne correspondent pas !";
							}
							else
								$erreur = "Cette adresse mail existe déjà !";
						}
						else
							$erreur = "Vos adesses mail ne correspondent pas !";
					}
					else
						$erreur = "Votre adresse mail est invalide !";
				}
				else
					$erreur = "Votre mail ne doit pas dépasser 100 caractères !";

			}
			else
				$erreur = "Votre pseudo ne doit pas dépasser 25 caractères !";
		}
	else
		$erreur = "Tous les champs douvent êtres complétés !";
}

include ("../views/inscription.view.php");
?>