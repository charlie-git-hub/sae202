-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 11 juin 2024 à 13:20
-- Version du serveur : 10.3.39-MariaDB-0+deb10u2
-- Version de PHP : 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202Base`
--

-- --------------------------------------------------------

--
-- Structure de la table `jardins`
--

CREATE TABLE `jardins` (
  `id` int(11) NOT NULL,
  `nom` varchar(29) NOT NULL,
  `adresse` varchar(57) NOT NULL,
  `acteur` varchar(55) NOT NULL,
  `co_marker` varchar(17) NOT NULL,
  `p_point1` varchar(18) NOT NULL,
  `p_point2` varchar(18) NOT NULL,
  `p_point3` varchar(18) NOT NULL,
  `p_point4` varchar(18) NOT NULL,
  `marker` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jardins`
--

INSERT INTO `jardins` (`id`, `nom`, `adresse`, `acteur`, `co_marker`, `p_point1`, `p_point2`, `p_point3`, `p_point4`, `marker`) VALUES
(1, 'jardins ouvriers et familiaux', '120 Av. Edouard Herriot, 10000 Troyes', 'association des jardins ouvriers et familiaux de troyes', '48.27066, 4.08424', '48.27071, 4.08477', '48.27025, 4.08402', '48.27050, 4.08361', '48.27098, 4.08442', 'indicateur_carte.svg'),
(2, 'l\'accord parfait', '43 Rue de la Brûlée, 10000 Troyes', 'l\'accord parfait', '48.28645, 4.10231', '48.28657, 4.10130', '48.28582, 4.10234', '48.28608, 4.10315', '48.28712, 4.10227', 'indicateur_carte.svg'),
(3, 'jardin de partage', '31,2 Av. Marie de Champagne, 10000 Troyes', 'le jardin de partage des sénardes', '48.30503,4.06307', '48.30483,4.06099', '48.30613,4.06385', '48.30501,4.06503', '48.30405,4.06188', 'indicateur_carte.svg'),
(4, 'secours catholique', '3 Rue Raymond Claudel, 10000 Troyes', 'secours catholique', '48.31014,4.08774', '48.31037,4.08727', '48.31053,4.08807', '48.30996,4.08824', '48.30961,4.08725', 'indicateur_carte.svg'),
(5, 'jardins rue louis blanc', '42 Av. du Président Wilson, 10120 Saint-André-les-Vergers', 'collectif citoyen Louis Blanc', '48.28919,4.06313', '48.28869,4.06285', '48.28896,4.06368', '48.28966,4.06322', '48.28948,4.06262', 'indicateur_carte.svg'),
(6, 'jardins quartier seguin', '12 Rue Raymond Poincaré, 10000 Troyes', 'association verte du quartier Seguin', '48.29533,4.07697', '48.29491,4.07697', '48.29532,4.07635', '48.29575,4.07699', '48.29528,4.07752', 'indicateur_carte.svg'),
(7, 'jardin partagé des viennes', '4 Rue Guillaume le Bé, 10000 Troyes', 'communauté éco des Viennes', '48.28630,4.08808', '48.28616,4.08719', '48.28668,4.08829', '48.28629,4.08875', '48.28568,4.08790', 'indicateur_carte.svg'),
(8, 'les jardins familiaux', '12 Rue de l\\\'Abreuvoir de la Pielle, 10000 Troyes', 'amis de la nature Troyenne', '48.29511,4.08649', '48.29498,4.08598', '48.29542,4.08662', '48.29515,4.086999', '48.29479,4.08621', 'indicateur_carte.svg'),
(9, 'jardin jules guesde', 'H, 10430 Rosières-prés-Troyes', 'collectif horticole Jules Guesde', '48.26914,4.07959', '48.26935,4.07955', '48.26907,4.08012', '48.26882,4.07988', '48.26913,4.07921', 'indicateur_carte.svg'),
(10, 'jardin ouvert', '8 Rue Pierre Delostal, 10120 Saint-André-les-Vergers', 'initiative verte ouverte', '48.27881,4.06275', '48.27932,4.06218', '48.27864,4.06363', '48.27825,4.06339', '48.27894,4.06196', 'indicateur_carte.svg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jardins`
--
ALTER TABLE `jardins`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
