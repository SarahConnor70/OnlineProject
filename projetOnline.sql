-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 20 Mars 2017 à 15:41
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetOnline`
--

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `id` int(1) NOT NULL,
  `nomEntreprise` varchar(100) NOT NULL,
  `adresseEntreprise` varchar(150) NOT NULL,
  `telephoneEntreprise` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `coordonnees`
--

INSERT INTO `coordonnees` (`id`, `nomEntreprise`, `adresseEntreprise`, `telephoneEntreprise`) VALUES
(1, 'OnlineFormaPro Vesoul', '19 rue du Praley, 70000 Vesoul', '03.84.76.52.44');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `placeRegion` int(2) NOT NULL,
  `placeSupp` int(1) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `promo` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `resultatTest`
--

CREATE TABLE `resultatTest` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `connuFormation` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `prescripteur` varchar(255) NOT NULL,
  `contreIndic` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `id_stagiaire` int(11) NOT NULL,
  `resultatNiveau` varchar(255) NOT NULL,
  `resultatFormation` varchar(255) NOT NULL,
  `resultatExperience` varchar(255) NOT NULL,
  `pointNiveau` varchar(5) NOT NULL,
  `pointFormation` varchar(5) NOT NULL,
  `pointExperience` varchar(5) NOT NULL,
  `commentaire1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `resultatTest`
--

INSERT INTO `resultatTest` (`id`, `date`, `connuFormation`, `age`, `prescription`, `status`, `prescripteur`, `contreIndic`, `commentaire`, `id_stagiaire`, `resultatNiveau`, `resultatFormation`, `resultatExperience`, `pointNiveau`, `pointFormation`, `pointExperience`, `commentaire1`) VALUES
(1, '12/03/2017', 'oui', 45, 'non', 'oui', 'oui', 'non', 'non', 0, '', '', '', '', '', '', ''),
(2, '23/05/2017', 'oui', 78, 'oui', 'oui', 'oui', 'non', 'non', 0, '', '', '', '', '', '', ''),
(3, '23/05/2017', 'oui', 78, 'oui', 'oui', 'oui', 'non', 'non', 0, '', '', '', '', '', '', ''),
(4, '23/05/2017', 'oui', 78, 'oui', 'oui', 'oui', 'non', 'non', 0, '', '', '', '', '', '', ''),
(5, '23/10/2018', 'non', 26, 'non', 'oui', 'non', 'non', 'oui', 0, '', '', '', '', '', '', ''),
(6, '23/10/2018', 'non', 26, 'non', 'oui', 'non', 'non', 'oui', 0, '', '', '', '', '', '', ''),
(7, '9/12/2347', 'non', 34, 'noui', 'nkpl', 'ouo', 'non', 'oui', 0, '', '', '', '', '', '', ''),
(8, '21/03/2017', 'xcvbn', 56, 'cvbn', 'v nbn', 'vhbkjnlk', 'hkj', 'cvbnjk', 0, 'oui', 'oui', 'non', '1', '2', '1', 'gcfnbnn');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `tuteur` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL,
  `promo` int(8) NOT NULL,
  `accepter` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `resultatTest`
--
ALTER TABLE `resultatTest`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `resultatTest`
--
ALTER TABLE `resultatTest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;