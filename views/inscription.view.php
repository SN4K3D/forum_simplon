<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>
	
	<?php include('../include/include.php'); ?>

	<link rel="stylesheet" type="text/css" href="../css/index.view.css">

</head>
<body>
	<header>
	<?php include ("../src/header.php"); ?>
	</header>
<div class="container-fluid" id="inscription">
	<div id="corp_page" class="row">
		<div align="center" id="principal" class="col-md-8">
			<h2 id="title_news">Inscription</h2>
			<br /><br />
			<?php 	if(isset($erreur))
						echo '<p class="erreur">'.$erreur.'</p>';

					elseif(isset($validate))
						echo '<p class="validate">'.$validate.'</p>';
			  ?>
			<form method="POST" action="" class="inscription">
				<div class="formIns">
					<label for="pseudo">Pseudo</label>
					<input id="pseudo" type="text" name="pseudo" placeholder="Votre Pseudo" value="<?php if(isset($pseudo)){echo $pseudo;} ?>" class="form-control"/>
							
					<label for="mail">Mail</label>
					<input id="mail" type="email" name="mail" placeholder="Votre eMail" value="<?php if(isset($mail)){echo $mail;} ?>" class="form-control"/>

					<label for="mail2">Confirmation Mail</label>
					<input id="mail2" type="email" name="mail2" placeholder="Confirmer eMail" value="<?php if(isset($mail2)){echo $mail2;} ?>" class="form-control"/>
							
					<label for="password">Mot de passe</label>
					<input id="password" type="password" name="password" placeholder="Mot de passe" class="form-control"/>
							
					<label for="password2">Confirmer Mot de passe</label>
					<input id="password2" type="password" name="password2" placeholder="Mot de passe" class="form-control"/>
							
					<input type="submit" name="form_inscription" value="Je m'inscris" class="btn btn-primary btn-block">
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
		<?php include ("../src/footer.php") ?>
	</footer>
</body>
</html>