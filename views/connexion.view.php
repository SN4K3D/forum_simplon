<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>

	<?php include('../include/include.php'); ?>
	
	<link rel="stylesheet" type="text/css" href="../css/index.view.css" />

</head>
<body>
	<header>
	<?php include ("../src/header.php"); ?>
	</header>
<div class="container-fluid">
	<div id="corp_pageCo" class="row">
		<div id="principalCo">
			<h2 align="center" id="title_news">Connexion</h2>
			<br /><br />
			<?php 	if(isset($erreur))
						echo '<p class="erreur">'.$erreur.'</p>';

					elseif(isset($validate))
						echo '<p class="validate">'.$validate.'</p>';
			  ?>
			<form method="POST" >
				<div class="form">
					<label for="mail">Mail</label>
					<input class="form-control" id="mail" type="email" name="mail" placeholder="Votre eMail"/>
					<label for="password">Mot de passe</label>
					<input class="form-control" id="password" type="password" name="password" placeholder="Mot de passe" />
					<input class="btn btn-primary btn-block" type="submit" name="form_connexion" value="Connexion" />
				</div>
			</form>
		</div>
	</div>
</div>
	<footer>
		<?php include ("../src/footer.php") ?>
	</footer>
</body>
</html>