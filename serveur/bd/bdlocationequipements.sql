-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 08:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdlocationequipements`
--

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `idm` int(11) NOT NULL,
  `courriel` varchar(256) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `role` varchar(1) DEFAULT 'M',
  `statut` varchar(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`idm`, `courriel`, `pass`, `role`, `statut`) VALUES
(35, 'fredericnguyen3@yahoo.com', '123456', 'M', 'A'),
(36, 'fredericnguyen@yahoo.com', '123456', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
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
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`idm`, `nom`, `prenom`, `courriel`, `sexe`, `datenaissance`, `photo`) VALUES
(1, 'super', 'Man', 'admin@compagnie.com', 'M', '1970-01-01', NULL),
(35, 'n', 'frede', 'fredericnguyen3@yahoo.com', 'M', '2023-10-29', '184d438a5d5a4115f8b05c12932d036387d284ae'),
(36, 'n', 'frede', 'fredericnguyen@yahoo.com', 'M', '2023-10-02', '4871dcd20a6f3295afcd842bf4f98ee1de01acde');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `idP` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `prix` int(11) NOT NULL,
  `qt_inventaire` int(11) NOT NULL,
  `pochette` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `connexion_idm_FK` (`idm`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
