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
		<div id="principal" class="col-md-8">
			<h2 id="title_news">Nouveau Sujet !</h2>
			<?php 	if(isset($erreur))
						echo '<p class="erreur">'.$erreur.'</p>';

					elseif(isset($validate))
						echo '<p class="validate">'.$validate.'</p>';
			  ?>
			<form method="POST">
				<table>
					<tr>
						<td class="first"><h3>Sujet</h3></td>
					</tr>
					<tr>
						<td><input type="text" size="70" maxlength="70" name="sujet" class="form-control"/></td>
					</tr>
					<tr>
						<td class="first"><h3>Catégorie</h3></td>
					</tr>
					<tr>
						<td>
							<select name="categorie" class="custom-select">
								<option <?php if(isset($get_categorie) AND $get_categorie == 1){echo 'selected';} ?> value="1">Forum général</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 2){echo 'selected';} ?> value="2">Groupe et projet simplon</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 3){echo 'selected';} ?> value="3">Groupe et projet personel</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 4){echo 'selected';} ?> value="4">Language de dev</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 5){echo 'selected';} ?> value="5">Exposés</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 8){echo 'selected';} ?> value="8">Evenement Simplon</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 7){echo 'selected';} ?> value="7">Partagez vos ressources</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 6){echo 'selected';} ?> value="6">Help! besoin d'aide</option>
								<option <?php if(isset($get_categorie) AND $get_categorie == 9){echo 'selected';} ?> value="9">Discussion libre</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="first"><h3>Message</h3></td>
					</tr>
					<tr>
						<td><textarea name="topic_text"class="form-control"></textarea></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="form_topic" class="btn btn-primary btn-block" />
						</td>
					</tr>
					
				</table>
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