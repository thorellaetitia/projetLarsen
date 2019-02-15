-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 15 Février 2019 à 16:46
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `LARSEN2`
--

-- --------------------------------------------------------

--
-- Structure de la table `poqs_event`
--

CREATE TABLE `poqs_event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_picture` varchar(90) NOT NULL,
  `event_description` varchar(90) NOT NULL,
  `event_free` tinyint(4) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `eventcategory_id` int(11) NOT NULL,
  `showplaces_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poqs_event`
--

INSERT INTO `poqs_event` (`event_id`, `event_title`, `event_date`, `event_time`, `event_picture`, `event_description`, `event_free`, `users_id`, `eventcategory_id`, `showplaces_id`) VALUES
(1, 'QQDQSDSQFSQF', '2019-02-28', '19:00:00', 'bleachnirvana.jpeg', 'FSDFDSFDSDSSDSDFDSFDSS', NULL, 2, 1, 1),
(2, 'CONCERT', '2019-02-27', '14:30:00', '1971jimihendrix.jpeg', 'en hommage', NULL, 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `poqs_eventcategory`
--

CREATE TABLE `poqs_eventcategory` (
  `eventcategory_id` int(11) NOT NULL,
  `eventcategory_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poqs_eventcategory`
--

INSERT INTO `poqs_eventcategory` (`eventcategory_id`, `eventcategory_name`) VALUES
(1, 'concert'),
(2, 'spectacle'),
(3, 'expos');

-- --------------------------------------------------------

--
-- Structure de la table `poqs_eventsub_category`
--

CREATE TABLE `poqs_eventsub_category` (
  `eventsub_category_id` int(11) NOT NULL,
  `eventsub_category_name` varchar(20) NOT NULL,
  `eventcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poqs_eventsub_category`
--

INSERT INTO `poqs_eventsub_category` (`eventsub_category_id`, `eventsub_category_name`, `eventcategory_id`) VALUES
(1, 'concert', 1),
(2, 'danse', 2),
(3, 'cirque', 2),
(4, 'théatre', 2),
(5, 'humour', 2),
(6, 'expos', 3),
(7, 'musée', 3),
(8, 'balade', 3),
(9, 'atelier', 3);

-- --------------------------------------------------------

--
-- Structure de la table `poqs_showplaces`
--

CREATE TABLE `poqs_showplaces` (
  `showplaces_id` int(11) NOT NULL,
  `showplaces_name` varchar(50) NOT NULL,
  `showplaces_postalcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poqs_showplaces`
--

INSERT INTO `poqs_showplaces` (`showplaces_id`, `showplaces_name`, `showplaces_postalcode`) VALUES
(1, 'le 106', '76000 Rouen'),
(2, 'le Volcan', '76600 Le Havre'),
(3, 'théatre Juliobona', '76170 Lillebonne'),
(4, 'Tetris', '76000 Rouen'),
(5, 'le MUMA', '76600 le havre');

-- --------------------------------------------------------

--
-- Structure de la table `poqs_useralerts`
--

CREATE TABLE `poqs_useralerts` (
  `useralerts_id` int(11) NOT NULL,
  `useralerts_name` varchar(20) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poqs_users`
--

CREATE TABLE `poqs_users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(25) NOT NULL,
  `users_firstname` varchar(25) NOT NULL,
  `users_mail` varchar(25) NOT NULL,
  `users_age` int(11) NOT NULL,
  `users_login` varchar(20) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_admin` tinyint(1) NOT NULL,
  `usertypes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poqs_users`
--

INSERT INTO `poqs_users` (`users_id`, `users_name`, `users_firstname`, `users_mail`, `users_age`, `users_login`, `users_password`, `users_admin`, `usertypes_id`) VALUES
(2, 'thorel', 'laetitia', 'laetis76@gmail.com', 39, 'fiadone', '$2y$10$yef.hHn4.dHGJ4su57qcGO7KT5l9MbpS0tolp9vFug0Y1/Fi1/fVq', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `poqs_usersopinion`
--

CREATE TABLE `poqs_usersopinion` (
  `usersopinion_id` int(11) NOT NULL,
  `usersopinion_opinion` varchar(150) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poqs_usertypes`
--

CREATE TABLE `poqs_usertypes` (
  `usertypes_id` int(11) NOT NULL,
  `usertypes_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poqs_usertypes`
--

INSERT INTO `poqs_usertypes` (`usertypes_id`, `usertypes_type`) VALUES
(1, 'professionnel'),
(2, 'particulier');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `poqs_event`
--
ALTER TABLE `poqs_event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `poqs_event_poqs_users_FK` (`users_id`),
  ADD KEY `poqs_event_poqs_eventcategory0_FK` (`eventcategory_id`),
  ADD KEY `poqs_event_poqs_showplaces1_FK` (`showplaces_id`);

--
-- Index pour la table `poqs_eventcategory`
--
ALTER TABLE `poqs_eventcategory`
  ADD PRIMARY KEY (`eventcategory_id`);

--
-- Index pour la table `poqs_eventsub_category`
--
ALTER TABLE `poqs_eventsub_category`
  ADD PRIMARY KEY (`eventsub_category_id`),
  ADD KEY `poqs_eventsub_category_poqs_eventcategory_FK` (`eventcategory_id`);

--
-- Index pour la table `poqs_showplaces`
--
ALTER TABLE `poqs_showplaces`
  ADD PRIMARY KEY (`showplaces_id`);

--
-- Index pour la table `poqs_useralerts`
--
ALTER TABLE `poqs_useralerts`
  ADD PRIMARY KEY (`useralerts_id`),
  ADD KEY `poqs_useralerts_poqs_users_FK` (`users_id`);

--
-- Index pour la table `poqs_users`
--
ALTER TABLE `poqs_users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `poqs_users_poqs_usertypes_FK` (`usertypes_id`);

--
-- Index pour la table `poqs_usersopinion`
--
ALTER TABLE `poqs_usersopinion`
  ADD PRIMARY KEY (`usersopinion_id`),
  ADD KEY `poqs_usersopinion_poqs_users_FK` (`users_id`);

--
-- Index pour la table `poqs_usertypes`
--
ALTER TABLE `poqs_usertypes`
  ADD PRIMARY KEY (`usertypes_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `poqs_event`
--
ALTER TABLE `poqs_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `poqs_eventcategory`
--
ALTER TABLE `poqs_eventcategory`
  MODIFY `eventcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `poqs_eventsub_category`
--
ALTER TABLE `poqs_eventsub_category`
  MODIFY `eventsub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `poqs_showplaces`
--
ALTER TABLE `poqs_showplaces`
  MODIFY `showplaces_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `poqs_useralerts`
--
ALTER TABLE `poqs_useralerts`
  MODIFY `useralerts_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `poqs_users`
--
ALTER TABLE `poqs_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `poqs_usersopinion`
--
ALTER TABLE `poqs_usersopinion`
  MODIFY `usersopinion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `poqs_usertypes`
--
ALTER TABLE `poqs_usertypes`
  MODIFY `usertypes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `poqs_event`
--
ALTER TABLE `poqs_event`
  ADD CONSTRAINT `poqs_event_poqs_eventcategory0_FK` FOREIGN KEY (`eventcategory_id`) REFERENCES `poqs_eventcategory` (`eventcategory_id`),
  ADD CONSTRAINT `poqs_event_poqs_showplaces1_FK` FOREIGN KEY (`showplaces_id`) REFERENCES `poqs_showplaces` (`showplaces_id`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
