-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 juin 2021 à 00:20
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog-gaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) DEFAULT NULL,
  `imgUrl` varchar(300) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `categorieId` int(11) NOT NULL,
  `gameCategorieId` int(11) NOT NULL,
  `auteurId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL,
  `hardId` int(11) NOT NULL,
  `star` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`articleId`),
  KEY `FK_ARTICLES_CATEGORIE` (`categorieId`),
  KEY `FK_ARTICLES_GAMECATEGORY` (`gameCategorieId`),
  KEY `FK_ARTICLES_USERS` (`auteurId`),
  KEY `FK_ARTICLES_JEUX` (`gameId`),
  KEY `FK_ARTICLES_HARDWARE` (`hardId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleId`, `titre`, `imgUrl`, `content`, `date`, `categorieId`, `gameCategorieId`, `auteurId`, `gameId`, `hardId`, `star`) VALUES
(1, 'test', '../../src/img/article/1624620220returnal.jpg', '<p>Le jeu est-il trop difficile? Les casu se f&acirc;che</p>', '2021-06-25', 18, 1, 4, 1, 8, 0),
(2, 'Ratchet & Clank', '../../src/img/article/16246206321624300521011.jpg', '<p>Ratchet c\'est chouette, mais je n\'ai pas la ps5 :(</p>', '2021-06-25', 1, 8, 4, 7, 2, 1),
(4, 'Scarlet Nexus: Bande son qui fâche?', '../../src/img/article/1624648333Scarlet.jpg', '<p>Defaut principal du jeux apr&egrave;s une heure de test, la bande sont style electro. Je n\'aime pas l\'&eacute;lectro, c\'est le mal croyer moi je suis un professionel</p>', '2021-06-25', 18, 5, 4, 8, 8, 1),
(5, 'Scarlet Nexus: enfin sortit', '../../src/img/article/1624648565scarlet_nexus_cast_4096.0.jpeg', '<p>Il est l&agrave;, jouez donc !</p>', '2021-06-25', 1, 5, 4, 8, 8, 1),
(6, 'Roguebook: L\'équilibrage inexistant', '../../src/img/article/1624648869roguebook-test-01.jpg', '<p>Ce jeu fait par des Belge manque d\'&eacute;quilibrage c\'est une catastrophe, 2 perso sont OP et le reste malgr&egrave;s les nerfs, Seifer + Sorroco, la game est win</p>', '2021-06-25', 18, 1, 4, 9, 8, 1),
(7, 'Minecraft: trop effrayant pour les enfants?', '../../src/img/article/1624649251Scarlet.jpg', '<p>Des parents indign&eacute; et effray&eacute; apr les monstres de minecraft luttent pour faire interdire le jeu aux mineurs</p>', '2021-06-25', 1, 1, 4, 10, 8, 1),
(8, 'TEST de Mario Golf Super Rush', '../../src/img/article/1624794815game-reviews-mario-golf-super-rush-switch-review.jpg', '<p><span style=\"color: #585455; font-family: roboto_slab, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Le nombre r&eacute;duit de parcours propos&eacute; au d&eacute;part annonce d\'embl&eacute;e la couleur&nbsp;</span></p>', '2021-06-27', 18, 1, 4, 11, 5, 1),
(9, 'FF VII Remake : Des pistes pour la suite', '../../src/img/article/1624795588KN7BzAENC64SwYv4jGWXEc.jpg', '<p><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px #ffffff; font-weight: bold; color: #585455; font-family: roboto_slab, Arial, Helvetica, sans-serif; text-align: justify;\">Aujourd\'hui, c\'est le cor&eacute;alisateur Motomu Toriyama qui s\'empare du micro via une interview post&eacute;e sur le site officiel de&nbsp;<a style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: 0px 0px; text-decoration-line: none; color: #f3782d;\" href=\"https://square-enix-games.com/en_US/news/honeybee-inn-final-fantasy-vii-remake-intergrade\" target=\"_blank\" rel=\"nofollow noopener\">Square Enix ...</a></span></p>', '2021-06-27', 1, 5, 4, 12, 3, 1),
(10, 'TEST Legend of Mana : Le remaster se fait rosser ?', '../../src/img/article/1624796070image_2021-06-27_141400.png', '<p><span style=\"color: #585455; font-family: roboto_slab, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Pour ceux qui n\'aurait pas eu la chance de se procurer le quatri&egrave;me &eacute;pisode de la s&eacute;rie en import &agrave; sa sortie, rappelons que&nbsp;</span><em style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px #ffffff; color: #585455; font-family: roboto_slab, Arial, Helvetica, sans-serif; text-align: justify;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background: 0px 0px; font-weight: bold;\">Legend of Mana</span></em><span style=\"color: #585455; font-family: roboto_slab, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;se distingue des opus pr&eacute;c&eacute;dents en proposant un cheminement bien diff&eacute;rent, presque &agrave; la carte : au fur et &agrave; mesure de l\'aventure tr&egrave;s chapitr&eacute;e, notre h&eacute;ros (ou h&eacute;ro&iuml;ne) acquiert des artefacts qui lui permettent de placer sur une carte des environnements toujours plus vari&eacute;s. Bourgades, donjons et autres zones &agrave; explorer se d&eacute;couvrent ainsi au compte-goutte, et offrent un cheminement bien diff&eacute;rent, une complexit&eacute; qui rend cette premi&egrave;re traduction dans notre belle langue encore plus n&eacute;cessaire.&nbsp;</span></p>', '2021-06-27', 18, 5, 4, 13, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorieId` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categorieId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorieId`, `nomCategorie`) VALUES
(1, 'News'),
(11, 'Preview'),
(18, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `commentaireId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `auteurId` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `dateCommentaire` date DEFAULT NULL,
  `contenu` varchar(300) DEFAULT NULL,
  `reported` int(11) NOT NULL,
  PRIMARY KEY (`commentaireId`),
  KEY `FK_COMMENTAIRE_ARTICLES` (`articleId`),
  KEY `FK_COMMENTAIRE_USERS` (`auteurId`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`commentaireId`, `articleId`, `auteurId`, `pseudo`, `dateCommentaire`, `contenu`, `reported`) VALUES
