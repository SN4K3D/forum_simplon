<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>
	<?php include('../include/include.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/text_topic.view.css" />

</head>
<body>
	<header>
	<?php include ("../src/header.php"); ?>
	</header>
<div class="container-fluid">
	<div id="corp_page" class="row">
		<div id="principalTopic" class="col-md-8">
			<div class="titre">
				<h2 id="title_news"><?= $titre ?></h2>
			</div>
			
					<table>
						<tr class="TopicSujet">
							<tr>
								<th><p>Sujet</p></th>
								<th><p>Message</p></th>
								<th><p>Auteur</p></th>
								<th><p>Date</p></th>
							</tr>
					<?php $t = $topics->fetch(); ?>
							<tr>
								<td><p><?= $t['sujet'] ?></p></td>
								<td class="reponseFirst"><p><?= $t['text'] ?></p></td>
								<td><p><?= $t['User_Pseudo'] ?></p></td>
								<td><p><?= $t['post_time'] ?></p></td>
							</tr>
						</tr>
						<tr class="answer">
							<tr>
								<th><p>Date</p></th>
								<th><p>Auteur</p></th>
								<th colspan="2"><p>Réponse</p></th>
							</tr>
							<?php while ($r = $reponse->fetch()): ?>
							<tr>
								<td><p><?= $r['date_reponse'] ?></p></td>
								<td><p><?= $r['User_Pseudo'] ?></p></td>
								
								<td class="reponse" colspan="2"><p><?= $r['text_reponse'] ?></p></td>
							</tr>							
						</tr>
							<?php endwhile ?>	
					</table>
			<a class="btn btn-primary btn-block" id="reponse" href="reponse.php">Répondre a ce topic</a>

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