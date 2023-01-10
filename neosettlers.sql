-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 jan. 2023 à 08:30
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `neosettlers`
--

-- --------------------------------------------------------

--
-- Structure de la table `agency`
--

DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `ceo_name` varchar(100) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `id_planet` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_planet` (`id_planet`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `id_planet` int(11) DEFAULT NULL,
  `tel` int(11) NOT NULL,
  `avatar` varchar(300) DEFAULT NULL,
  `cv` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_planet` (`id_planet`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidate_job_offer`
--

DROP TABLE IF EXISTS `candidate_job_offer`;
CREATE TABLE IF NOT EXISTS `candidate_job_offer` (
  `id_candidate` int(11) NOT NULL,
  `id_job_offer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `job_offer`
--

DROP TABLE IF EXISTS `job_offer`;
CREATE TABLE IF NOT EXISTS `job_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` longtext,
  `id_planet` int(11) NOT NULL,
  `contract_type` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `id_agency` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_agency` (`id_agency`),
  KEY `id_planet` (`id_planet`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `planet`
--

DROP TABLE IF EXISTS `planet`;
CREATE TABLE IF NOT EXISTS `planet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `planet`
--

INSERT INTO `planet` (`id`, `name`) VALUES
(1, 'trappist-b'),
(2, 'trappist-c'),
(3, 'trappist-d'),
(4, 'trappist-e'),
(5, 'trappist-f'),
(6, 'trappist-g'),
(7, 'trappist-h');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
