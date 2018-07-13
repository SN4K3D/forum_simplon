-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 13 juil. 2018 à 11:03
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum_simplonmars`
--

-- --------------------------------------------------------

--
-- Structure de la table `banlist`
--

CREATE TABLE `banlist` (
  `ban_id` mediumint(8) UNSIGNED NOT NULL,
  `ban_idUser` mediumint(8) NOT NULL,
  `ban_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ban_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ban_start` int(11) NOT NULL,
  `ban_end` int(11) NOT NULL,
  `ban_exclude` int(11) NOT NULL,
  `ban_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `Forum_id` mediumint(8) UNSIGNED NOT NULL,
  `Forum_name` varchar(20) NOT NULL,
  `Forum_style` mediumint(8) NOT NULL,
  `Forum_password` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Forum_image` varchar(255) NOT NULL,
  `Forum_status` int(11) NOT NULL,
  `Forum_posts` int(11) NOT NULL,
  `Forum_topics` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`Forum_id`, `Forum_name`, `Forum_style`, `Forum_password`, `Forum_image`, `Forum_status`, `Forum_posts`, `Forum_topics`) VALUES
(1, 'Forum', 0, '', '', 0, 0, 9),
(1, 'Forum', 0, '', '', 0, 0, 9),
(2, 'Blog', 0, '', '', 0, 0, 0),
(2, 'Blog', 0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum_access`
--

