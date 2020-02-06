-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000262470.hosting-data.io
-- Généré le : jeu. 06 fév. 2020 à 08:29
-- Version du serveur :  5.7.28-log
-- Version de PHP : 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs256083`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartoon`
--

CREATE TABLE `cartoon` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `serie` varchar(150) NOT NULL,
  `isbn` int(13) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `page_count` int(4) NOT NULL,
  `volume_number` int(3) NOT NULL,
  `finish` int(1) UNSIGNED ZEROFILL NOT NULL,
  `comment` text NOT NULL,
  `rate` int(5) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartoon`
--

INSERT INTO `cartoon` (`id`, `title`, `serie`, `isbn`, `genre`, `page_count`, `volume_number`, `finish`, `comment`, `rate`, `cover`, `creation_date`) VALUES
(1, 'flagrant génie', 'léonard', 0, 'Humour', 54, 19, 1, '', 5, 'https://www.bedetheque.com/media/Couvertures/Couv_232.jpg', '2020-01-22 21:31:40'),
(2, 'Génie, Vidi, Vinci!', 'Léonard', 2147483647, 'Humour', 56, 50, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/514CCgMTFpL._SX364_BO1,204,203,200_.jpg', '2020-01-28 15:25:43'),
(3, 'Génie militaire', 'Léonard', 2147483647, 'Humour', 48, 49, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/516Si1271cL._SX373_BO1,204,203,200_.jpg', '2020-01-28 15:27:52'),
(4, 'Mon papa est un génie', 'Léonard', 2147483647, 'Humour', 48, 48, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/61s4CLTDTiL._SX375_BO1,204,203,200_.jpg', '2020-01-28 15:28:47'),
(5, 'Bill à facettes', 'Boule &amp; Bill', 2147483647, 'Humour', 46, 40, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/51cb9bwevEL._SX373_BO1,204,203,200_.jpg', '2020-01-28 15:30:17'),
(6, 'Sans les mains', 'Cedric', 2147483647, 'Humour', 48, 33, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/51Vf79TCTbL._SX362_BO1,204,203,200_.jpg', '2020-01-28 15:31:21'),
(7, 'C\'est quand qu\'on part ? ', 'Cédric ', 2147483647, 'Humour', 47, 27, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/81rB75yz4tL.jpg', '2020-02-01 11:01:13'),
(8, 'Gâteau surprise ', 'Cédric', 2147483647, 'Humour', 47, 10, 1, '', 5, 'https://images-na.ssl-images-amazon.com/images/I/81-l-i1qNjL.jpg', '2020-02-01 19:12:47'),
(9, 'T\'as qu\'à t\'retenir', 'Le petit spirou ', 2147483647, 'actuellement : Humour', 48, 8, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/51kjIXLRJwL._SX360_BO1,204,203,200_.jpg', '2020-02-05 20:31:37'),
(10, 'Roule ma poule !', 'Boule &amp; Bill', 2147483647, 'actuellement : actuellement : Humour', 48, 35, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/81JvYEFaUhL.jpg', '2020-02-05 20:54:18');

-- --------------------------------------------------------

--
-- Structure de la table `cartoon_count_page`
--

CREATE TABLE `cartoon_count_page` (
  `id` int(11) NOT NULL,
  `cartoon_id` int(11) NOT NULL,
  `new_page_count` int(4) NOT NULL,
  `update_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `novel`
--

