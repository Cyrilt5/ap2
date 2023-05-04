-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 mai 2023 à 00:56
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
-- Base de données : `ap2`
--

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int NOT NULL,
  `nom_salle` varchar(25) NOT NULL,
  `id_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `id_type`) VALUES
(12, 'reunion1', 3),
(13, 'reunion2', 3),
(14, 'reunion3', 3),
(15, 'reunion4', 3),
(16, 'reunion5', 3),
(17, 'reunion6', 3),
(18, 'reunion7', 3),
(19, 'reunion8', 3),
(20, 'amphitéatre', 3),
(21, 'multimédia', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD KEY `id_type` (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_salle` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
