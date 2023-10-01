-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 01 oct. 2023 à 21:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdlocationequipements`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `idm` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `courriel` varchar(256) NOT NULL,
  `sexe` varchar(3) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `photo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`idm`, `nom`, `prenom`, `courriel`, `sexe`, `datenaissance`, `photo`) VALUES
(1, 'super', 'Man', 'admin@compagnie.com', 'M', '1970-01-01', NULL),
(3, 'Beauchamps', 'Antony', 'antbeau@gmail.com', 'M', '1997-02-14', NULL),
(4, 'Amjad', 'Salim', 'saAmj@mondomaine.com', 'M', '2012-04-07', NULL),
(5, 'Oliviers', 'Natalie', 'natolv@yahoo.com', 'F', '2000-02-01', NULL),
(6, 'Meloni', 'Lili', 'lime@oulook.fr', 'F', '1999-03-01', NULL),
(7, 'hassan', 'samir', 'samha@gmail.com', '', '1945-10-07', NULL),
(11, 'Passaro', 'Antoine', 'anpas@hotmail.com', 'M', '2001-11-05', NULL),
(12, 'Belanger', 'Jolia', 'joBel@gmail.com', 'F', '2002-05-04', NULL),
(13, 'Maroun', 'Sami', 'samMaroun@hotmail.com', 'M', '1985-12-09', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