CREATE TABLE `forum_access` (
  `Forum_id` mediumint(8) UNSIGNED NOT NULL,
  `User_id` mediumint(8) UNSIGNED NOT NULL,
  `Session_id` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum_track`
--

CREATE TABLE `forum_track` (
  `User_id` mediumint(8) UNSIGNED NOT NULL,
  `Forum_id` mediumint(8) UNSIGNED NOT NULL,
  `mark_time` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='info sujets non lus';

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE `group` (
  `Group_id` int(11) NOT NULL,
  `Group_type` int(11) NOT NULL,
  `Group_name` int(11) NOT NULL,
  `Group_avatar` int(11) NOT NULL,
  `Group_receive_pm` int(11) NOT NULL,
  `Group_limit_message` int(11) NOT NULL,
  `Group_max_recipient` int(11) NOT NULL,
  `Group_legend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE `log` (
  `log_id` mediumint(8) UNSIGNED NOT NULL,
  `log_type` tinyint(4) NOT NULL,
  `User_id` mediumint(8) NOT NULL,
  `Forum_id` mediumint(8) UNSIGNED NOT NULL,
  `Topic_id` mediumint(8) NOT NULL,
  `log_ip` varchar(40) NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_data` mediumtext NOT NULL,
  `log_operation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='logs administrateur, logs modérateur, logs erreur';

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `id_expediteur`, `id_destinataire`, `message`, `date`) VALUES
(1, 5, 9, 'Je suis un boss !', '0000-00-00 00:00:00'),
(2, 5, 5, 'je suis moi !', '2018-07-11 20:40:07'),
(3, 5, 7, 'cw', '2018-07-11 20:59:20'),
(4, 5, 9, 'cqwcw', '2018-07-11 20:59:36'),
(5, 5, 9, 'test', '2018-07-11 21:01:29'),
(6, 5, 5, 'like a boss !', '2018-07-11 21:02:04'),
(7, 5, 5, 'lol', '2018-07-11 21:07:20'),
(8, 5, 6, 'coucou régis', '2018-07-12 17:41:13'),
(9, 5, 9, 'coucou tu veut voir ma ', '2018-07-12 18:51:10');

-- --------------------------------------------------------

--
-- Structure de la table `moderator_cache`
--

CREATE TABLE `moderator_cache` (
  `Forum_id` mediumint(8) NOT NULL,
  `User_id` mediumint(8) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Group_id` mediumint(8) NOT NULL,
  `Group_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='liste des modérateur, affichage sur la page d''index du forum';

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `Post_id` mediumint(8) UNSIGNED NOT NULL,
  `Topic_id` mediumint(8) UNSIGNED NOT NULL,
  `Forum_id` mediumint(8) NOT NULL,
  `Post_Time` int(11) NOT NULL,
  `Post_approuved` tinyint(1) NOT NULL,
  `Post_reported` tinyint(1) NOT NULL,
  `Post_username` varchar(255) NOT NULL,
  `Post_subject` varchar(255) NOT NULL,
  `Post_text` mediumtext NOT NULL,
  `Post_edit_time` int(11) NOT NULL,
  `Post_edit_user` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='messages d''un sujet du forum';

-- --------------------------------------------------------

--
-- Structure de la table `priv_msgs`
--

CREATE TABLE `priv_msgs` (
  `msg_id` mediumint(8) UNSIGNED NOT NULL,
  `root_level` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `author_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `author_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `message_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_text` mediumtext COLLATE utf8_bin NOT NULL,
  `message_edit_user` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `message_edit_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `to_address` text COLLATE utf8_bin NOT NULL,
  `message_reported` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `priv_msgs_folder`
--

CREATE TABLE `priv_msgs_folder` (
  `folder_id` mediumint(8) UNSIGNED NOT NULL,
  `User_id` mediumint(8) UNSIGNED NOT NULL,
  `folder_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pm_count` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='répertoires de votre messagerie privée.';

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` int(10) UNSIGNED NOT NULL,
  `id_sujet` int(10) UNSIGNED NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `text_reponse` text NOT NULL,
  `date_reponse` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `id_sujet`, `id_auteur`, `text_reponse`, `date_reponse`) VALUES
(2, 2, 5, 'je suis romain et je répond a un sujet', '2018-07-11 11:37:55'),
(3, 8, 5, 'je rÃ©pond a tout ici aha\r\n', '2018-07-11 11:55:21'),
(4, 7, 5, 'mouahaha je me gave en rÃ©ponse !', '2018-07-11 12:09:58'),
(5, 7, 5, 'a', '2018-07-11 12:15:41'),
(6, 7, 5, 'z', '2018-07-11 12:18:40'),
(7, 7, 5, 'd', '2018-07-11 12:19:34'),
(8, 2, 6, 'ceci est une réponse !', '2018-07-12 16:33:56'),
(9, 11, 6, 'need +1', '2018-07-12 17:15:19'),
(10, 9, 5, 'c\'est vraiment un sujet pouris !\r\n', '2018-07-12 18:50:53');

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

CREATE TABLE `styles` (
  `style_id` mediumint(8) UNSIGNED NOT NULL,
  `style_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `style_copyright` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `style_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `template_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `theme_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `imageset_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `topic_id` mediumint(8) UNSIGNED NOT NULL,
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_approved` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `topic_reported` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `topic_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_poster` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_time_limit` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_views` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_replies` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_replies_real` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_status` tinyint(3) NOT NULL DEFAULT '0',
  `topic_type` tinyint(3) NOT NULL DEFAULT '0',
  `topic_first_post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_first_poster_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_poster_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_poster_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_view_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`topic_id`, `forum_id`, `topic_approved`, `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`, `topic_views`, `topic_replies`, `topic_replies_real`, `topic_status`, `topic_type`, `topic_first_post_id`, `topic_first_poster_name`, `topic_last_post_id`, `topic_last_poster_id`, `topic_last_poster_name`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`) VALUES
(1, 0, 1, 0, 'forum général', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(2, 0, 1, 0, 'Groupes et Projets Simplon', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(3, 0, 1, 0, 'Groupes et Projets hors simplon', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(4, 0, 1, 0, 'Les languages de developpement', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(5, 0, 1, 0, 'Vos exposés', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(6, 0, 1, 0, 'Help Me', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(7, 0, 1, 0, 'Partagez vos ressources', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(8, 0, 1, 0, 'Événements Simplon', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0),
(9, 0, 1, 0, 'Discussion libre', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topics_posted`
--

CREATE TABLE `topics_posted` (
  `id_topic_post` int(10) UNSIGNED NOT NULL,
  `sujet` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `categorie` int(11) NOT NULL,
  `text` text CHARACTER SET utf8mb4 NOT NULL,
  `auteur` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `topics_posted`
--

INSERT INTO `topics_posted` (`id_topic_post`, `sujet`, `categorie`, `text`, `auteur`, `post_time`) VALUES
(2, 'groupe et projet simplon', 1, 'test 2', '5', '2018-07-06 19:05:13'),
(7, 'ceci est un projet de groupe ', 2, 'ssz', '9', '2018-07-06 22:36:48'),
(8, '2em', 1, 'aa', '9', '2018-07-06 22:45:42'),
(9, '3em ', 1, 'aa', '9', '2018-07-06 22:45:47'),
(10, 'je créé un lonnnnng text ', 4, 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', '5', '2018-07-09 19:39:32'),
(11, 'Besoin de minerai', 7, 'donez donez donez donez donez !!', '6', '2018-07-12 17:15:04');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `User_Pseudo` text,
  `User_Nom` text,
  `User_Prenom` text,
  `User_Email` text,
  `User_Password` text CHARACTER SET utf8mb4,
  `User_Birthday` date DEFAULT NULL,
  `User_Type` int(11) DEFAULT NULL,
  `User_Genre` varchar(20) DEFAULT NULL,
  `User_Location` text CHARACTER SET utf8mb4 NOT NULL,
  `Pays` varchar(20) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `User_Interest` text,
  `User_Date_Inscription` datetime DEFAULT NULL,
  `User_Nbr_Message` int(11) DEFAULT NULL,
  `User_Last_Connection` datetime DEFAULT NULL,
  `User_ip` varchar(40) NOT NULL,
  `User_LastPost` int(11) NOT NULL,
  `User_Group_id` int(11) NOT NULL,
  `User_last_search` int(11) NOT NULL,
  `User_posts` int(11) NOT NULL,
  `User_WebSite` varchar(255) NOT NULL,
  `User_NewPassWord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table User';

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`User_id`, `User_Pseudo`, `User_Nom`, `User_Prenom`, `User_Email`, `User_Password`, `User_Birthday`, `User_Type`, `User_Genre`, `User_Location`, `Pays`, `Region`, `User_Interest`, `User_Date_Inscription`, `User_Nbr_Message`, `User_Last_Connection`, `User_ip`, `User_LastPost`, `User_Group_id`, `User_last_search`, `User_posts`, `User_WebSite`, `User_NewPassWord`) VALUES
(5, 'Snakes', 'JOLIVET', 'Romain', 'novixjo@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1992-02-28', NULL, 'Femme', '18 rue des pergolas', '1992-02-28', '13127  ', 'WOW', NULL, NULL, NULL, '', 0, 0, 0, 0, 'cvjolivet.000webhostapp.com', 0),
(6, 'regis', NULL, NULL, 'regis@aha.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '0', 0),
(7, 'marine', NULL, NULL, 'bla@mail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '0', 0),
(9, 'manonnoblet', NULL, NULL, 'manon@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '0', 0),
(10, 'fab', NULL, NULL, 'aha@mail.com', 'fb96549631c835eb239cd614cc6b5cb7d295121a', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_group`
--

CREATE TABLE `user_group` (
  `Group_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Group_Leader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `priv_msgs`
--
ALTER TABLE `priv_msgs`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `author_ip` (`author_ip`),
  ADD KEY `message_time` (`message_time`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `root_level` (`root_level`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`);

--
-- Index pour la table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`style_id`),
  ADD UNIQUE KEY `style_name` (`style_name`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `theme_id` (`theme_id`),
  ADD KEY `imageset_id` (`imageset_id`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `forum_id_type` (`forum_id`,`topic_type`),
  ADD KEY `last_post_time` (`topic_last_post_time`),
  ADD KEY `topic_approved` (`topic_approved`);

--
-- Index pour la table `topics_posted`
--
ALTER TABLE `topics_posted`
  ADD UNIQUE KEY `id_topic_posted` (`id_topic_post`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD KEY `id` (`User_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `priv_msgs`
--
ALTER TABLE `priv_msgs`
  MODIFY `msg_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `style_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `topics_posted`
--
ALTER TABLE `topics_posted`
  MODIFY `id_topic_post` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
