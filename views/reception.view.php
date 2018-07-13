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
		<div id="principalReception" class="col-md-8">
			<div class="titre">
				<h2 id="title_news">Boite de réception</h2>
				<a class="btn btn-primary btn-block" id="reponse" href="message.php">Envoyer un message</a>
			</div>
			<div class="content">
				<table>
					<tr>
					<th class="table_message">Message</th>
						<th class="tableAuteur">Auteur</th>
						<th class="tableDate">Date</th>
					</tr>
					<?php while($m = $msg->fetch()): ?>
					<tr>
						<td class="table_message">
							<p><?=$m['message']  ?></p>	
						</td>
						<td class="tableAuteur">
							<p><?=$m['User_Pseudo']  ?></p>
						</td>
						<td class="tableDate">
							<p><?=$m['date']  ?></p>
						</td>
					</tr>
					<?php endwhile ?>
				</table>
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