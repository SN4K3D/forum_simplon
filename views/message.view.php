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
		<div class="col-md-8" id="principalMessage">
			<div class="row titre">
				<h2 id="title_news">Envoyer un message !</h2>
			</div>

			<?php 	if(isset($erreur))
						echo '<p class="erreur">'.$erreur.'</p>';

					elseif(isset($validate))
						echo '<p class="validate">'.$validate.'</p>';
			  ?>
			 <div class="row tableRow">
				<form method="POST">
					<div>
						<h3>Destinataire : </h3>
					</div>
					
					<div>
						<select name="dest" class="custom-select">
							<option selected value="">Pseudo :</option>
								<?php while($d = $destinataires->fetch()):  ?>
							<option><?= $d['User_Pseudo'] ?></option>
								<?php endwhile ?>
						</select>
					</div>	
					
					<div>
						<input  class="form-control" type="text" maxlength="25" name="dest2" placeholder="Pseudo" />
					</div>

					<div>
						<h3>Message</h3>
					</div>

					<div>
						<textarea  class="form-control" name="text_message"></textarea>
					</div>

					<div>
						<input class="btn btn-primary btn-block" type="submit" name="form_message" />
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