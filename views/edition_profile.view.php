<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>
	<?php include('../include/include.php'); ?>

	<link rel="stylesheet" type="text/css" href="../css/profile.view.css">

</head>
<body>
	<header>
	<?php include ("../src/header.php") ?> 
	</header>
<div class="container-fluid">

	<div id="corp_page" class="row"> 

		<div id="principalEditPro" class="col-md-8">
			<div class="titre">
				<h2 id="title_news">Edition de mon Profil</h2>
				<h4 >Entrer les nouvelles informations</h4>
			</div>
			<?php 	if(isset($erreur))
				echo '<p class="erreur">'.$erreur.'</p>';
					elseif(isset($validate))
						echo '<p class="validate">'.$validate.'</p>';?>
				<form method="POST">
					<div class="row Pseudo">
						<div class="col-md-4">
							<label for="pseudo">Pseudo :</label>
							<input class="form-control input-sm" id="pseudo" type="text" maxlength="25" name="new_pseudo" placeholder="Pseudo" value="<?= $user['User_Pseudo']; ?>" />
						</div>
						<div class="col-md-4">
							<label for="nom">Nom :</label>
							<input class="form-control input-sm" id="nom" type="text" maxlength="30" name="new_nom" placeholder="Nom" value="<?= $user['User_Nom']; ?>" />
						</div>
						<div class="col-md-4">
							<label for="prenom">Prénom :</label>
							<input class="form-control input-sm" id="prenom" type="text" maxlength="30" name="new_prenom" placeholder="Prénom" value="<?= $user['User_Prenom']; ?>" />
						</div>
					</div>
					<div class="row Email">
						<div class="col-md-6">
							<label for="mail">E-mail :</label>
							<input class="form-control input-sm" type="Email" maxlength="40" name="new_mail" id="mail" placeholder="adresse Mail" value="<?= $user['User_Email']; ?>" />
						</div>						
					</div>

					<div class="row DateGenre">
						<div class="col-md-6">
							<label for="birth">Date de naissance :</label>
							<input class="form-control input-sm" id="birth"  type="date" name="new_birth" placeholder="Date de naissance" value="<?= $user['User_Birthday']; ?>" />
						</div>
						<div class="col-md-6">
							<label for="genre">Genre :</label><br>
							<input type="radio" name="gender" value="Femme"  /> Femme
 							<input type="radio" name="gender" value="Homme" /> Homme
 							<input type="radio" name="gender" value="OVNI" /> Autre				
						</div>
					</div>

					<div class="row Adresse">
						<div class="col-md-6">
							<label for="adresse"> Adresse :</label><br>
							<input class="form-control input-sm" id="adresse" type="text" maxlength="60" name="new_adresse" placeholder="Adresse" value="<?= $user['User_Location']; ?>" />
						</div>
						<div class="col-md-3">
							<label for="cp"> Code postal :</label><br>
							<input class="form-control input-sm" id="cp" type="text" pattern="\d*" minlength="5" maxlength="5" name="new_cp" placeholder="Code Postal" value="<?= $user['Region']; ?>" />
						</div>
						<div class="col-md-3">
							<label for="pays"> Pays :</label><br>
							<input class="form-control input-sm" id="pays" type="text" maxlength="20" name="new_pays" placeholder="Pays" value="<?= $user['Pays']; ?>" />
						</div>
					</div>

					<div class="row Website">
						<label for="web">Website :</label><br>
						<input class="form-control input-sm" id="web" type="text" maxlength="100" name="new_web" placeholder="Website" value="<?= $user['User_WebSite']; ?>" />
					</div>

					<div class="row Interest">
						<label for="Int">Intêret :</label><br>
						<input class="form-control input-sm" id="Int" type="text" maxlength="255" name="new_Int" placeholder="Intêret" value="<?= $user['User_Interest']; ?>" />
					</div>

					<div class="row password">
						<div class="col-md-6">
							<label for="password">Nouveau mot de passe :</label>
							<input class="form-control input-sm" id="password" maxlength="25" type="password" name="new_password" placeholder="Mot de passe"/>
						</div>
						<div class="col-md-6">
							<label for="password2">Retapez le Mot de passe :</label>
							<input class="form-control input-sm" id="password2" maxlength="25" type="password" name="new_password2" placeholder="Mot de passe"/>	
						</div>
					</div>
					<div class="row password">
						<div class="col-md-6">
							<label for="password_confirm">Confirmer avec le mot de passe actuel :</label>
							<input class="form-control input-sm" id="password_confirm" maxlength="25" type="password" name="password_confirm" placeholder="Mot de passe"/>	
						</div>
					</div>
					<div class="row">
						<input  class="btn btn-primary btn-block" type="submit" name="form_edition" value="Mettre a jour mon profil !"/>
					</div>
				</form>
		</div>
		<div id="right" class="col-md-4">
				<div id="post_recents">
					<h2>Post récents</h2>
					<?php include('../include/post_récents.php'); ?>
			</div>
			<div id="new_topic">
				<h2>Nouveaux sujets</h2>
				<?php include('../include/nouveaux_sujets.php'); ?>
				</div>
			<div id="site_ressources">
				<h2>Sites incontournables</h2>
				<div >
					<ul>
					<?php include('../include/sites_incontournables.php'); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
	<footer>
		<?php include ("../src/footer.php"); ?>
	</footer>
</body>
</html>