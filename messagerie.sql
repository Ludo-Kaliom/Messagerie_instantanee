-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 jan. 2022 à 09:19
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `messagerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_text` text NOT NULL,
  `msg_user_id` int(255) NOT NULL,
  `msg_date` datetime NOT NULL,
  `msg_room_id` int(255) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_messages`
--

INSERT INTO `chat_messages` (`msg_id`, `msg_text`, `msg_user_id`, `msg_date`, `msg_room_id`) VALUES
(46, 'Coucou, moi aussi, je suis venu tester', 17, '2022-01-12 10:12:15', 1),
(47, 'Je prÃ©fÃ¨re le JS, c\'est plus Ã  la mode !', 17, '2022-01-12 10:12:28', 2),
(48, 'Y a personne ici ?', 17, '2022-01-12 10:12:39', 4),
(45, 'Vous avez dÃ©jÃ  lu &quot;Faon&quot; de Jean Bury ? https://motsetlegendes.fr/accueil/58-faon-version-papier-9782372270366.html', 16, '2022-01-12 10:09:57', 3),
(44, 'PHP, c\'est super !', 16, '2022-01-12 10:09:09', 2),
(43, 'Salut, c\'est un message pour tester le chat !', 16, '2022-01-12 10:07:10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `chat_rooms`
--

DROP TABLE IF EXISTS `chat_rooms`;
CREATE TABLE IF NOT EXISTS `chat_rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_rooms`
--

INSERT INTO `chat_rooms` (`room_id`, `room_name`) VALUES
(1, 'Bienvenue'),
(2, 'Veille technologique'),
(3, 'Divers'),
(4, 'Room 1'),
(5, 'Room 2');

-- --------------------------------------------------------

--
-- Structure de la table `chat_users`
--

DROP TABLE IF EXISTS `chat_users`;
CREATE TABLE IF NOT EXISTS `chat_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_users`
--

INSERT INTO `chat_users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(16, 'Causeur1', 'Causeur1@Causeur1.com', 'e292bea9f8ccecc9222d0ea392d3b72a'),
(17, 'Causeur2', 'Causeur2@Causeur2.com', '70a7ef8b699b3918ceb5aaf3d21e3754');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat_messages`
--
ALTER TABLE `chat_messages` ADD FULLTEXT KEY `msg_text` (`msg_text`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
