<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>
	<?php include('../include/include.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/post_topic.view.css">

</head>
<body>
	<header>
	<?php include ("../src/header.php"); ?>
	</header>
<div class="container-fluid">
	
	<div id="corp_page" class="row">
		<div id="principalReponse" class="col-md-8">
			<div class="row titre">
				<h2 id="title_news">Répondre au  Sujet !</h2>
			</div>
			<?php 	if(isset($erreur))
						echo '<p class="erreur">'.$erreur.'</p>';

					elseif(isset($validate))
						echo '<p class="validate">'.$validate.'</p>';
			  ?>
			<div class="row tableRow">
				<form method="POST">
					<div>
						<h3 class="first">Message</h3>
					</div>
					
					<div>
						<textarea name="text_reponse" class="form-control"></textarea>
					</div>
						
					<div>
						<input type="submit" name="form_reponse" class="btn btn-primary btn-block" />
					</div>
				</form>
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