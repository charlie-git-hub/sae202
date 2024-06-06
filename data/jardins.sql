-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 juin 2024 à 13:13
-- Version du serveur : 10.3.29-MariaDB-0+deb10u1
-- Version de PHP : 8.2.10

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
  `coordonnées` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jardins`
--

INSERT INTO `jardins` (`id`, `nom`, `adresse`, `acteur`, `coordonnées`) VALUES
(1, 'jardins ouvriers et familiaux', '120 Av. Edouard Herriot, 10000 Troyes', 'association des jardins ouvriers et familiaux de troyes', '48.27066, 4.08424'),
(2, 'l\'accord parfait', '43 Rue de la Brûlée, 10000 Troyes', 'l\'accord parfait', '48.28645, 4.10231'),
(3, 'jardin de partag', '31,2 Av. Marie de Champagne, 10000 Troyes', 'le jardin de partage des sénardes', '48.30503,4.06307'),
(4, 'secours catholique', '3 Rue Raymond Claudel, 10000 Troyes', 'secours catholique', '48.31014,4.08774'),
(5, 'jardins rue louis blanc', '42 Av. du Président Wilson, 10120 Saint-André-les-Vergers', 'collectif citoyen Louis Blanc', '48.28919,4.06313'),
(6, 'jardins quartier seguin', '12 Rue Raymond Poincaré, 10000 Troyes', 'association verte du quartier Seguin', '48.29533,4.07697'),
(7, 'jardin partagé des viennes', '4 Rue Guillaume le Bé, 10000 Troyes', 'communauté éco des Viennes', '48.28630,4.08808'),
(8, 'les jardins familiaux', '12 Rue de l\'Abreuvoir de la Pielle, 10000 Troyes', 'amis de la nature Troyenne', '48.29511,4.08649'),
(9, 'jardin jules guesde', 'H, 10430 Rosières-prés-Troyes', 'collectif horticole Jules Guesde', '48.26914,4.07959'),
(10, 'jardin ouvert', '8 Rue Pierre Delostal, 10120 Saint-André-les-Vergers', 'initiative verte ouverte', '48.27881,4.06275');

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