(76, 4, 6, 'kikoo6030', '2021-06-28', 'GNEU GNEU GNEU MOA GAIME PA LE SON, BHA EN FETE MOA O6', 0),
(3, 3, 4, 'admin', '2021-06-25', 'test de commentaire numéro 2', 0),
(75, 5, 6, 'kikoo6030', '2021-06-28', 'OSEF', 1),
(74, 6, 6, 'kikoo6030', '2021-06-28', 'LAI JE DE KART C VRAIMAN NUL PERSON JOU A SA', 1),
(73, 7, 6, 'kikoo6030', '2021-06-28', 'LOL KI JOU ENKOR A MINECRAFT EN 2021 C POUR LAI BEBE', 1),
(72, 8, 0, 'Anonyme', '2021-06-28', 'Le jeu est meilleur qu\'il en à l\'air, à essayer absolument.', 0),
(71, 1, 0, 'Anonyme', '2021-06-27', 'Je suis casu et je suis pas fâché! Stop de faire des généralités !', 0),
(70, 4, 0, 'Anonyme', '2021-06-27', 'Moi je crois au professionnalisme de cet article', 0),
(69, 9, 6, 'kikoo6030', '2021-06-27', 'LOL XD PTDR LOLOLOLOLO', 0),
(68, 10, 6, 'kikoo6030', '2021-06-27', 'C DE LA MERD G PERDU APRAI 2 MIN , LAIKILIBRAJE ES MAUVER DAISINSTALAI APRE 3 MIN DE JE, REMBOURSAI MOA DE CET ARNAK!!!!', 0),
(67, 8, 6, 'kikoo6030', '2021-06-27', 'LOL, JEME TAPAIS DANS UN BALON AVEK MON LON BATON', 0),
(66, 10, 5, 'NulSurVingt', '2021-06-27', 'Encore un remaster, ils n\'ont pas envie de sortir des nouveaux jeux plutôt que de recycler de vielle license? ', 0),
(46, 3, 0, 'Anonyme', '2021-06-25', 'commentaire anonyme 1', 0),
(65, 9, 5, 'NulSurVingt', '2021-06-27', 'Nul, déjà que le jeu est épisodique mais en plus faut jouer a la version ps5 pour la vraie fin, une honte !!!', 1),
(64, 9, 4, 'admin', '2021-06-27', 'J\'ai hâte de voir :)', 0),
(63, 8, 5, 'NulSurVingt', '2021-06-27', 'Mario c\'est pour les bébés, testez des vrai jeux bandes de nuls !!!', 0),
(62, 2, 4, 'admin', '2021-06-25', 'J\'ai bien envie de le faire ce jeu !', 0),
(61, 2, 5, 'NulSurVingt', '2021-06-25', 'Triste pour toi :\'(', 0),
(60, 3, 0, 'Anonyme', '2021-06-25', 'Commentaire anonyme 3', 0),
(37, 3, 4, 'admin', '2021-06-25', 'commentaire 4', 0),
(77, 2, 6, 'kikoo6030', '2021-06-28', 'JE PLEUR', 0),
(78, 10, 5, 'NulSurVingt', '2021-06-28', 'Je n\'ai toujours pas changé d\'avis, je tenais à le dire', 0),
(83, 10, 10, 'GuyVilain', '2021-06-28', 'La personne qui a codé cet espace commentaire devrait réussir son examen !', 1);

