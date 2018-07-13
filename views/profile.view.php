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

	<div id="corp_page"> 
	
		<div id="principalProfil" class="col-md-8">
			<div class="row">
					<div class="col-md-12 titre">
						<h2 id="title_news">Profil</h2>
						<a href=<?="edition_profile.php?id=".$_GET['id'] ?>>Editer mon profile</a>
						<a href="message.php">Envoyer un message privé</a>
					</div>
			</div>
			<div class="profil row">
				<div class="row">
					<div class="col-md-4">
						<p><span>Pseudo :</span> <?= $user_info['User_Pseudo']; ?></p>
					</div>
					<div class="col-md-4">
						<p><span>Nom :</span> <?= $user_info['User_Nom']; ?></p>
					</div>
					<div class="col-md-4">
						<p><span>Prénom :</span><?= $user_info['User_Prenom']; ?></p> 
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><span>Email :</span> <?= $user_info['User_Email']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><span>Date de naissance :</span> <?= $user_info['User_Birthday']; ?></p>
					</div>
					<div class="col-md-6">
						<p><span>Genre :</span> <?= $user_info['User_Genre']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><span>Adresse :</span> <?= $user_info['User_Location']; ?></p>
					</div>
					<div class="col-md-3">
						<p><span>Code postal :</span> <?= $user_info['Region']; ?></p>
					</div>
					<div class="col-md-3">
						<p><span>Pays :</span> <?= $user_info['Pays']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><span>Website :</span> <?= $user_info['User_WebSite']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 Int">
						<p><span>Intêret :</span> <?= $user_info['User_Interest']; ?></p>
					</div>
				</div>
			</div>
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