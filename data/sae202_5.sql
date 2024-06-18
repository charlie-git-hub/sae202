-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 juin 2024 à 14:22
-- Version du serveur : 10.3.39-MariaDB-0+deb10u2
-- Version de PHP : 8.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `img_compte` char(100) NOT NULL DEFAULT 'Account-icon.svg',
  `prénom_compte` varchar(30) NOT NULL,
  `mail_compte` varchar(50) NOT NULL,
  `mdp_compte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `img_compte`, `prénom_compte`, `mail_compte`, `mdp_compte`) VALUES
(1, 'Account-icon.svg\r\n', 'Clémencef51', 'clemencef09@gmail.com', '$2y$10$8fgSljBl8tOXyfRJV/RuaesdCIo.W7mmoqgsXwnHyHE1w9Kwy9PJq'),
(2, '2024_06_17_08_00_12---man-profile-1105761_1280.jpg', 'Mathis', 'mathis@gmail.com', '$2y$10$hjpv3XPhvhzIZC9UjGurE.Vw/yKiN6Gd5plfs2Va54VmUo70gcK.O'),
(3, 'Account-icon.svg', 'Swannkikoo', 'swann-breheret@gmail.com', '$2y$10$R2qb9q/B6x3K/oQUya4rE.p/FEs0mTzgHvp/WMyaXdGE8APWQiQEK'),
(4, '2024_06_17_08_08_14---une-bonne-photo-de-profil-cest-quoi-jurica-koletic.jpg', 'Anto51', 'antoine-carroy@orange.fr', '$2y$10$igbfb4nJ8n16nkWlfMfUa.MgRPcY3fZERprroef8XZ06Uf7r5tNO6');

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

CREATE TABLE `favori` (
  `id_favori` int(11) NOT NULL,
  `_id_jardins` int(11) NOT NULL,
  `_id_compte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jardins`
--

CREATE TABLE `jardins` (
  `id_jardins` int(11) NOT NULL,
  `nom_jardins` varchar(100) NOT NULL,
  `img_jardins` varchar(150) NOT NULL,
  `adresse_jardins` varchar(60) DEFAULT NULL,
  `maps_jardins` varchar(300) NOT NULL,
  `taille_jardins` int(10) DEFAULT 0,
  `acteur_jardins` varchar(75) NOT NULL,
  `résumé_jardins` varchar(1000) NOT NULL,
  `contenu_jardins` varchar(800) NOT NULL,
  `_id_compte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jardins`
--

INSERT INTO `jardins` (`id_jardins`, `nom_jardins`, `img_jardins`, `adresse_jardins`, `maps_jardins`, `taille_jardins`, `acteur_jardins`, `résumé_jardins`, `contenu_jardins`, `_id_compte`) VALUES
(1, 'Jardin de partage des Sénardes', '2024_06_17_08_46_00---jardin-partage-troyes1.jpg', '31 Rue des Cumines 10000 Troyes', '48.28881, 4.097828', 1200, 'Ville de Troyes', 'Le jardin de partage des Sénardes à Troyes est un espace communautaire où les résidents cultivent des parcelles individuelles et participent à des activités collectives. Il offre des équipements de jardinage, des zones communes pour la culture collective, et des espaces de détente. Ce jardin favorise le lien social, la biodiversité locale, et l\'engagement écologique grâce à des ateliers et des projets collaboratifs.', 'parcelles individuelles, zones communes de culture, points d\'eau, composteurs, outils de jardinage, espaces de détente, hôtels à insectes, nichoirs pour oiseaux, épouvantail', 4),
(2, 'Jardin partagé des Viennes ', '2024_06_17_08_48_25---jardin_viennes.jpg', '119 Avenue du President Wilson 10120 Saint-André-les-Vergers', '48.286278, 4.054866', 500, 'Secours Catholique', 'Le jardin des Viennes à Troyes est un véritable havre de verdure pour les habitants du quartier. Chacun peut y cultiver sa parcelle, tout en profitant des zones communes. Points d\'eau, composteurs et outils sont à disposition, et des espaces de détente invitent à la convivialité. Avec ses hôtels à insectes et nichoirs, ce jardin encourage la biodiversité. Ateliers et projets collectifs renforcent le lien social et l\'engagement écologique.', ' espaces dédiés à permaculture, serre communautaire pour plantes exotiques, espace de méditation zen, bibliothèque de graines, mur végétal pour art vertical, amphithéâtre pour conférences sur écologie urbaine.', 4),
(3, 'Jardin partagé du Parc des Moulins', '2024_06_17_09_01_32---105946-parc1.jpg', 'Rue des Bas Trevois 10000 Troyes', '48.291047, 4.08165', 1800, 'Ville de Troyes', 'Le jardin partagé du Parc des Moulins à Troyes est un oasis de verdure de 1 800 m², où les participants cultivent leurs propres parcelles tout en partageant des espaces collectifs. Il promeut la diversité écologique en offrant des habitats pour les insectes et les oiseaux. Des activités collaboratives renforcent le tissu social et l\'engagement écologique de la communauté locale.', 'parcelles individuelles, espaces communautaires pour événements, pépinière pour plantes locales, système d\'irrigation automatique, bancs écologiques en matériaux recyclés, mur végétal pour décoration artistique.', 4),
(4, 'Jardin des Saisons', '2024_06_17_09_50_55---potager-en-pleine-terre-6344a7e-1200x899.jpg', 'Av Major General Georges Vanier 10000 Troyes', '48.306786, 4.070114', 75, 'Écologie en Action', 'Le Potager des Saisons, géré par l\'Association \"Écologie en Action\", est un espace harmonieux où cohabitent culture biologique et convivialité. Doté de parcelles individuelles et de zones collectives, il met à disposition des outils de jardinage de qualité et favorise la biodiversité avec des plantes locales et des abris pour la faune.', 'parcelles individuelles, serre communautaire pour semis précoce, composteurs écologiques, outils de jardinage partagés, bancs rustiques pour détente, et un espace artistique avec sculptures recyclées', 1),
(5, 'Jardin Vert-Coeur\r\n', '2024_06_17_09_58_04---Jardin_potager_011.jpg', '10 Rue Danton 10600 La Chapelle-Saint-Luc', '48.319944, 4.051976', 50, 'Cultiver Ensemble', 'Le Jardin Vert-Cœur, sous la tutelle de l\'Association Cultiver Ensemble, est un oasis urbain où la nature et la communauté se rencontrent. Avec ses parcelles individuelles et ses espaces collectifs, il offre une serre pour les plantations précoces, des ruches urbaines, un coin lecture botanique, des bancs en bois recyclé, et un amphithéâtre pour des ateliers écologiques.', 'parcelles individuelles pour potagers urbains, serre communautaire pour semis précoces, ruches urbaines pour la biodiversité, coin lecture botanique avec livres écologiques, bancs en bois recyclé pour se détendre, et un amphithéâtre pour des ateliers sur l\'environnement', 1),
(6, 'Jardin de la Salpète', '2024_06_17_10_03_38---carre-potager.jpg', '4 Chemin du Terrain de Sport 10440 La Rivière-de-Corps', '48.288277, 4.030078', 150, 'Ville de Troyes', 'Le Jardin de la Salpète, géré par la Ville de Troyes, est un havre de verdure où se mêlent apprentissage écologique et convivialité. Doté de parcelles individuelles et de zones collectives, il propose une serre éducative, un espace d\'art écologique, des bancs en matériaux recyclés, et un coin lecture sur la nature. Des événements culturels et des ateliers enrichissent la vie communautaire, faisant de ce jardin un lieu inspirant et durable.', 'parcelles individuelles pour potagers bio, une serre éducative pour apprentissage des plantes, ruches pour soutien à la biodiversité, bancs en bois recyclé pour détente, espace d\'art écologique avec sculptures naturelles, et un coin lecture avec livres sur l\'écologie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_notes` int(11) NOT NULL,
  `ajout_notes` tinyint(3) NOT NULL,
  `ajout_avis` varchar(500) DEFAULT NULL,
  `photo_avis` char(100) DEFAULT 'Aucune photo',
  `date_avis` date DEFAULT '0000-00-00',
  `_id_jardins` int(11) NOT NULL,
  `_id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcelles`
