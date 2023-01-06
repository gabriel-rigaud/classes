-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 jan. 2023 à 15:04
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `classes`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `prenom`, `nom`) VALUES
(1, 'a', '$2y$10$qbsLDZ7EuKXELeMcjuUCKO2x5/ITalWqW1f1eVrbldS3ThSnXW2EO', 'a@gmail', 'a', 'a'),
(2, 'test', '$2y$10$ea7bhbcw1aXalVNJ6kAIIebLba07UzBlzkRC/3xX7cDW4CCb/6vS.', 'ez@ze.co', 'test', 'test'),
(14, 'monlog', '$2y$10$ffCrjNHipN8dN0PLSf/7ouBYAK8B8J4gLyVDGGrursnrL4RGj8Nuq', 'monlog@comptedeux', 'deux', 'compte'),
(12, 'nvxcompte', '$2y$10$BqDr3rQ7BhVlIquwI0VnH.dcoBTlYrbz9Db9Qwfe9yhLGpKHfUDPe', 'abusepa@we', 'nvxcompte', 'nvxcompte'),
(11, 'Copain', '$2y$10$JPTQ8xVr.dGM8yHyAw6Ql.R8sKO/Y4d8GAjxrChk/NyDzt64nl7Ki', 'AllezNous@Copain', 'Nous', 'Allez'),
(16, 'c', '$2y$10$48ZT58vBavv7jsU68YwE3OpbExL7rrK9jvu3gGkv71kTAZ5g1ZkC2', 'c@c', 'c', 'c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
