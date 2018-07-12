<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>
	<?php include('../include/include.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/topics.view.css">

</head>
<body>
	<header>
	<?php include ("../src/header.php"); ?>
	</header>
<div class="container-fluid">
	<div id="corp_page" class="row">
		<div id="principal" class="col-md-8">
			<div>
				<h2 id="title_news"><?= $titre ?></h2>
			<a class="btn btn-primary btn-block" href="post_topic.php?categorie=<?= $categorie ?>">Créé un nouveau Sujet !</a>
			</div>
				<table class="table table-striped">
					<tr>
						<th>Sujet</th>
						<th>Auteur</th>
						<th>Dernier message</th>
					</tr>
					<?php while($t = $topics->fetch()): $id_auteur = $t['auteur']; ?>
					<tr>
						<td>
							<h5><a href="text_topic.php?sujet=<?= $t['sujet'].'&id_topic_post='.$t['id_topic_post'] ?>"><?= $t['sujet'] ?></a></h5>
						</td>
						<td><?= $t['User_Pseudo'] ?></td>
						<td><?= $t['post_time'] ?></td>
					</tr>
					 <?php endwhile ?>	
				</table>
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