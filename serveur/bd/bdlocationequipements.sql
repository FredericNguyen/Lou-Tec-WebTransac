-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 nov. 2023 à 03:48
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
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `nom` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`nom`) VALUES
('Elevation'),
('Chauffage / Ventilation'),
('Outillage Divers'),
('Compaction / Exacavation'),
('Manutention'),
('Jardinage / Paysagement');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `courriel` varchar(256) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `role` varchar(2) NOT NULL DEFAULT 'M',
  `statut` varchar(2) NOT NULL DEFAULT 'A',
  `idm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`courriel`, `pass`, `role`, `statut`, `idm`) VALUES
('saAmj@mondomaine.com', '222222', 'M', 'A', 4),
('antbeau@gmail.com', '333333', 'M', 'I', 3),
('natolv@yahoo.com', '123456', 'M', 'I', 5),
('lime@oulook.fr', '555555', 'M', 'A', 6),
('samha@gmail.com', '666666', 'M', 'A', 7),
('anpas@hotmail.com', '999999', 'M', 'A', 11),
('joBel@gmail.com', '090909', 'M', 'A', 12),
('samMaroun@hotmail.com', '123123', 'M', 'A', 13),
('fredericnguyen3@yahoo.com', '123456', 'M', 'A', 35),
('fredericnguyen@yahoo.com', '123456', 'A', 'A', 36),
('fred@courriel.com', '123456', 'M', 'A', 37),
('fr@email.com', '123456', 'M', 'A', 38),
('test@email.com', '123456', 'M', 'A', 39),
('tes2t@email.com', '123456', 'M', 'A', 40),
('tes3t@email.com', '123456', 'M', 'A', 41),
('fredericnguyen8@yahoo.com', '123456', 'M', 'A', 42),
('davidnguyen@yahoo.com', '123456', 'M', 'A', 43);

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `codeEq` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `caracteristiques` varchar(256) NOT NULL,
  `prix_jour` int(11) NOT NULL,
  `prix_semaine` int(11) NOT NULL,
  `prix_mois` int(11) NOT NULL,
  `photo` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `idl` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `codeEq` int(11) NOT NULL,
  `duree` int(11) NOT NULL DEFAULT 1,
  `datelocation` date NOT NULL,
  `dateretour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(3, 'Beauchamps', 'Antony', 'antbeau@gmail.com', 'M', '1997-02-14', NULL),
(4, 'Amjad', 'Salim', 'saAmj@mondomaine.com', 'M', '2012-04-07', NULL),
(5, 'Oliviers', 'Natalie', 'natolv@yahoo.com', 'F', '2000-02-01', NULL),
(6, 'Meloni', 'Lili', 'lime@oulook.fr', 'F', '1999-03-01', NULL),
(7, 'hassan', 'samir', 'samha@gmail.com', '', '1945-10-07', NULL),
(11, 'Passaro', 'Antoine', 'anpas@hotmail.com', 'M', '2001-11-05', NULL),
(12, 'Belanger', 'Jolia', 'joBel@gmail.com', 'F', '2002-05-04', NULL),
(13, 'Maroun', 'Sami', 'samMaroun@hotmail.com', 'M', '1985-12-09', NULL),
(35, 'n', 'frede', 'fredericnguyen3@yahoo.com', 'M', '2023-10-29', '184d438a5d5a4115f8b05c12932d036387d284ae'),
(36, 'n', 'frede', 'fredericnguyen@yahoo.com', 'M', '2023-10-02', '4871dcd20a6f3295afcd842bf4f98ee1de01acde'),
(37, 'n', 'frede', 'fred@courriel.com', 'M', '2023-07-06', '9aa69c1a1793444cbc849297d91b6ee1868c69cb'),
(38, 'n', 'frede', 'fr@email.com', 'M', '2023-12-01', '95b27c202f10f54779d7099e1a1de93b2e84aa92.jpeg'),
(39, 'n', 'frede', 'test@email.com', 'M', '2023-11-24', 'accae82b651240a57d90958967f1e002d5419bd5.jpeg'),
(40, 'n', 'frede', 'tes2t@email.com', 'M', '2023-11-24', 'f58d471ed0d44b802096c0638c06e3bed67030f1.jpeg'),
(41, 'n', 'frede', 'tes3t@email.com', 'M', '2023-11-24', 'a3ba09b4db264a96dc155c7828fc3753f7b1792e.jpeg'),
(42, 'n', 'frede', 'fredericnguyen8@yahoo.com', 'M', '2023-11-29', 'avatar_membre.png'),
(43, 'Nguyen', 'David', 'davidnguyen@yahoo.com', 'M', '2023-11-30', '97a9cfb31b4a94ed6cc17d09a97aee38693025a7.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idP` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `prix` int(11) NOT NULL,
  `qt_inventaire` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `pochette` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idP`, `nom`, `categorie`, `description`, `prix`, `qt_inventaire`, `dateAjout`, `pochette`) VALUES
(5, 'Produit5 modifier3', 'Outillage Divers', 'Produit test lorem ipsum', 12, 132, '2023-10-19 19:13:59', '440c8c35704c2abc00d67f3b21e91307f571f7af.jpg'),
(6, 'Produit1', 'Outillage Divers', 'Produit test lorem ipsum', 12, 100, '2023-10-19 19:16:33', '1bca98f3041fa327b1b64568b314560ee1b7ed95.jpg'),
(7, 'Chariot élévateur 5000lbs', 'Manutention', 'Chariot élévateur électrique qui peut supporter une charge allant jusqu’à 5000 livres. Appareil solide convenant très bien aux travaux intérieurs ou à un usage en entrepôt à cause des roues adaptées pour les surfaces plates, fonctionnement sur batterie 48V', 350, 25, '2023-10-21 23:02:13', '3974ec26605d9e4aa73aeae1f08f258328fd57ec.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `connexion_idm_FK` (`idm`);

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`codeEq`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`idl`),
  ADD KEY `locations_idm_FK` (`idm`),
  ADD KEY `locations_codeEq_FK` (`codeEq`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `codeEq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `idl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`);

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_codeEq_FK` FOREIGN KEY (`codeEq`) REFERENCES `equipements` (`codeEq`),
  ADD CONSTRAINT `locations_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
