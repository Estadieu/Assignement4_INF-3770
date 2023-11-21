-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generated on: Tue, 21 Nov 2023 at 11:47
-- Server version: 5.7.31
-- PHP version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabinet`
--
CREATE DATABASE IF NOT EXISTS `cabinet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cabinet`;

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `civilite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `civilite`) VALUES
(3, 'Doc2', 'Doc2', 'Women'),
(5, 'Doctor3', 'Doctor3', 'Women'),
(9, 'Doctor1', 'Doctor1', 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_usager` int(11) NOT NULL,
  `date_rdv` datetime NOT NULL,
  `duree` smallint(6) DEFAULT NULL,
  `id_medecin` int(11) NOT NULL,
  PRIMARY KEY (`id_usager`,`date_rdv`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdv`
--

INSERT INTO `rdv` (`id_usager`, `date_rdv`, `duree`, `id_medecin`) VALUES
(8, '2021-12-15 08:47:27', 30, 3),
(11, '2022-01-01 16:03:00', 30, 3),
(11, '2021-12-01 10:00:00', 30, 3),
(21, '2022-12-28 12:00:00', 30, 5);

-- --------------------------------------------------------

--
-- Table structure for table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `id_usager` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `civilite` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cdp` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `lieu_naiss` varchar(50) DEFAULT NULL,
  `num_secu` varchar(50) DEFAULT NULL,
  `num_secu0` int(11) DEFAULT NULL,
  `num_secu1` int(11) DEFAULT NULL,
  `num_secu2` int(11) DEFAULT NULL,
  `num_secu3` int(11) DEFAULT NULL,
  `num_secu4` int(11) DEFAULT NULL,
  `num_secu5` int(11) DEFAULT NULL,
  `num_secu6` int(11) DEFAULT NULL,
  `heartRateMonday` int(11) DEFAULT NULL,
  `heartRateTuesday` int(11) DEFAULT NULL,
  `heartRateWednesday` int(11) DEFAULT NULL,
  `heartRateThursday` int(11) DEFAULT NULL,
  `heartRateFriday` int(11) DEFAULT NULL,
  `heartRateSaturday` int(11) DEFAULT NULL,
  `heartRateSunday` int(11) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usager`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usager`
--

INSERT INTO `usager` (`id_usager`, `nom`, `prenom`, `civilite`, `adresse`, `cdp`, `ville`, `lieu_naiss`, `num_secu`, `num_secu0`, `num_secu1`, `num_secu2`, `num_secu3`, `num_secu4`, `num_secu5`, `num_secu6`, `heartRateMonday`, `heartRateTuesday`, `heartRateWednesday`, `heartRateThursday`, `heartRateFriday`, `heartRateSaturday`, `heartRateSunday`, `date_naiss`, `id_medecin`) VALUES
(8, 'Naji', 'Geoffrey', 'Man', 'rue le nÃ´tre', '121', 'Toulouse', 'Carca', '5555', 4000, 300, 7000, 2000, 6000, 4300, 50, 80, 85, 79, 90, 80, 75, 84, '2021-12-03', NULL),
(11, 'Estadieu', 'Jean', 'Man', 'Rue st michel', '1234', 'Toulouse', 'Nice', '9999', 4000, 8000, 4000, 7000, 4000, 5000, 3000, 86, 90, 79, 83, 80, 70, 80, '2000-10-19', NULL),
(21, 'Jang', 'Ayoung', 'Women', '1222ijrfoh\'nov', '100', 'TT', 'TT', '222', 4000, 1000, 5000, 3000, 4000, 9000, 0, 0, 0, 0, 0, 0, 0, 0, '2000-10-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `mdp`) VALUES
(3, 'Test1', '$2y$10$cdfl3Yar5CtCDmP5kweOseyPQECdMPoQLRSPLKkzW9ASYGmiKNX1G'),
(2, 'Admin', '$2y$10$78/LxjSipaBYZARSw7IJBORUwFEFgcp7SzpTL02MYTn65lxp3dp2G'),
(4, 'Test3', '$2y$10$qrGfF1Y.JJiEbkDwNkQcFeq7o6pumV0LO9daeTQsWFpUye7TmEVqi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
