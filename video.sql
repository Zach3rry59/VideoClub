-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 05 sep. 2022 à 13:57
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `video`
--
CREATE DATABASE IF NOT EXISTS `video` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `video`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `NUM_ADHERENT` int(4) NOT NULL,
  `NOM_ADHERENT` varchar(25) NOT NULL DEFAULT '',
  `PRENOM_ADHERENT` varchar(20) NOT NULL DEFAULT '',
  `ADR_ADHERENT` varchar(32) NOT NULL DEFAULT '',
  `ADR2_ADHERENT` varchar(32) DEFAULT NULL,
  `CODEPOSTAL_ADHERENT` varchar(5) DEFAULT NULL,
  `VILLE_ADHERENT` varchar(25) DEFAULT NULL,
  `TEL_ADHERENT` varchar(15) DEFAULT NULL,
  `DATE_ADHESION` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `REF_PIECE_IDENTITE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`NUM_ADHERENT`, `NOM_ADHERENT`, `PRENOM_ADHERENT`, `ADR_ADHERENT`, `ADR2_ADHERENT`, `CODEPOSTAL_ADHERENT`, `VILLE_ADHERENT`, `TEL_ADHERENT`, `DATE_ADHESION`, `REF_PIECE_IDENTITE`) VALUES
(1, 'Adh1', 'Rudy', '34 rue Florimond Lemaire', '', '62800', 'Lievin', '0623155416', '2005-12-15 12:01:41', ''),
(2, 'Adh2', 'Alex', '01 rue AFPA', NULL, '59100', 'Roubaix', NULL, '2006-10-03 00:00:00', 'CNI 542345678'),
(3, 'Adh3', 'Hugo', '10 rue de la Clef', 'Appt 5', '59000', 'Lille', NULL, '2008-02-03 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `LOGIN_ADMIN` varchar(255) NOT NULL,
  `PASS_ADMIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `LOGIN_ADMIN`, `PASS_ADMIN`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `ID_FILM` int(6) NOT NULL,
  `CODE_TYPE_FILM` char(3) NOT NULL DEFAULT '',
  `ID_REALIS` int(4) NOT NULL DEFAULT '0',
  `TITRE_FILM` varchar(50) NOT NULL DEFAULT '',
  `ANNEE_FILM` int(4) NOT NULL DEFAULT '0',
  `REF_IMAGE` varchar(50) DEFAULT NULL,
  `RESUME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`ID_FILM`, `CODE_TYPE_FILM`, `ID_REALIS`, `TITRE_FILM`, `ANNEE_FILM`, `REF_IMAGE`, `RESUME`) VALUES
(1, 'ACT', 3, 'Die Hard 1', 1988, 'DieHard1Mini.jpg', 'résumé film 1'),
(2, 'ACT', 3, 'Die Hard 2', 1990, 'DieHard2Mini.jpg', 'résumé film 2'),
(3, 'ACT', 3, 'Die Hard 3', 1995, 'DieHard3Mini.jpg', 'résumé film 3'),
(4, 'ACT', 3, 'Die Hard 4', 2007, 'DieHard4Mini.jpg', 'résumé film 4'),
(5, 'ACT', 3, 'Die Hard 5', 2013, 'DieHard5Mini.jpg', 'résumé film 5'),
(6, 'ACT', 2, 'Le Seigneur Des Anneaux 1', 2001, 'SeigneurDesAnneaux1Mini.jpg', 'résumé film 6'),
(7, 'ACT', 2, 'Le Seigneur Des Anneaux 2', 2002, 'SeigneurDesAnneaux2Mini.jpg', 'résumé film 7'),
(8, 'ACT', 2, 'Le Seigneur Des Anneaux 3', 2003, 'SeigneurDesAnneaux3Mini.jpg', 'résumé film 8'),
(9, 'ACT', 1, 'Star Wars 1', 1999, 'StarWars1Mini.jpg', 'résumé film 9'),
(10, 'ACT', 1, 'Star Wars 2', 2002, 'StarWars2Mini.jpg', 'résumé film 10'),
(11, 'ACT', 1, 'Star Wars 3', 2005, 'StarWars3Mini.jpg', 'résumé film 11'),
(12, 'ANI', 4, 'Cars 1', 2006, 'Cars1Mini.jpg', 'résumé film 12'),
(13, 'ANI', 4, 'Cars 2', 2011, 'Cars2Mini.jpg', 'résumé film 13'),
(14, 'ANI', 5, 'Age De Glace 1', 2002, 'AgeDeGlace1Mini.jpg', 'résumé film 14'),
(15, 'ANI', 5, 'Age De Glace 2', 2006, 'AgeDeGlace2Mini.jpg', 'résumé film 15'),
(16, 'ANI', 5, 'Age De Glace 3', 2009, 'AgeDeGlace3Mini.jpg', 'résumé film 16'),
(17, 'ANI', 5, 'Age De Glace 4', 2012, 'AgeDeGlace4Mini.jpg', 'résumé film 17'),
(18, 'ANI', 6, 'Madagascar 1', 2005, 'Madagascar1Mini.jpg', 'résumé film 18'),
(19, 'ANI', 6, 'Madagascar 2', 2008, 'Madagascar2Mini.jpg', 'résumé film 19'),
(20, 'ANI', 6, 'Madagascar 3', 2012, 'Madagascar3Mini.jpg', 'résumé film 20'),
(21, 'COM', 7, 'La Verité Si Je Mens 1', 1997, 'LaVeriteSiJeMens1Mini.jpg', 'résumé film 21'),
(22, 'COM', 7, 'La Verité Si Je Mens 2', 2001, 'LaVeriteSiJeMens2Mini.jpg', 'résumé film 22'),
(23, 'COM', 7, 'La Verité Si Je Mens 3', 2013, 'LaVeriteSiJeMens3Mini.jpg', 'résumé film 23'),
(24, 'COM', 8, 'Scary Movie 1', 2000, 'ScaryMovie1Mini.jpg', 'résumé film 24'),
(25, 'COM', 8, 'Scary Movie 2', 2001, 'ScaryMovie2Mini.jpg', 'résumé film 25'),
(26, 'COM', 8, 'Scary Movie 3', 2003, 'ScaryMovie3Mini.jpg', 'résumé film 26'),
(27, 'COM', 8, 'Scary Movie 4', 2006, 'ScaryMovie4Mini.jpg', 'résumé film 27'),
(28, 'COM', 8, 'Scary Movie 5', 2013, 'ScaryMovie5Mini.jpg', 'résumé film 28'),
(29, 'HOR', 11, 'American Nightmare 1', 2013, 'AmericanNightmare1Mini.jpg', 'résumé film 29'),
(30, 'HOR', 11, 'American Nightmare 2', 2014, 'AmericanNightmare2Mini.jpg', 'résumé film 30'),
(31, 'HOR', 10, 'Saw 1', 2004, 'Saw1Mini.jpg', 'résumé film 31'),
(32, 'HOR', 10, 'Saw 2', 2005, 'Saw2Mini.jpg', 'résumé film 32'),
(33, 'HOR', 10, 'Saw 3', 2006, 'Saw3Mini.jpg', 'résumé film 33'),
(34, 'HOR', 10, 'Saw 4', 2007, 'Saw4Mini.jpg', 'résumé film 34'),
(35, 'HOR', 10, 'Saw 5', 2008, 'Saw5Mini.jpg', 'résumé film 35'),
(36, 'HOR', 10, 'Saw 6', 2009, 'Saw6Mini.jpg', 'résumé film 36'),
(37, 'HOR', 10, 'Saw 7', 2010, 'Saw7Mini.jpg', 'résumé film 37');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `NUM_ADHERENT` int(4) NOT NULL DEFAULT '0',
  `ID_FILM` int(6) NOT NULL DEFAULT '0',
  `CODE_SUPPORT` char(1) NOT NULL DEFAULT '',
  `DEBUT_LOCATION` date NOT NULL DEFAULT '1000-01-01',
  `DATE_RETOUR` date DEFAULT NULL,
  `TARIF_APPLIQUE` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `star`
--

CREATE TABLE `star` (
  `ID_STAR` int(4) NOT NULL,
  `NOM_STAR` varchar(25) NOT NULL DEFAULT '',
  `PRENOM_STAR` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `star`
--

INSERT INTO `star` (`ID_STAR`, `NOM_STAR`, `PRENOM_STAR`) VALUES
(9, 'Abrahams', 'Jim'),
(11, 'DeMonaco', 'James'),
(4, 'Disney', 'Pixar'),
(5, 'Dreamworks', 'Studios'),
(7, 'Gilou', 'Thomas'),
(12, 'GreenGrass', 'Paul'),
(2, 'Jackson', 'Peter'),
(1, 'Lucas', 'George'),
(3, 'McTierman', 'John'),
(13, 'Morel', 'Pierre'),
(15, 'Nolan', 'Christopher'),
(14, 'Singer', 'Bryan'),
(6, 'Sky', 'Studios'),
(16, 'Wachowski', 'Brothers'),
(10, 'Wan', 'James'),
(8, 'Wayans', 'Brothers'),
(17, 'Zemeckis', 'Robert');

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE `support` (
  `CODE_SUPPORT` char(1) NOT NULL DEFAULT '',
  `LIB_SUPPORT` varchar(12) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `support`
--

INSERT INTO `support` (`CODE_SUPPORT`, `LIB_SUPPORT`) VALUES
('B', 'Blue Ray'),
('D', 'DVD'),
('K', 'K7 Vidéo');

-- --------------------------------------------------------

--
-- Structure de la table `typefilm`
--

CREATE TABLE `typefilm` (
  `CODE_TYPE_FILM` char(3) NOT NULL DEFAULT '',
  `LIB_TYPE_FILM` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typefilm`