--

CREATE TABLE `parcelles` (
  `id_parcelles` int(11) NOT NULL,
  `reservation_parcelles` int(11) NOT NULL DEFAULT 0,
  `date_debut_parcelles` date NOT NULL DEFAULT '0000-00-00',
  `date_fin_parcelles` date NOT NULL DEFAULT '0000-00-00',
  `_id_jardins` int(11) NOT NULL,
  `_id_compte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcelles`
--

INSERT INTO `parcelles` (`id_parcelles`, `reservation_parcelles`, `date_debut_parcelles`, `date_fin_parcelles`, `_id_jardins`, `_id_compte`) VALUES
(1, 0, '0000-00-00', '0000-00-00', 1, NULL),
(2, 0, '0000-00-00', '0000-00-00', 1, NULL),
(3, 0, '0000-00-00', '0000-00-00', 1, NULL),
(4, 0, '0000-00-00', '0000-00-00', 1, NULL),
(5, 2, '2024-06-21', '2024-06-28', 1, 2),
(6, 0, '0000-00-00', '0000-00-00', 1, NULL),
(7, 0, '0000-00-00', '0000-00-00', 1, NULL),
(8, 0, '0000-00-00', '0000-00-00', 1, NULL),
(9, 0, '0000-00-00', '0000-00-00', 1, NULL),
(10, 0, '0000-00-00', '0000-00-00', 1, NULL),
(11, 0, '0000-00-00', '0000-00-00', 1, NULL),
(12, 0, '0000-00-00', '0000-00-00', 1, NULL),
(13, 0, '0000-00-00', '0000-00-00', 1, NULL),
(14, 0, '0000-00-00', '0000-00-00', 1, NULL),
(15, 0, '0000-00-00', '0000-00-00', 1, NULL),
(16, 0, '0000-00-00', '0000-00-00', 1, NULL),
(17, 0, '0000-00-00', '0000-00-00', 1, NULL),
(18, 0, '0000-00-00', '0000-00-00', 1, NULL),
(19, 0, '0000-00-00', '0000-00-00', 1, NULL),
(20, 0, '0000-00-00', '0000-00-00', 1, NULL),
(21, 0, '0000-00-00', '0000-00-00', 1, NULL),
(22, 0, '0000-00-00', '0000-00-00', 1, NULL),
(23, 2, '2024-06-21', '2024-06-28', 1, 2),
(24, 0, '0000-00-00', '0000-00-00', 1, NULL),
(25, 0, '0000-00-00', '0000-00-00', 1, NULL),
(26, 0, '0000-00-00', '0000-00-00', 2, NULL),
(27, 0, '0000-00-00', '0000-00-00', 2, NULL),
(28, 0, '0000-00-00', '0000-00-00', 2, NULL),
(29, 0, '0000-00-00', '0000-00-00', 2, NULL),
(30, 0, '0000-00-00', '0000-00-00', 2, NULL),
(31, 0, '0000-00-00', '0000-00-00', 2, NULL),
(32, 0, '0000-00-00', '0000-00-00', 2, NULL),
(33, 0, '0000-00-00', '0000-00-00', 2, NULL),
(34, 0, '0000-00-00', '0000-00-00', 2, NULL),
(35, 0, '0000-00-00', '0000-00-00', 2, NULL),
(36, 0, '0000-00-00', '0000-00-00', 2, NULL),
(37, 0, '0000-00-00', '0000-00-00', 2, NULL),
(38, 0, '0000-00-00', '0000-00-00', 2, NULL),
(39, 0, '0000-00-00', '0000-00-00', 2, NULL),
(40, 0, '0000-00-00', '0000-00-00', 2, NULL),
(41, 0, '0000-00-00', '0000-00-00', 2, NULL),
(42, 0, '0000-00-00', '0000-00-00', 2, NULL),
(43, 0, '0000-00-00', '0000-00-00', 2, NULL),
(44, 0, '0000-00-00', '0000-00-00', 2, NULL),
(45, 0, '0000-00-00', '0000-00-00', 2, NULL),
(46, 0, '0000-00-00', '0000-00-00', 2, NULL),
(47, 0, '0000-00-00', '0000-00-00', 2, NULL),
(48, 0, '0000-00-00', '0000-00-00', 2, NULL),
(49, 0, '0000-00-00', '0000-00-00', 2, NULL),
(50, 0, '0000-00-00', '0000-00-00', 2, NULL),
(51, 0, '0000-00-00', '0000-00-00', 3, NULL),
(52, 0, '0000-00-00', '0000-00-00', 3, NULL),
(53, 0, '0000-00-00', '0000-00-00', 3, NULL),
(54, 0, '0000-00-00', '0000-00-00', 3, NULL),
(55, 0, '0000-00-00', '0000-00-00', 3, NULL),
(56, 0, '0000-00-00', '0000-00-00', 3, NULL),
(57, 0, '0000-00-00', '0000-00-00', 3, NULL),
(58, 0, '0000-00-00', '0000-00-00', 3, NULL),
(59, 0, '0000-00-00', '0000-00-00', 3, NULL),
(60, 0, '0000-00-00', '0000-00-00', 3, NULL),
(61, 0, '0000-00-00', '0000-00-00', 3, NULL),
(62, 0, '0000-00-00', '0000-00-00', 3, NULL),
(63, 0, '0000-00-00', '0000-00-00', 3, NULL),
(64, 0, '0000-00-00', '0000-00-00', 3, NULL),
(65, 0, '0000-00-00', '0000-00-00', 3, NULL),
(66, 0, '0000-00-00', '0000-00-00', 3, NULL),
(67, 0, '0000-00-00', '0000-00-00', 3, NULL),
(68, 0, '0000-00-00', '0000-00-00', 3, NULL),
(69, 0, '0000-00-00', '0000-00-00', 3, NULL),
(70, 0, '0000-00-00', '0000-00-00', 3, NULL),
(71, 0, '0000-00-00', '0000-00-00', 3, NULL),
(72, 0, '0000-00-00', '0000-00-00', 3, NULL),
(73, 0, '0000-00-00', '0000-00-00', 3, NULL),
(74, 0, '0000-00-00', '0000-00-00', 3, NULL),
(75, 0, '0000-00-00', '0000-00-00', 3, NULL),
(76, 0, '0000-00-00', '0000-00-00', 4, NULL),
(77, 0, '0000-00-00', '0000-00-00', 4, NULL),
(78, 0, '0000-00-00', '0000-00-00', 4, NULL),
(79, 0, '0000-00-00', '0000-00-00', 4, NULL),
(80, 0, '0000-00-00', '0000-00-00', 4, NULL),
(81, 0, '0000-00-00', '0000-00-00', 4, NULL),
(82, 0, '0000-00-00', '0000-00-00', 4, NULL),
(83, 0, '0000-00-00', '0000-00-00', 4, NULL),
(84, 0, '0000-00-00', '0000-00-00', 4, NULL),
(85, 0, '0000-00-00', '0000-00-00', 4, NULL),
(86, 0, '0000-00-00', '0000-00-00', 4, NULL),
(87, 0, '0000-00-00', '0000-00-00', 4, NULL),
(88, 0, '0000-00-00', '0000-00-00', 4, NULL),
(89, 0, '0000-00-00', '0000-00-00', 4, NULL),
(90, 0, '0000-00-00', '0000-00-00', 4, NULL),
(91, 0, '0000-00-00', '0000-00-00', 4, NULL),
(92, 0, '0000-00-00', '0000-00-00', 4, NULL),
(93, 0, '0000-00-00', '0000-00-00', 4, NULL),
(94, 0, '0000-00-00', '0000-00-00', 4, NULL),
(95, 0, '0000-00-00', '0000-00-00', 4, NULL),
(96, 0, '0000-00-00', '0000-00-00', 4, NULL),
(97, 0, '0000-00-00', '0000-00-00', 4, NULL),
(98, 0, '0000-00-00', '0000-00-00', 4, NULL),
(99, 0, '0000-00-00', '0000-00-00', 4, NULL),
(100, 0, '0000-00-00', '0000-00-00', 4, NULL),
(101, 0, '0000-00-00', '0000-00-00', 5, NULL),
(102, 0, '0000-00-00', '0000-00-00', 5, NULL),
(103, 0, '0000-00-00', '0000-00-00', 5, NULL),
(104, 0, '0000-00-00', '0000-00-00', 5, NULL),
(105, 0, '0000-00-00', '0000-00-00', 5, NULL),
(106, 0, '0000-00-00', '0000-00-00', 5, NULL),
(107, 0, '0000-00-00', '0000-00-00', 5, NULL),
(108, 0, '0000-00-00', '0000-00-00', 5, NULL),
(109, 0, '0000-00-00', '0000-00-00', 5, NULL),
(110, 0, '0000-00-00', '0000-00-00', 5, NULL),
(111, 0, '0000-00-00', '0000-00-00', 5, NULL),
(112, 0, '0000-00-00', '0000-00-00', 5, NULL),
(113, 0, '0000-00-00', '0000-00-00', 5, NULL),
(114, 0, '0000-00-00', '0000-00-00', 5, NULL),
(115, 0, '0000-00-00', '0000-00-00', 5, NULL),
(116, 0, '0000-00-00', '0000-00-00', 5, NULL),
(117, 0, '0000-00-00', '0000-00-00', 5, NULL),
(118, 0, '0000-00-00', '0000-00-00', 5, NULL),
(119, 0, '0000-00-00', '0000-00-00', 5, NULL),
(120, 0, '0000-00-00', '0000-00-00', 5, NULL),
(121, 0, '0000-00-00', '0000-00-00', 5, NULL),
(122, 0, '0000-00-00', '0000-00-00', 5, NULL),
(123, 0, '0000-00-00', '0000-00-00', 5, NULL),
(124, 0, '0000-00-00', '0000-00-00', 5, NULL),
(125, 0, '0000-00-00', '0000-00-00', 5, NULL),
(126, 0, '0000-00-00', '0000-00-00', 6, NULL),
(127, 0, '0000-00-00', '0000-00-00', 6, NULL),
(128, 0, '0000-00-00', '0000-00-00', 6, NULL),
(129, 0, '0000-00-00', '0000-00-00', 6, NULL),
(130, 0, '0000-00-00', '0000-00-00', 6, NULL),
(131, 0, '0000-00-00', '0000-00-00', 6, NULL),
(132, 0, '0000-00-00', '0000-00-00', 6, NULL),
(133, 0, '0000-00-00', '0000-00-00', 6, NULL),
(134, 0, '0000-00-00', '0000-00-00', 6, NULL),
(135, 0, '0000-00-00', '0000-00-00', 6, NULL),
(136, 0, '0000-00-00', '0000-00-00', 6, NULL),
(137, 0, '0000-00-00', '0000-00-00', 6, NULL),
(138, 0, '0000-00-00', '0000-00-00', 6, NULL),
(139, 0, '0000-00-00', '0000-00-00', 6, NULL),
(140, 0, '0000-00-00', '0000-00-00', 6, NULL),
(141, 0, '0000-00-00', '0000-00-00', 6, NULL),
(142, 0, '0000-00-00', '0000-00-00', 6, NULL),
(143, 0, '0000-00-00', '0000-00-00', 6, NULL),
(144, 0, '0000-00-00', '0000-00-00', 6, NULL),
(145, 0, '0000-00-00', '0000-00-00', 6, NULL),
(146, 0, '0000-00-00', '0000-00-00', 6, NULL),
(147, 0, '0000-00-00', '0000-00-00', 6, NULL),
(148, 0, '0000-00-00', '0000-00-00', 6, NULL),
(149, 0, '0000-00-00', '0000-00-00', 6, NULL),
(150, 0, '0000-00-00', '0000-00-00', 6, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`id_favori`),
  ADD KEY `fk_jardins` (`_id_jardins`),
  ADD KEY `fk_compte` (`_id_compte`);

--
-- Index pour la table `jardins`
--
ALTER TABLE `jardins`
  ADD PRIMARY KEY (`id_jardins`),
  ADD KEY `fk_compte3` (`_id_compte`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_notes`),
  ADD UNIQUE KEY `unique_vote_per_account` (`_id_compte`,`_id_jardins`),
  ADD KEY `id_jardins` (`_id_jardins`);

--
-- Index pour la table `parcelles`
--
ALTER TABLE `parcelles`
  ADD PRIMARY KEY (`id_parcelles`),
  ADD KEY `id_compte` (`_id_compte`),
  ADD KEY `id_jardins` (`_id_jardins`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `favori`
--
ALTER TABLE `favori`
  MODIFY `id_favori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jardins`
--
ALTER TABLE `jardins`
  MODIFY `id_jardins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_notes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `parcelles`
--
ALTER TABLE `parcelles`
  MODIFY `id_parcelles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favori`
--
ALTER TABLE `favori`
  ADD CONSTRAINT `fk_compte` FOREIGN KEY (`_id_compte`) REFERENCES `compte` (`id_compte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jardins` FOREIGN KEY (`_id_jardins`) REFERENCES `jardins` (`id_jardins`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jardins`
--
ALTER TABLE `jardins`
  ADD CONSTRAINT `fk_compte3` FOREIGN KEY (`_id_compte`) REFERENCES `compte` (`id_compte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `id_compte2` FOREIGN KEY (`_id_compte`) REFERENCES `compte` (`id_compte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jardins2` FOREIGN KEY (`_id_jardins`) REFERENCES `jardins` (`id_jardins`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `parcelles`
--
ALTER TABLE `parcelles`
  ADD CONSTRAINT `id_compte` FOREIGN KEY (`_id_compte`) REFERENCES `compte` (`id_compte`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jardins` FOREIGN KEY (`_id_jardins`) REFERENCES `jardins` (`id_jardins`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
