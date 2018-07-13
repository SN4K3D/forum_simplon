<?php
require_once("../include/connexion_bdd.php");
$post_recent = $bdd->query('SELECT * FROM reponse LEFT JOIN user ON reponse.id_auteur = user.User_id LEFT JOIN topics_posted ON reponse.id_sujet = topics_posted.id_topic_post ORDER BY id_reponse DESC LIMIT 0,5');
while($p = $post_recent->fetch()): ?>
	<p><a href="text_topic.php?sujet=<?= $p['sujet'].'&id_topic_post='.$p['id_sujet'] ?>"><?= $p['text_reponse'] ?></a> Par: <?= $p['User_Pseudo'] ?> Le: <?= $p['date_reponse'] ?></p>
<?php endwhile ?>