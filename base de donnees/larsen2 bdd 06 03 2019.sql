-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 mars 2019 à 12:53
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `larsen2`
--

-- --------------------------------------------------------

--
-- Structure de la table `poqs_event`
--

DROP TABLE IF EXISTS `poqs_event`;
CREATE TABLE IF NOT EXISTS `poqs_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_picture` varchar(255) NOT NULL,
  `event_description` varchar(60) NOT NULL,
  `event_free` tinyint(4) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `showplaces_id` int(11) NOT NULL,
  `eventsub_category_id` int(11) NOT NULL,
  `eventcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `poqs_event_poqs_users_FK` (`users_id`),
  KEY `poqs_event_poqs_showplaces0_FK` (`showplaces_id`),
  KEY `poqs_event_poqs_eventsub_category1_FK` (`eventsub_category_id`),
  KEY `poqs_event_poqs_eventcategory2_FK` (`eventcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poqs_event`
--

INSERT INTO `poqs_event` (`event_id`, `event_title`, `event_date`, `event_time`, `event_picture`, `event_description`, `event_free`, `users_id`, `showplaces_id`, `eventsub_category_id`, `eventcategory_id`) VALUES
(2, 'Spectacle de danse contemporaine', '2019-04-17', '20:30:00', 'Fotolia_50479544_Subscription_Monthly_M.jpg', 'danse classique !!!!!!!!!', NULL, 2, 2, 2, 2),
(3, 'Expo sur l\'Art moderne', '2019-04-16', '14:00:00', '386217-exposition-madagascar-au-musee-du-quai-branly-26.jpg', 'dsds sqdsd sqdsdsd sdsdsds dsdsdssd', NULL, 2, 5, 7, 3),
(14, 'théâtre contemporain', '2019-04-21', '19:30:00', 'F201303140908032914123210.jpg', 'théatre moderne à faire en famille', NULL, 14, 2, 4, 2),
(15, 'Cirque du soleil', '2019-04-18', '20:30:00', 'bazzar_highlights_trapeze_1280x853.jpg', 'superbe tournée du cirque du soleil', NULL, 14, 2, 3, 2),
(16, 'JON SPENCER &amp; THE HITMAKERS', '2019-04-30', '20:00:00', 'Jon-Spencer-Spencer-Sings-The-Hits.jpg', 'la légende du blues subversif', NULL, 14, 1, 1, 1),
(17, 'nouveau show de djamel', '2019-03-02', '20:30:00', 'STPAprEU_400x400.jpg', 'djamel est un artiste', NULL, 4, 2, 5, 2),
(18, 'concert rock alternatif', '2019-03-02', '20:30:00', '640_gorillaz_2_geneve_denholm_hewlett.jpg', 'Il enchaîne après les premiers rôles, dans un ', NULL, 4, 1, 1, 1),
(20, 'Raoul Dufy', '2019-05-18', '16:00:00', 'cahier-illustre-par-raoul-dufy-d-apres-oeuvre-la-promenade-des-anglais-a-nice.jpg', 'Souvenir du Havre', NULL, 4, 5, 6, 3),
(21, 'MONTAGNES RUSSES', '2019-03-27', '19:30:00', 'couv-montagnes-russes.jpg', 'CIE FORMIGA ATOMICA', NULL, 14, 2, 4, 2),
(23, 'Atelier de poterie', '2019-04-28', '14:30:00', 'atelier_poterie.jpg', 'Atelier de poterie', NULL, 2, 5, 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `poqs_eventcategory`
--

DROP TABLE IF EXISTS `poqs_eventcategory`;
CREATE TABLE IF NOT EXISTS `poqs_eventcategory` (
  `eventcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `eventcategory_name` varchar(20) NOT NULL,
  PRIMARY KEY (`eventcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poqs_eventcategory`
--

INSERT INTO `poqs_eventcategory` (`eventcategory_id`, `eventcategory_name`) VALUES
(1, 'concert'),
(2, 'spectacle'),
(3, 'expos');

-- --------------------------------------------------------

--
-- Structure de la table `poqs_eventsub_category`
--

DROP TABLE IF EXISTS `poqs_eventsub_category`;
CREATE TABLE IF NOT EXISTS `poqs_eventsub_category` (
  `eventsub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `eventsub_category_name` varchar(20) NOT NULL,
  `eventcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`eventsub_category_id`),
  KEY `poqs_eventsub_category_poqs_eventcategory_FK` (`eventcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poqs_eventsub_category`
--

INSERT INTO `poqs_eventsub_category` (`eventsub_category_id`, `eventsub_category_name`, `eventcategory_id`) VALUES
(1, 'concert', 1),
(2, 'danse', 2),
(3, 'cirque', 2),
(4, 'théatre', 2),
(5, 'humour', 2),
(6, 'expos', 3),
(7, 'musées', 3),
(8, 'balade', 3),
(9, 'atelier', 3);

-- --------------------------------------------------------

--
-- Structure de la table `poqs_showplaces`
--

DROP TABLE IF EXISTS `poqs_showplaces`;
CREATE TABLE IF NOT EXISTS `poqs_showplaces` (
  `showplaces_id` int(11) NOT NULL AUTO_INCREMENT,
  `showplaces_name` varchar(50) NOT NULL,
  PRIMARY KEY (`showplaces_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poqs_showplaces`
--

INSERT INTO `poqs_showplaces` (`showplaces_id`, `showplaces_name`) VALUES
(1, 'le 106 - 76000 Rouen'),
(2, 'le Volcan - 76600 Le Havre'),
(3, 'théatre Juliobona - 76170 Lillebonne'),
(4, 'le Tetris - 76600 Le Havre'),
(5, 'le MUMA - 76600 le havre');

-- --------------------------------------------------------

--
-- Structure de la table `poqs_useralerts`
--

DROP TABLE IF EXISTS `poqs_useralerts`;
CREATE TABLE IF NOT EXISTS `poqs_useralerts` (
  `useralerts_id` int(11) NOT NULL AUTO_INCREMENT,
  `useralerts_name` varchar(20) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`useralerts_id`),
  KEY `poqs_useralerts_poqs_users_FK` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poqs_users`
--

DROP TABLE IF EXISTS `poqs_users`;
CREATE TABLE IF NOT EXISTS `poqs_users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_name` varchar(25) NOT NULL,
  `users_firstname` varchar(25) NOT NULL,
  `users_mail` varchar(25) NOT NULL,
  `users_age` int(11) NOT NULL,
  `users_login` varchar(20) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_admin` tinyint(1) NOT NULL,
  `usertypes_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`),
  KEY `poqs_users_poqs_usertypes_FK` (`usertypes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poqs_users`
--

INSERT INTO `poqs_users` (`users_id`, `users_name`, `users_firstname`, `users_mail`, `users_age`, `users_login`, `users_password`, `users_admin`, `usertypes_id`) VALUES
(2, 'thorel', 'laetitia', 'laetis76@gmail.com', 39, 'fiadone', '$2y$10$f6d/e3tGsd2rsrFH8C7kPOvnTPwNKXXKZn5mvh/AwoyYcHiFPpcwi', 0, 2),
(3, 'revel', 'amelie', 'amelie@novei.fr', 22, 'azert', '$2y$10$Q3KV.OTGats3jbsRne8lDulMCAifL6JGMx86Nh4fcs0QSeomFkehC', 0, 2),
(4, 'julien', 'berneschi', 'jberneschi@hotmail.fr', 41, 'julio', '$2y$10$M/1FMN8c1ovhRuTnTR4lkOUB0mpwIaOYhVISkRa8eG2yxxBAP8A1S', 0, 2),
(6, 'Doe', 'john', 'jdoe@hotmail.fr', 45, 'john', '$2y$10$FZTQAhFeXQDmvb1tiFodquoH2V4FhozrBQAXBkIm/H2IrgtTlQKNa', 0, 2),
(8, 'dupont', 'robert', 'rdupont@gmail.com', 54, 'rob', '$2y$10$JjVbB3vSpD0RVHtlH9BTgefwml/08rFn1p6ezpFLvoA4CF7cky726', 0, 1),
(11, 'levasseur', 'karl', 'klevasseur@gmail.Com', 28, 'karlito', '$2y$10$ZhpHdfqFliqa3miROmKMBOoRVLKQcT56yA6QNs7SHiq0ouVGuSboa', 0, 2),
(13, 'mallet', 'angela', 'angelamallet@gmail.com', 40, 'angela', '$2y$10$5GnTzA/4.JfAcB4XYbcC9uD/jtKt9YDQmHI1wqJ1oIomJgA1PYaAm', 0, 2),
(14, 'berneschi', 'claudine', 'cberneschi@orange.fr', 70, 'claudine', '$2y$10$cSA2OtETdEITSRHy5lHesuVCgSJYWdPLHyt5YPGsClCRJsuN3AGAG', 0, 2),
(15, 'geneau', 'marie', 'mgeneau@gmail.com', 38, 'marie', '$2y$10$cwx3UBI57NHIM9CsR9AokeQHQc70Cp.d5ixr3dDVDjlOdXLAjciFa', 0, 1),
(16, 'miel', 'joseph', 'jmiel@caramail.com', 45, 'jojo', '$2y$10$Fy3mxDJn49c2fTGtLWtQxOVRBGTApfjgmn1KQTjVgVyrpYKfdK4Sm', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `poqs_usersopinion`
--

DROP TABLE IF EXISTS `poqs_usersopinion`;
CREATE TABLE IF NOT EXISTS `poqs_usersopinion` (
  `usersopinion_id` int(11) NOT NULL AUTO_INCREMENT,
  `usersopinion_opinion` varchar(150) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`usersopinion_id`),
  KEY `poqs_usersopinion_poqs_users_FK` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poqs_usertypes`
--

DROP TABLE IF EXISTS `poqs_usertypes`;
CREATE TABLE IF NOT EXISTS `poqs_usertypes` (
  `usertypes_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertypes_type` varchar(50) NOT NULL,
  PRIMARY KEY (`usertypes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poqs_usertypes`
--

INSERT INTO `poqs_usertypes` (`usertypes_id`, `usertypes_type`) VALUES
(1, 'professionnel'),
(2, 'particulier');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `poqs_event`
--
ALTER TABLE `poqs_event`
  ADD CONSTRAINT `poqs_event_poqs_eventcategory2_FK` FOREIGN KEY (`eventcategory_id`) REFERENCES `poqs_eventcategory` (`eventcategory_id`),
  ADD CONSTRAINT `poqs_event_poqs_eventsub_category1_FK` FOREIGN KEY (`eventsub_category_id`) REFERENCES `poqs_eventsub_category` (`eventsub_category_id`),
  ADD CONSTRAINT `poqs_event_poqs_showplaces0_FK` FOREIGN KEY (`showplaces_id`) REFERENCES `poqs_showplaces` (`showplaces_id`),
  ADD CONSTRAINT `poqs_event_poqs_users_FK` FOREIGN KEY (`users_id`) REFERENCES `poqs_users` (`users_id`);

--
-- Contraintes pour la table `poqs_eventsub_category`
--
ALTER TABLE `poqs_eventsub_category`
  ADD CONSTRAINT `poqs_eventsub_category_poqs_eventcategory_FK` FOREIGN KEY (`eventcategory_id`) REFERENCES `poqs_eventcategory` (`eventcategory_id`);

--
-- Contraintes pour la table `poqs_useralerts`
--
ALTER TABLE `poqs_useralerts`
  ADD CONSTRAINT `poqs_useralerts_poqs_users_FK` FOREIGN KEY (`users_id`) REFERENCES `poqs_users` (`users_id`);

--
-- Contraintes pour la table `poqs_users`
--
ALTER TABLE `poqs_users`
  ADD CONSTRAINT `poqs_users_poqs_usertypes_FK` FOREIGN KEY (`usertypes_id`) REFERENCES `poqs_usertypes` (`usertypes_id`);

--
-- Contraintes pour la table `poqs_usersopinion`
--
ALTER TABLE `poqs_usersopinion`
  ADD CONSTRAINT `poqs_usersopinion_poqs_users_FK` FOREIGN KEY (`users_id`) REFERENCES `poqs_users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