CREATE TABLE `novel` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(150) NOT NULL,
  `isbn` int(13) NOT NULL,
  `publication` varchar(6) NOT NULL,
  `genre` varchar(80) NOT NULL,
  `page_count` int(4) NOT NULL,
  `count_volume` int(2) UNSIGNED ZEROFILL NOT NULL,
  `active` int(1) UNSIGNED ZEROFILL NOT NULL,
  `finish` int(1) UNSIGNED ZEROFILL NOT NULL,
  `comment` text NOT NULL,
  `rate` int(5) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `creation_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `novel`
--

INSERT INTO `novel` (`id`, `title`, `author`, `isbn`, `publication`, `genre`, `page_count`, `count_volume`, `active`, `finish`, `comment`, `rate`, `cover`, `creation_date`) VALUES
(2, 'L\'Âge de la connaissance', 'Idriss ABERKANE', 2147483647, 'papier', 'actuellement : traité', 374, 00, 0, 1, 'Excellent livre ', 0, 'https://images-na.ssl-images-amazon.com/images/I/71R9hC0Fm3L.jpg', '2020-02-02 13:57:01'),
(5, 'Le meilleur des mondes', 'Aldous Huxley', 2147483647, 'papier', 'actuellement : Fantastique', 320, 01, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/51PjQMavmhL._SX303_BO1,204,203,200_.jpg', '2020-02-02 14:28:18'),
(6, 'Les Templiers sont parmi nous ou L\'énigme de Gisors', 'Gérard de Sède', 2147483647, 'papier', 'actuellement : Essais', 381, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/51ZHcgC80HL._SX307_BO1,204,203,200_.jpg', '2020-02-02 14:28:24'),
(7, 'Comment j\'ai arrêté de CONsommer', 'Frédéric MARS', 226625636, 'papier', 'actuellement : Essais', 288, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/41YqZatbHOL._SX303_BO1,204,203,200_.jpg', '2020-02-02 14:28:30'),
(8, 'Le grand roman des maths : De la préhistoire à nos jours', 'Mickaël Launay', 2147483647, 'kindle', 'actuellement : Traité', 320, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/51-nMKxL8TL._SX307_BO1,204,203,200_.jpg', '2020-02-02 14:28:40'),
(9, 'ZEN ALTITUDE', 'Sonia Dagotar', 0, 'kindle', 'actuellement : Roman', 308, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/41YxwPG1Q3L._SX326_BO1,204,203,200_.jpg', '2020-02-02 14:28:48'),
(10, 'Au service surnaturel de Sa Majesté', 'Daniel O\'Malley', 2147483647, 'papier', 'actuellement : Fantastique', 672, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/4164EKP1OQL._SX303_BO1,204,203,200_.jpg', '2020-02-02 14:29:01'),
(11, 'Le développement (im)personnel', 'Julia de Funès', 2147483647, 'papier', 'actuellement : Traité', 160, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/41VUkbarlYL._SX312_BO1,204,203,200_.jpg', '2020-02-02 14:29:10'),
(12, 'Une rose au paradis', 'René Barjavel', 2147483647, 'papier', 'actuellement : Fantastique', 216, 00, 0, 1, '', 0, 'https://images-na.ssl-images-amazon.com/images/I/61oE8GocjGL._SX303_BO1,204,203,200_.jpg', '2020-02-02 14:29:18'),
(14, 'Les cavernes d\'acier le cycle des robots ', 'Isaac asimov ', 2147483647, 'actuel', 'actuellement : actuellement : Science-fiction', 382, 05, 1, 0, '', 0, 'https://d2t3xdwbh1v8qy.cloudfront.net/content/B07DPS4YQZ/resources/1311769101', '2020-02-03 09:56:14'),
(15, 'Latitude zéro ', 'Mike Horn ', 2147483647, 'papier', 'Auto biographie', 345, 00, 0, 1, '', 5, '', '2020-02-02 16:55:13'),
(16, 'Un défilé de robots- le cycle des robots ', 'Isaac asimov', 2147483647, 'papier', 'Science-fiction', 250, 00, 0, 1, '', 5, '', '2020-02-02 16:56:34'),
(17, 'Le guide du voyageur galactique', 'Douglas Adams ', 2147483647, 'papier', 'Science-fiction', 274, 05, 0, 1, '', 5, '', '2020-02-02 16:58:33'),
(18, 'Le moine est le Vénérable ', 'Christian jacq ', 2147483647, 'papier', 'Roman', 241, 00, 0, 1, '', 5, '', '2020-02-02 16:59:57'),
(19, 'Il n\'y a pas de parents parfaits ', 'Isabelle Filliozat', 2147483647, 'papier', 'Developpement personnel', 310, 00, 0, 1, '', 3, '', '2020-02-02 17:01:47'),
(20, 'La clé d\'hiram ', 'Christopher knight &amp; Robert lomas ', 2147483647, 'papier', 'Essais', 600, 00, 0, 1, '', 5, '', '2020-02-02 17:03:33'),
(21, 'Le livre du voyage ', 'Bernard werber', 2147483647, 'papier', 'Fantastique', 161, 00, 0, 1, '', 5, '', '2020-02-02 17:04:51'),
(22, '1984', 'George Orwell', 2147483647, 'papier', 'Science-fiction', 408, 00, 0, 1, '', 5, '', '2020-02-02 17:06:13'),
(23, 'Réfléchissez et devenez riche ', 'Napoléon Hill', 2147483647, 'papier', 'Developpement personnel', 219, 00, 0, 1, '', 3, '', '2020-02-02 17:07:50'),
(24, 'Le succès par la pensée constructive ', 'Napoléon Hill &amp; W Clement Stone', 2147483647, 'papier', 'Developpement personnel', 348, 00, 0, 1, '', 2, '', '2020-02-02 17:09:04'),
(25, 'Islam, l\'autre visage', 'Eva de vitray-meyerovitch', 2147483647, 'papier', 'Traité', 170, 00, 0, 1, '', 5, '', '2020-02-02 17:10:52'),
(26, 'Les vertus de l\'échec', 'Charles Pépin ', 2147483647, 'papier', 'Developpement personnel', 184, 00, 0, 1, '', 5, '', '2020-02-02 17:12:27'),
(27, 'Le paradoxe du poisson rouge ', 'Hesna Cailliau', 2147483647, 'papier', 'Developpement personnel', 182, 00, 0, 1, '', 5, '', '2020-02-02 17:14:08');

-- --------------------------------------------------------

--
-- Structure de la table `novel_page_count`
--

CREATE TABLE `novel_page_count` (
  `id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `new_page_count` int(4) NOT NULL,
  `update_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `novel_page_count`
--

INSERT INTO `novel_page_count` (`id`, `novel_id`, `new_page_count`, `update_date`) VALUES
(5, 5, 0, '2020-01-27 20:27:37'),
(6, 5, 100, '2020-01-27 20:28:33'),
(7, 5, 187, '2020-01-28 11:01:39'),
(8, 6, 0, '2020-01-28 11:07:33'),
(9, 7, 0, '2020-01-28 11:09:32'),
(10, 8, 0, '2020-01-28 11:11:37'),
(11, 9, 0, '2020-01-28 11:13:23'),
(12, 10, 0, '2020-01-28 11:14:40'),
(13, 11, 0, '2020-01-28 11:16:00'),
(14, 12, 0, '2020-01-28 11:17:03'),
(15, 5, 201, '2020-01-29 08:50:36'),
(16, 5, 211, '2020-01-29 10:55:49'),
(17, 5, 247, '2020-01-30 19:59:12'),
(19, 5, 261, '2020-01-31 09:47:06'),
(20, 5, 303, '2020-02-01 14:36:22'),
(21, 5, 303, '2020-02-01 14:36:32'),
(22, 5, 303, '2020-02-01 14:36:46'),
(23, 5, 303, '2020-02-01 14:37:17'),
(24, 14, 0, '2020-02-01 16:01:29'),
(26, 14, 15, '2020-02-01 18:22:21'),
(27, 15, 0, '2020-02-02 16:55:13'),
(28, 16, 0, '2020-02-02 16:56:34'),
(29, 17, 0, '2020-02-02 16:58:33'),
(30, 18, 0, '2020-02-02 16:59:57'),
(31, 19, 0, '2020-02-02 17:01:47'),
(32, 20, 0, '2020-02-02 17:03:33'),
(33, 21, 0, '2020-02-02 17:04:51'),
(34, 22, 0, '2020-02-02 17:06:13'),
(35, 23, 0, '2020-02-02 17:07:50'),
(36, 24, 0, '2020-02-02 17:09:04'),
(37, 25, 0, '2020-02-02 17:10:52'),
(38, 26, 0, '2020-02-02 17:12:27'),
(39, 27, 0, '2020-02-02 17:14:08'),
(40, 14, 30, '2020-02-03 09:56:23'),
(41, 14, 70, '2020-02-03 11:36:43'),
(42, 14, 81, '2020-02-03 19:49:31'),
(43, 14, 95, '2020-02-05 10:49:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `pwd` varchar(150) NOT NULL,
  `inscription_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `pwd`, `inscription_date`, `update_date`) VALUES
(1, 'admin', '$2y$10$Eq7xRSSLB49oxqRNnPhO8ee8W15BJNysW1ou5K8pxm2j5XQAcAlVq', '2020-01-26 14:29:29', '2020-01-31 09:29:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cartoon`
--
ALTER TABLE `cartoon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartoon_count_page`
--
ALTER TABLE `cartoon_count_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartoon_id` (`cartoon_id`);

--
-- Index pour la table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `novel_page_count`
--
ALTER TABLE `novel_page_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cartoon`
--
ALTER TABLE `cartoon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cartoon_count_page`
--
ALTER TABLE `cartoon_count_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `novel`
--
ALTER TABLE `novel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `novel_page_count`
--
ALTER TABLE `novel_page_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cartoon_count_page`
--
ALTER TABLE `cartoon_count_page`
  ADD CONSTRAINT `cartoon_page_count_ibfk_1` FOREIGN KEY (`cartoon_id`) REFERENCES `cartoon` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `novel_page_count`
--
ALTER TABLE `novel_page_count`
  ADD CONSTRAINT `novel_page_count_ibfk_3` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