--

INSERT INTO `typefilm` (`CODE_TYPE_FILM`, `LIB_TYPE_FILM`) VALUES
('ACT', 'Action'),
('ANI', 'Animation'),
('COM', 'Comedie'),
('HOR', 'Horreur'),
('POL', 'Policier'),
('SCF', 'Science Fiction');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`NUM_ADHERENT`),
  ADD KEY `NOM_ADHERENT` (`NOM_ADHERENT`,`PRENOM_ADHERENT`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_FILM`),
  ADD KEY `CODE_TYPE_FILM` (`CODE_TYPE_FILM`),
  ADD KEY `FKFILMSTAR` (`ID_REALIS`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`NUM_ADHERENT`,`ID_FILM`,`CODE_SUPPORT`,`DEBUT_LOCATION`),
  ADD KEY `fk-location-film` (`ID_FILM`);

--
-- Index pour la table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`ID_STAR`),
  ADD KEY `NOM_STAR` (`NOM_STAR`,`PRENOM_STAR`);

--
-- Index pour la table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`CODE_SUPPORT`);

--
-- Index pour la table `typefilm`
--
ALTER TABLE `typefilm`
  ADD PRIMARY KEY (`CODE_TYPE_FILM`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `NUM_ADHERENT` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `ID_FILM` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `star`
--
ALTER TABLE `star`
  MODIFY `ID_STAR` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk-film-star` FOREIGN KEY (`ID_REALIS`) REFERENCES `star` (`ID_STAR`),
  ADD CONSTRAINT `fk-film_typefilm` FOREIGN KEY (`CODE_TYPE_FILM`) REFERENCES `typefilm` (`CODE_TYPE_FILM`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk-location-adherent` FOREIGN KEY (`NUM_ADHERENT`) REFERENCES `adherent` (`NUM_ADHERENT`),
  ADD CONSTRAINT `fk-location-film` FOREIGN KEY (`ID_FILM`) REFERENCES `film` (`ID_FILM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;