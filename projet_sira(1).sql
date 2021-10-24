-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Mars 2020 à 16:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_sira`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE IF NOT EXISTS `agences` (
  `id_agence` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(3) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_agence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Contenu de la table `agences`
--

INSERT INTO `agences` (`id_agence`, `titre`, `adresse`, `ville`, `cp`, `description`, `photo`) VALUES
(100, 'Agence du Mordor', '666 bvd de l''Oeil de Sauron', ' 	Mordor', 96, 'L''agence du Mordor est ouverte 7j/7 de 9h à 19h', 'agence1.jpg'),
(101, 'Agence de La Comté', '42 rue du Hobbit', 'La Comté', 20, 'L''agence de La Comté est ouverte 7j/7 de 9h à 19h', 'agence2.jpg'),
(102, 'Agence de Fondcombes', '78 allée des Saules', 'Fondcombes', 42, 'L''agence de Fondcombes est ouverte 7j/7 de 9h à 19h', 'agence3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_membre` int(3) NOT NULL,
  `id_vehicule` int(3) NOT NULL,
  `id_agence` int(3) NOT NULL,
  `date_heure_depart` date NOT NULL,
  `date_heure_fin` date NOT NULL,
  `prix_total` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_commande`),
  KEY `id_membre` (`id_membre`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_agence` (`id_agence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `id_vehicule`, `id_agence`, `date_heure_depart`, `date_heure_fin`, `prix_total`, `date_enregistrement`) VALUES
(1000, 26, 500, 100, '2020-04-01', '2020-04-10', 450, '2020-03-18 16:32:33');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('f','m') NOT NULL,
  `id_statut` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `id_statut` (`id_statut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `id_statut`, `date_enregistrement`) VALUES
(26, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Polo', 'Marco', 'marco@mail.com', 'm', 20, '2020-03-17 16:15:22'),
(27, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'Bird', 'Chris', 'chris@mail.com', 'm', 21, '2020-03-17 17:12:12'),
(28, 'user2', '$2y$10$gpTmQfwUng5tQbyGvcKr1OmSnK2kBAOtf8DQ5VJh2hYtE5ZyFo22e', 'Lena', 'Magda', 'magda@mail.com', 'f', 21, '2020-03-19 11:22:54');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(10) NOT NULL AUTO_INCREMENT,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `statut`) VALUES
(20, 'Admin'),
(21, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(3) NOT NULL AUTO_INCREMENT,
  `id_agence` int(3) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `prix_journalier` int(3) NOT NULL,
  PRIMARY KEY (`id_vehicule`),
  KEY `id_agence` (`id_agence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=515 ;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `id_agence`, `titre`, `marque`, `modele`, `description`, `photo`, `prix_journalier`) VALUES
(500, 100, 'Citroen Kangoo', 'Citroen', 'Kangoo', 'Diesel, 5 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'voiture1.jpg', 45),
(503, 101, 'Mustang Clio', 'Mustang', 'Clio', 'Diesel, 5 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'voiture2.jpg', 60),
(505, 100, 'Ferrari Twingo', 'Ferrari', 'Twingo', 'Diesel, 3 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'Ferrari Twingo.jpg', 85),
(506, 101, 'Lamborghini Aventador', 'Lamborghini', 'Aventador', 'Diesel, 3 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire) 	', 'Lamborghini Aventador.jpg', 70),
(507, 101, 'Renauld Megan', 'Renauld', 'Megan', 'Diesel, 3 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'Renauld Megan.jpg', 55),
(508, 100, 'Peugeot Panda', 'Peugeot', 'Panda', 'Diesel, 4 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'Peugeot Panda.jpg', 50),
(509, 100, 'Cadillac 405', 'Cadillac', '405', 'Diesel, 5 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'Cadillac 405.jpg', 65),
(510, 101, 'Rolls Royce Romeo', 'Rolls Royce', 'Romeo', 'Diesel, 5 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'Rolls Royce Romeo.jpg', 80),
(511, 100, 'Rover Azur', 'Rover', 'Azur', 'Diesel, 5 portes, Autoradio, Forfait 1000km (0.5/km supplémentaire)', 'Rover Azur.jpg', 90);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `contrainte_agence2` FOREIGN KEY (`id_agence`) REFERENCES `agences` (`id_agence`),
  ADD CONSTRAINT `contrainte_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `contrainte_vehicule` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `contrainte_agence` FOREIGN KEY (`id_agence`) REFERENCES `agences` (`id_agence`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
