<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Forum Simplonien</title>
	<?php include('../include/include.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/topics.view.css" />

</head>
<body>
	<header>
	<?php include ("../src/header.php"); ?>
	</header>
	<div class="container-fluid">
		<div id="corp_page" class="row">
			<div class="col-md-8" id="principal">
				<h2 align="center" class="border" id="title_news">Panel Du BOSS !</h2>
				<br /><br />
					<table>
						<tr>
							<th>Membres</th>
							<th>Infos</th>
							 <th>Actions</th>
						</tr>
						<?php while($m = $membres->fetch()):  ?>
						<tr>
							<td class="border" >
								<h5><?= 'Id : '.$m['User_id'].' | Pseudo :'.$m['User_Pseudo'] ?></h5>
							</td  class="border">
							<td  class="border"><?= 'Mail : '.$m['User_Email'] ?></td>
							<td  class="border"><a class="erreur" href="administration.php?suprimer=<?= $m['User_id'] ?>">Suprimer</a></td>
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