-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Avril 2017 à 11:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestcom`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `Codart` int(11) NOT NULL,
  `Disgart` varchar(100) DEFAULT NULL,
  `Puart` float DEFAULT NULL,
  `Qtestock` int(11) DEFAULT NULL,
  `Smin` int(11) DEFAULT NULL,
  `Smax` int(11) DEFAULT NULL,
  PRIMARY KEY (`Codart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`Codart`, `Disgart`, `Puart`, `Qtestock`, `Smin`, `Smax`) VALUES
(1, 'Television', 9999.99, 29, 5, 35),
(2, 'Machine à laver', 2299.99, 14, 3, 25),
(3, 'Lave-vaisselle', 4499.99, 38, 2, 40),
(4, 'Refrigerateur', 7999.99, 10, 1, 20),
(5, 'Table à manger', 599.99, 67, 10, 70),
(6, 'Chaise', 250.99, 110, 20, 150),
(7, 'Moulinex', 360.99, 40, 6, 52),
(8, 'Four électrique', 3199.99, 11, 2, 30);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `IDclt` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `email` varchar(350) DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`IDclt`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IDclt`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'abdel', 'hakim', 'abdel@hakim.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'hamza', 'moustaid', 'hamza@hamza.com', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `Numcom` int(11) NOT NULL AUTO_INCREMENT,
  `IDclt` int(11) DEFAULT NULL,
  `DateCom` date DEFAULT NULL,
  PRIMARY KEY (`Numcom`),
  KEY `FK_IDCLT` (`IDclt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`Numcom`, `IDclt`, `DateCom`) VALUES
(1, 2, '2017-04-01'),
(2, 2, '2017-04-09'),
(3, 2, '2017-04-24'),
(4, 2, '2017-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

CREATE TABLE IF NOT EXISTS `lignecommande` (
  `Numcom` int(11) DEFAULT NULL,
  `Codart` int(11) DEFAULT NULL,
  `Qtcmd` int(11) DEFAULT NULL,
  KEY `FK_NUMCOM` (`Numcom`),
  KEY `FK_CODART` (`Codart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignecommande`
--

INSERT INTO `lignecommande` (`Numcom`, `Codart`, `Qtcmd`) VALUES
(1, 1, 5),
(2, 1, 2),
(2, 3, 2),
(2, 5, 2),
(3, 3, 4),
(4, 4, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `IDmsg` int(11) NOT NULL AUTO_INCREMENT,
  `IDclt` int(11) DEFAULT NULL,
  `sujet` varchar(200) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `reponse` varchar(1000) NOT NULL,
  PRIMARY KEY (`IDmsg`),
  KEY `FK_IDCLT1` (`IDclt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`IDmsg`, `IDclt`, `sujet`, `message`, `reponse`) VALUES
(1, 2, '*dqfqd', 'dqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqd', 'dqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqd'),
(2, 2, 'sfdsqf', 'dqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqddqfdsqfdsqfdsfdsfsdfsdfsqdfsdqfsdqfdsqfdsqfsdfsqd', ''),
(3, 2, 'GGHGJ', 'JHJHV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?HV?', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_IDCLT` FOREIGN KEY (`IDclt`) REFERENCES `client` (`IDclt`);

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `FK_CODART` FOREIGN KEY (`Codart`) REFERENCES `article` (`Codart`),
  ADD CONSTRAINT `FK_NUMCOM` FOREIGN KEY (`Numcom`) REFERENCES `commande` (`Numcom`);

--
-- Contraintes pour la table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `FK_IDCLT1` FOREIGN KEY (`IDclt`) REFERENCES `client` (`IDclt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
