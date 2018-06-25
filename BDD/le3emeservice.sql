-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 25 juin 2018 à 12:20
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `le3emeservice`
--
CREATE DATABASE IF NOT EXISTS `le3emeservice` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `le3emeservice`;

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `ville` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_entree` date NOT NULL,
  `reservation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaires` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`id`, `id_membre`, `ville`, `description`, `date_entree`, `reservation`, `commentaires`) VALUES
(1, 2, 'ville test2', 'panier de fruits', '2018-06-23', 'non', 'A retirer dans la journée'),
(2, 2, 'ville test2', 'boîtes de conserve', '2018-06-23', 'non', 'A retirer sous 5 jours'),
(3, 4, 'ville test4', '3 pizzas', '2018-06-23', 'non', 'à consommer avant demain'),
(4, 4, 'ville test4', '3 pizzas', '2018-06-23', 'non', 'à consommer avant demain'),
(5, 3, 'ville test3', 'un poulet roti', '2018-06-25', 'non', 'Validité : 1 jour.'),
(6, 6, 'ville test6', '1 couscous, 2 tajines et 8 makroudhes.', '2018-06-25', 'non', 'a retirer dans la journée.');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raison_social` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `email`, `mdp`, `raison_social`, `siret`, `adresse`, `cp`, `ville`, `tel`, `statut`, `is_active`, `roles`) VALUES
(1, 'test1@email.fr', '$2y$14$j.dcSeTgZjcwhu96sAG19evPB5CpkFISX.I5iQpCkDQP3FWErcufi', 'test1', '123456789', 'rue test1', '12345', 'ville test1', '0123456789', 'a', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(2, 'test2@email.fr', '$2y$14$Q4rS.wSd3gQRLJJl.Ws17OKvRu1fUBQdP7i0g21.bdYfGcNEXeUjm', 'test2', '9876543210', 'rue test2', '54321', 'ville test2', '9876543210', 'p', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(3, 'test3@email.fr', '$2y$14$jaBqXEPbrGk0fWeZCujcCeF09CFnRzyOCxc/GtR/PenAdamNQKSIa', 'test3', '147852036', 'rue test3', '32154', 'ville test3', '0258741369', 'p', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(4, 'test4@email.fr', '$2y$14$8maUJebWto7mEla8GNyJSePlujwa.YTXDCwl/.QgfFLbup6t5bM3C', 'test4', '369852147', 'rue test4', '32541', 'ville test4', '0987456321', 'p', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(5, 'test5@email.fr', '$2y$14$DtxH2B/SncsL5CDIgy3GluBseX7R.ojWLcyJv2URZgrpHwF1YaVo.', 'test5', '369258147', 'rue test5', '53241', 'ville test5', '0258741963', 'a', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(6, 'test6@email.fr', '$2y$14$YpdkzzTZqa1QTW2Pre0y2eGtdbrI/E.LQi1o7fcTWSvDyv2yMsX9C', 'test6', '259874136', 'rue test6', '25413', 'ville test6', '0214598763', 'p', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180623145457');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
