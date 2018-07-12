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
<div class="container-fluid">
	<div id="corp_page" class="row">
		<div id="principal" class="col-md-8">
			<div id="news">
				<h2 align="center"  id="title_news">Les news Simploniennes</h2>
				<div class="article_news">
					<p>L'avenir est à nous !</p>
					<p>Simplon for life!</p>
				</div>

				<div id="listes_topic">
					<h2 align="center"  id="topic_title">Les forums Simplon</h2>
					<ul>
						<li><a href="topics.php?categorie=1&name=Forum général">Forum général</a></li>
						<li><a href="topics.php?categorie=4&name=Les languages de developpement">Les languages de développement</a></li>
						<li><a href="topics.php?categorie=7&name=Partage de ressources">Partagez vos ressources</a></li>
						<li><a href="topics.php?categorie=2&name=Groupes et projet simplon">Groupes et projet simplon</a></li>
						<li><a href="topics.php?categorie=5&name=Vos exposés">Vos exposés</a></li>
						<li><a href="topics.php?categorie=8&name=Evenements Simplon">Evenements Simplon</a></li>
						<li><a href="topics.php?categorie=3&name=Groupes et projet personnel">Groupes et projet personnel</a></li>
						<li><a href="topics.php?categorie=6&name=Help me ! Besoin d'aide">Help me ! Besoin d'aide</a></li>
						<li><a href="topics.php?categorie=9&name=Discussion libre">Discussion libre</a></li>
					</ul>
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
		<?php include ("../src/footer.php") ?>
	</footer>
</body>
</html>
