-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 mars 2021 à 15:39
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hive_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `hive`
--

CREATE TABLE `hive` (
  `id` int(11) NOT NULL,
  `geo_lat` double NOT NULL,
  `geo_long` double NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hive`
--

INSERT INTO `hive` (`id`, `geo_lat`, `geo_long`, `name`) VALUES
(12, 49.107976, 6.182309, 'Ruche 1'),
(13, 49.215485, 6.170377, 'Ruche 2');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `hive_id` int(11) DEFAULT NULL,
  `weight` double NOT NULL,
  `temperature` double NOT NULL,
  `humidity` double NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `hive_id`, `weight`, `temperature`, `humidity`, `created_at`) VALUES
(1, 13, 45, 24, 60, '2021-03-06 15:00:00'),
(2, 12, 45, 24, 60, '2021-03-05 15:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hive`
--
ALTER TABLE `hive`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29791883E9A48D12` (`hive_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--


--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `FK_29791883E9A48D12` FOREIGN KEY (`hive_id`) REFERENCES `hive` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