-- --------------------------------------------------------

--
-- Structure de la table `gamecategory`
--

DROP TABLE IF EXISTS `gamecategory`;
CREATE TABLE IF NOT EXISTS `gamecategory` (
  `gameCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gameCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gamecategory`
--

INSERT INTO `gamecategory` (`gameCategoryId`, `genre`) VALUES
(1, 'Rogue-lite'),
(5, 'RPG'),
(7, 'Combat 2Vs2'),
(8, 'Platformer'),
(12, 'FPS'),
(13, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE IF NOT EXISTS `hardware` (
  `hardId` int(11) NOT NULL AUTO_INCREMENT,
  `console` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`hardId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hardware`
--

INSERT INTO `hardware` (`hardId`, `console`) VALUES
(7, 'XBOX Serie S/X'),
(2, 'PS5'),
(3, 'PS4'),
(4, 'XBOB ONE'),
(5, 'SWITCH'),
(8, 'PC MASTER RACE');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `gameId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(300) DEFAULT NULL,
  `consoleId` int(11) NOT NULL,
  `gameCategoryId` int(11) NOT NULL,
  `developpeur` varchar(50) DEFAULT NULL,
  `editeur` varchar(50) DEFAULT NULL,
  `dateDeSortie` datetime DEFAULT NULL,
  `cover` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`gameId`),
  KEY `FK_JEUX_HARDWARE` (`consoleId`),
  KEY `FK_JEUX_GAMECATEGORY` (`gameCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`gameId`, `nom`, `consoleId`, `gameCategoryId`, `developpeur`, `editeur`, `dateDeSortie`, `cover`) VALUES
(1, 'Returnal', 2, 1, 'HouseMarque', 'sony', '2021-04-30 00:00:00', '../../src/img/cover/returnal-PS5-COVER.jpg'),
(2, 'Virtua Fighter 5 Ultimate Showdown', 3, 7, 'SEGA-AM2', 'SEGA', '2021-06-01 00:00:00', '../../src/img/cover/virtua-PS4-COVER.png'),
(3, 'Demon\'s Souls', 2, 5, 'Blue Point', 'Sony', '2020-11-19 00:00:00', '../../src/img/cover/Demons-Souls-PS5-COVER.png'),
(7, 'Rachet & Clank Rift appart', 2, 8, 'Insomniac Games', 'Sony Interactive Entertainment', '2021-06-11 00:00:00', '../../src/img/cover/riftApart-PS5-COVER'),
(8, 'Scarlet Nexus', 8, 5, 'BANDAI NAMCO Studios', ' BANDAI NAMCO', '2021-06-25 00:00:00', '../../src/img/cover/Scarlet-Nexus-PC-COVER.png'),
(9, 'Roguebook', 7, 1, 'Abrakam Entertainment S.A.', 'BIGBEN INTERACTIVE', '2021-06-06 00:00:00', '../../src/img/cover/RogueBook-PC-COVER.png'),
(10, 'Minecraft', 8, 1, 'Mojang', 'Mojang', '2010-01-25 00:00:00', '../../src/img/cover/Minecraft-PC-COVER'),
(11, 'Mario Golf Super Rush', 5, 13, 'Nintendo', 'Nintendo', '2021-06-11 00:00:00', '../../src/img/cover/Mario-Golf-Super-Rush-SWITCH-COVER.jpg'),
(12, 'Final Fantasy VII Remake', 3, 5, 'Square Enix', 'Square enix', '2021-04-10 00:00:00', '../../src/img/cover/ff7-PS4-COVER.jpg'),
(13, 'Legend of Mana Remaster', 5, 5, 'Square Enix', 'Square Enix', '2021-06-25 00:00:00', '../../src/img/cover/legend-of-mana-SWITCH-COVER.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`roleId`, `nomRole`) VALUES
(1, 'admin'),
(2, 'auteur'),
(3, 'moderateur'),
(4, 'membre'),
(5, 'Temporaire');

-- --------------------------------------------------------

--
-- Structure de la table `stars`
--

DROP TABLE IF EXISTS `stars`;
CREATE TABLE IF NOT EXISTS `stars` (
  `starId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  PRIMARY KEY (`starId`),
  KEY `FK_STARS_ARTICLES` (`articleId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stars`
--

INSERT INTO `stars` (`starId`, `articleId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `tampon`
--

DROP TABLE IF EXISTS `tampon`;
CREATE TABLE IF NOT EXISTS `tampon` (
  `tamponid` int(11) NOT NULL AUTO_INCREMENT,
  `liens` varchar(300) DEFAULT NULL,
  `auteurid` int(11) NOT NULL,
  PRIMARY KEY (`tamponid`),
  KEY `FK_USER_TAMPON` (`auteurid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(300) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `ban` varchar(50) DEFAULT NULL,
  `valid` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK_USER_ROLE` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `avatar`, `login`, `nom`, `prenom`, `email`, `mdp`, `roleId`, `ban`, `valid`) VALUES
(6, '../../src/img/avatar/162479637235967-full.jpg', 'kikoo6030', 'Croft', 'Laurent', 'kikoo@gmail.com', 'ab4f63f9ac65152575886860dde480a1068f6a66215c', 4, '068f6a66215c', ''),
(5, '../../src/img/avatar/1624620951boo.jpg', 'NulSurVingt', 'Boudejambon', 'Justin', 'jambon@live.be', 'ab4f63f9ac65152575886860dde480a1822ab0dbb330629f', 4, '822ab0dbb330629f', ''),
(4, '../../src/img/avatar/1624922936MzafSH9.png', 'admin', 'Lejeune', 'Medhy', 'admin@live.be', 'ab4f63f9ac65152575886860dde480a143602d2a8fde6', 1, '43602d2a8fde6', ''),
(8, '../../src/img/site/defaut_avatar.png', 'test', 'Sterone', 'Testo', 'muscu@lation.be', 'ab4f63f9ac65152575886860dde480a1c360673a30155', 4, '', ''),
(9, '../../src/img/site/defaut_avatar.png', 'random', 'lafarge', 'brandon', 'lafrite@mayo.com', 'ab4f63f9ac65152575886860dde480a12040153bfcabeed6e', 4, '2040153bfcabeed6e', ''),
(10, '../../src/img/avatar/162492324816217960340.jpeg', 'GuyVilain', 'Vilain', 'Guy', 'gvilain@cidc.be', 'ab4f63f9ac65152575886860dde480a1706f9b377b8d0', 4, '706f9b377b8d0', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
