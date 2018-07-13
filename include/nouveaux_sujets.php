<?php
require_once("../include/connexion_bdd.php");
$nouveaux_sujets = $bdd->query('SELECT * FROM topics_posted LEFT JOIN user ON topics_posted.auteur = user.User_id  ORDER BY id_topic_post DESC LIMIT 0,5');
while($n = $nouveaux_sujets->fetch()): ?>
	<p><a href="text_topic.php?sujet=<?= $n['sujet'].'&id_topic_post='.$n['id_topic_post'] ?>" ><?= $n['sujet'] ?></a> Par: <?= $n['User_Pseudo'] ?> Le: <?= $n['post_time'] ?></p>
<?php endwhile ?>