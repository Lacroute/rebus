-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 15 Avril 2013 à 14:13
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `rebus`
--

-- --------------------------------------------------------

--
-- Structure de la table `rebus`
--

CREATE TABLE IF NOT EXISTS `rebus` (
  `rebus_id` int(11) NOT NULL AUTO_INCREMENT,
  `rebus_sentence` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rebus_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_found` tinyint(1) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  PRIMARY KEY (`rebus_id`),
  KEY `author` (`author`,`receiver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `rebus`
--
ALTER TABLE `rebus`
  ADD CONSTRAINT `rebus_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rebus_ibfk_1` FOREIGN KEY (`rebus_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
