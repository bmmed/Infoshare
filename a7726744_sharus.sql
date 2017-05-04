
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2017 at 03:22 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a7726744_sharus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_pseudo` varchar(50) NOT NULL,
  `admin_nom` varchar(50) NOT NULL,
  `admin_prenom` varchar(50) NOT NULL,
  `admin_m_p` varchar(250) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES(1, 'admin', 'bm', 'med', '4a7d1ed414474e4033ac29ccb8653d9b');

-- --------------------------------------------------------

--
-- Table structure for table `affichage`
--

CREATE TABLE `affichage` (
  `aff_id` int(11) NOT NULL AUTO_INCREMENT,
  `aff_nom` varchar(100) NOT NULL,
  `aff_titre` varchar(150) NOT NULL,
  `aff_date_pub` datetime NOT NULL,
  `aff_annee_univ` varchar(10) NOT NULL,
  `aff_type` varchar(100) NOT NULL,
  `affi_ext` varchar(200) NOT NULL,
  `affi_path` varchar(200) NOT NULL,
  PRIMARY KEY (`aff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `affichage`
--

INSERT INTO `affichage` VALUES(11, 'planning EMD.jpg', 'Planning EMD', '2016-04-13 19:15:01', 'l3', 'e_t', 'image/jpeg', '/upload/affichage/04-2016planning EMD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_date_pub` datetime NOT NULL,
  `art_titre` varchar(250) NOT NULL,
  `art_texte` text NOT NULL,
  `art_img_path` varchar(250) NOT NULL,
  `art_lien` varchar(500) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` VALUES(28, '2016-04-13 19:36:32', 'Concevez votre site web avec PHP et MySQL', 'PHP est un langage de crÃ©ation de sites web dynamique trÃ¨s populaire. Son rÃ´le est de gÃ©nÃ©rer des pages web HTML. Il permet de crÃ©er des blogs, des forums, des espaces membres... Facebook et Wikipedia sont des sites cÃ©lÃ¨bres dÃ©veloppÃ©s en PHP.', '/upload/img_article/04-2016PHP-MySQL-Training.jpg', 'https://openclassrooms.com/courses?isCoursesUrl=true');
INSERT INTO `article` VALUES(29, '2016-04-13 19:37:47', 'Introduction Ã  jQuery sur openclassrooms', 'jQuery est la bibliothÃ¨que JavaScript la plus utilisÃ©e et vous permet de crÃ©er des effets dynamiques sur vos pages web comme des changements de couleur, des animations, et des effets de fondu. Les combinaisons sont illimitÃ©es ! En apprenant les concepts de base de Javascript avant de plonger dans le monde de jQuery, comme nous allons faire dans ce cours, vous aurez une base solide pour vos prochains pas en dÃ©veloppement front end.', '/upload/img_article/04-2016drupal-and-jquery-logos.png', 'https://openclassrooms.com/courses?isCoursesUrl=true');
INSERT INTO `article` VALUES(30, '2016-04-13 19:41:12', 'Apprenez Ã  crÃ©er votre site web avec HTML5 et CSS3', 'Vous rÃªvez d''apprendre Ã  crÃ©er des sites web ? DÃ©butez avec ce cours qui vous enseignera tout ce qu''il faut savoir sur le dÃ©veloppement de sites web en HTML5 et CSS3 !', '/upload/img_article/04-2016505208_2307_4.jpg', 'https://openclassrooms.com/courses?isCoursesUrl=true');
INSERT INTO `article` VALUES(31, '2016-04-13 19:46:03', 'Par oÃ¹ commencer pour bien comprendre les expressions rÃ©guliÃ¨res ?', 'Les expressions rÃ©guliÃ¨res sont sans doute un des domaines les plus cryptiques que l''on puisse trouver en programmation (avec le Brainfuck. Si vous ne connaissez pas, allez jeter un oeil juste pour rigoler, Ã§a fait une bonne anecdote en repas de familles).', '/upload/img_article/04-2016Strips-Le-dernier-des-vrais-codeurs-650-final2.jpg', 'http://www.blogduwebdesign.com/tutoriel/commencer-bien-comprendre-expressions-regulieres/2143');
INSERT INTO `article` VALUES(32, '2016-04-13 19:46:37', 'CSS3 Flexbox - Plongez dans le CSS modernes avec RaphaÃ«l Goetter', 'La technique Flexbox existe depuis quelques annÃ©es mais restait peu utilisÃ©e Ã  cause de la compatibilitÃ© des navigateurs, dÃ©sormais les chiffres ont Ã©voluÃ© ! En fin 2015 c''est plus de 95% des navigateurs employÃ©s en France qui appliquent les propriÃ©tÃ©s de Flexbox. Il est temps d''exploiter son potentiel !', '/upload/img_article/04-2016flexbox-css3.jpg', 'http://www.blogduwebdesign.com/livre/CSS3-Flexbox-CSS-modernes-Raphael-Goetter/2138');
INSERT INTO `article` VALUES(34, '2016-04-13 20:00:45', 'Ajoutez du son Ã  vos prochains projets avec ces ressources Javascript ! avec Jamendo', 'Certains d''entre vous connaissent certainement dÃ©jÃ  ce service, qui propose une Ã©coute en streaming de nombreuses musiques gratuites, ainsi qu''une grande collection de musiques libres de droits pour vos projets multimedias.', '/upload/img_article/04-2016jamendo.png', 'http://www.blogduwebdesign.com/ressources-son/Ajoutez-son-musique-projets/2129');

-- --------------------------------------------------------

--
-- Table structure for table `cour`
--

CREATE TABLE `cour` (
  `cour_id` int(11) NOT NULL AUTO_INCREMENT,
  `cour_anne_univ` varchar(2) NOT NULL,
  `cour_module` varchar(50) NOT NULL,
  `cour_nom` varchar(50) NOT NULL,
  `cour_type` varchar(10) NOT NULL,
  `cour_date_pub` datetime NOT NULL,
  `cour_user_id` int(11) NOT NULL,
  `cour_path` varchar(250) NOT NULL,
  `cour_ext` varchar(200) NOT NULL,
  `cour_sign_cmpt` int(11) NOT NULL DEFAULT '0',
  `cour_sign_user_id` varchar(250) NOT NULL,
  PRIMARY KEY (`cour_id`),
  UNIQUE KEY `cour_path` (`cour_path`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `cour`
--

INSERT INTO `cour` VALUES(41, 'l3', 'System d''exploitation', 'chapitre4_1.pdf', 'cour', '2016-04-13 18:22:41', 26, '/upload/cour/13-04-2016_17_22_40chapitre4_1.pdf', 'application/pdf', 0, '');
INSERT INTO `cour` VALUES(42, 'l3', 'dth', 'TP3-Android-EnnoncÃ©.pdf', 'cour', '2016-04-22 10:18:37', 26, '/upload/cour/22-04-2016_09_18_36TP3-Android-EnnoncÃ©.pdf', 'application/pdf', 0, '');
INSERT INTO `cour` VALUES(43, 'l3', 'fnf', 'TP3-Android-EnnoncÃ©.pdf', 'cour', '2016-04-22 10:27:15', 26, '/upload/cour/22-04-2016_09_27_14TP3-Android-EnnoncÃ©.pdf', 'application/pdf', 0, '');
INSERT INTO `cour` VALUES(44, 'l3', 'dscdfw', 'chap02.docx', 'cour', '2016-06-08 21:59:58', 26, '/upload/cour/08-06-2016_20_59_57chap02.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '/26/');
INSERT INTO `cour` VALUES(45, 'l3', 'bdd', '02-Cryptographie classique.pdf', 'cour', '2016-06-09 10:44:51', 26, '/upload/cour/09-06-2016_09_44_5002-Cryptographie classique.pdf', 'application/pdf', 1, '/26/');

-- --------------------------------------------------------

--
-- Table structure for table `emd`
--

CREATE TABLE `emd` (
  `cour_id` int(11) NOT NULL AUTO_INCREMENT,
  `cour_anne_univ` varchar(2) NOT NULL,
  `cour_module` varchar(50) NOT NULL,
  `cour_nom` varchar(50) NOT NULL,
  `cour_type` varchar(10) NOT NULL,
  `cour_date_pub` datetime NOT NULL,
  `cour_user_id` int(11) NOT NULL,
  `cour_path` varchar(250) NOT NULL,
  `cour_ext` varchar(200) NOT NULL,
  `cour_sign_cmpt` int(11) NOT NULL DEFAULT '0',
  `cour_sign_user_id` varchar(250) NOT NULL,
  PRIMARY KEY (`cour_id`),
  UNIQUE KEY `cour_path` (`cour_path`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emd`
--


-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_user_id` int(11) NOT NULL,
  `msg_user_pseudo` varchar(50) NOT NULL,
  `msg_date_pub` datetime NOT NULL,
  `msg_titre` varchar(255) NOT NULL,
  `msg_texte` text NOT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `msg_user_id` (`msg_user_id`),
  KEY `msg_id` (`msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` VALUES(30, 26, 'bmmed', '2016-04-13 19:12:26', 'salut je suis BMMed', 'salut je suis BMMed');
INSERT INTO `msg` VALUES(31, -1, 'Administrateur', '2016-04-13 19:15:27', 'salut je suis l''adminstrateur', 'salut je suis l''adminstrateur');
INSERT INTO `msg` VALUES(33, 26, 'bmmed', '2016-10-17 09:38:31', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `outil`
--

CREATE TABLE `outil` (
  `outil_id` int(11) NOT NULL AUTO_INCREMENT,
  `outil_date_pub` datetime NOT NULL,
  `outil_nom` varchar(200) NOT NULL,
  `outil_lien` varchar(500) NOT NULL,
  `outil_annee_univ` varchar(2) NOT NULL,
  `outil_img_path` varchar(500) NOT NULL,
  PRIMARY KEY (`outil_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `outil`
--

INSERT INTO `outil` VALUES(5, '2016-04-13 19:25:40', 'notepad++', 'https://notepad-plus-plus.org/news/notepad-6.9.1-released.html', '', '/upload/img_outil/04-2016images.png');
INSERT INTO `outil` VALUES(7, '2016-04-13 19:27:55', 'brackets', 'https://github.com/adobe/brackets/releases/latest', '', '/upload/img_outil/04-2016qd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rep_msg`
--

CREATE TABLE `rep_msg` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_user_id` int(11) NOT NULL,
  `rep_user_pseudo` varchar(50) NOT NULL,
  `rep_msg_id` int(11) NOT NULL,
  `rep_date_pub` datetime NOT NULL,
  `rep_texte` text NOT NULL,
  PRIMARY KEY (`rep_id`),
  KEY `rep_msg_id` (`rep_msg_id`),
  KEY `rep_msg_id_2` (`rep_msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `rep_msg`
--

INSERT INTO `rep_msg` VALUES(70, 26, 'bmmed', 30, '2016-04-13 19:13:39', 'saluut!');
INSERT INTO `rep_msg` VALUES(71, 27, 'bmmed2', 30, '2016-05-14 15:48:14', 'bien venue !');
INSERT INTO `rep_msg` VALUES(72, -1, 'Adminstrateur', 30, '2016-05-14 15:48:46', 'bonjour');
INSERT INTO `rep_msg` VALUES(77, 26, 'bmmed', 30, '2016-12-28 14:41:20', 'Holla');

-- --------------------------------------------------------

--
-- Table structure for table `td`
--

CREATE TABLE `td` (
  `cour_id` int(11) NOT NULL AUTO_INCREMENT,
  `cour_anne_univ` varchar(2) NOT NULL,
  `cour_module` varchar(50) NOT NULL,
  `cour_nom` varchar(50) NOT NULL,
  `cour_type` varchar(10) NOT NULL,
  `cour_date_pub` datetime NOT NULL,
  `cour_user_id` int(11) NOT NULL,
  `cour_path` varchar(250) NOT NULL,
  `cour_ext` varchar(200) NOT NULL,
  `cour_sign_cmpt` int(11) NOT NULL DEFAULT '0',
  `cour_sign_user_id` varchar(250) NOT NULL,
  PRIMARY KEY (`cour_id`),
  UNIQUE KEY `cour_path` (`cour_path`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `td`
--

INSERT INTO `td` VALUES(25, 'l2', 'THL', 'ThL_serie2_2014.pdf', 'td', '2016-04-13 18:23:40', 26, '/upload/td/13-04-2016_17_23_39ThL_serie2_2014.pdf', 'application/pdf', 0, '');
INSERT INTO `td` VALUES(26, 'l2', 'thl', 'ThL_serie1_2014.pdf', 'td', '2016-04-13 19:07:42', 26, '/upload/td/13-04-2016_18_07_41ThL_serie1_2014.pdf', 'application/pdf', 0, '');
INSERT INTO `td` VALUES(28, 'l3', 'zdZDS', 'chap01.docx', 'td', '2016-06-08 21:56:57', 26, '/upload/td/08-06-2016_20_56_56chap01.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tp`
--

CREATE TABLE `tp` (
  `cour_id` int(11) NOT NULL AUTO_INCREMENT,
  `cour_anne_univ` varchar(2) NOT NULL,
  `cour_module` varchar(50) NOT NULL,
  `cour_nom` varchar(50) NOT NULL,
  `cour_type` varchar(10) NOT NULL,
  `cour_date_pub` datetime NOT NULL,
  `cour_user_id` int(11) NOT NULL,
  `cour_path` varchar(250) NOT NULL,
  `cour_ext` varchar(200) NOT NULL,
  `cour_sign_cmpt` int(11) NOT NULL DEFAULT '0',
  `cour_sign_user_id` varchar(250) NOT NULL,
  PRIMARY KEY (`cour_id`),
  UNIQUE KEY `cour_path` (`cour_path`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tp`
--

INSERT INTO `tp` VALUES(1, 'l3', 'Application web', 'TP3-Android-EnnoncÃ©.pdf', 'tp_corr', '2016-04-21 20:52:23', 26, '/upload/tp/21-04-2016_19_52_22TP3-Android-EnnoncÃ©.pdf', 'application/pdf', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(30) NOT NULL,
  `user_nom` varchar(50) NOT NULL,
  `user_prenom` varchar(50) NOT NULL,
  `user_date_nais` date NOT NULL,
  `user_sexe` char(1) NOT NULL,
  `user_annee_univ` varchar(2) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_m_p` varchar(250) NOT NULL,
  `user_img_path` varchar(100) NOT NULL,
  `user_date_insc` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`,`user_email`,`user_img_path`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(26, 'bmmed', 'bmmed', 'med', '1994-08-08', 'm', 'l3', 'bmm15@live.fr', 'aebe38447ebc28bc964eb716709ae28f', '/upload/img_user/05-2016whistler_coast_mountains_dock-wallpaper-1600x900.jpg', '2016-04-13 18:20:53');
INSERT INTO `user` VALUES(27, 'bmmed2', 'buhn', 'nuin', '1995-12-01', 'm', 'm1', 'bmm15@live.fr', '781e5e245d69b566979b86e28d23f2c7', '/upload/img_user/05-2016iron_man_abstract_art-wallpaper-1920x1080.jpg', '2016-05-03 12:17:31');
INSERT INTO `user` VALUES(33, 'Amrane59', 'Alik', 'Amrane', '1994-11-14', 'm', 'm1', 'erfhhe@erf.fr', 'e10adc3949ba59abbe56e057f20f883e', '/img/user_m.png', '2017-01-05 13:02:16');
