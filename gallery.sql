-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 nov. 2023 à 15:35
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gallery`
--

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `message` text,
  `dateCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`id`, `mail`, `password`, `message`, `dateCreate`) VALUES
(1, 'oceane.lao1@gmail.com', 'Blahblah45', 'Bonjour !', NULL),
(2, 'blahblah@mail.com', 'HappyBisthdayToYou', 'Joyeux anniversaire !', NULL),
(3, 'test@test.com', 'Test', 'Test', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `src` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(55) DEFAULT NULL,
  `creatAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `src`, `title`, `description`, `author`, `creatAt`, `updateAt`) VALUES
(1, 'https://cdn.pixabay.com/photo/2014/04/14/20/11/pink-324175_1280.jpg', 'Fleur en cerisier', 'rose\r\nfleurs de cerisier\r\npapier peint à fleurs\r\nfond de fleur\r\nfleur fond\r\nfleurs\r\nbelles fleurs\r\ndirection générale de la\r\npapier peint fleur\r\nflower background\r\nfleurs roses\r\nbeautiful flowers\r\nfond d\'écran fleur\r\nsakura\r\ncerisier japonais\r\nbloom\r\nfleu', 'Hans', '2019-03-31 10:29:50', '2023-10-24 10:39:08'),
(2, 'https://cdn.pixabay.com/photo/2017/08/07/22/57/coffee-2608864_1280.jpg', 'Café tasse cappuccino', 'café\r\ntasse\r\ncappuccino\r\nlatté\r\nart du café au lait\r\ntasse à café\r\ncaféine\r\ncafé matinal\r\npause café\r\nboire\r\nboisson\r\nchaud\r\nmatin', 'Engin Aykurt', '2017-08-08 10:29:50', '2023-10-24 10:39:08'),
(3, 'https://cdn.pixabay.com/photo/2016/10/28/13/09/usa-1777986_1280.jpg', 'Etats-Unis Manhattan', 'etats-unis\r\nmanhattan\r\ncontrastes\r\nnew york\r\nnew york city\r\nquartier chinois\r\nmétropole\r\nhorizon\r\nroute\r\ncirculation\r\nvieille\r\nnouveau\r\nmaisons\r\nimmeuble\r\nl\'architecture\r\ngrattes ciels', 'Wiggijo', '2016-10-31 11:18:13', '2023-10-24 09:18:13'),
(4, 'https://cdn.pixabay.com/photo/2023/09/20/04/04/sea-urchin-8263832_1280.jpg', 'Titre', 'Description', 'Quelqu\'un', '2015-07-17 11:18:13', '2023-10-24 09:18:13'),
(48, './uploads/jeux-vid-o.jpeg', 'Jeux Vidéo', 'Blahblah', 'Bob l\'éponge', '2023-11-10 14:20:44', '2023-11-10 14:20:44');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` tinytext,
  `password` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`) VALUES
(1, 'oceane.lao1@gmail.com', '$2y$10$CHWcFHS1sErpItDlryIRhe1v4OkVOGxAyYV6r3PCie6xTPt3B4VZe'),
(2, 'omar@omar.fr', '$2y$10$WQoMgx2KjvTSYfgprxjy..32hmaEFEd6lUbDZoUrayP2qgKXKx26e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
