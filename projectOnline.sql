-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Mars 2017 à 22:34
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projectonline`
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
  `debut` varchar(255) NOT NULL,
  `fin` varchar(255) NOT NULL,
  `placeRegion` int(2) NOT NULL,
  `placeSupp` int(1) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `promo` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `resultattest`
--

CREATE TABLE `resultattest` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `connuFormation` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `prescripteur` varchar(255) NOT NULL,
  `contreIndic` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `idStagiaire` int(11) NOT NULL,
  `resultatNiveau` varchar(255) NOT NULL,
  `resultatFormation` varchar(255) NOT NULL,
  `resultatExperience` varchar(255) NOT NULL,
  `pointNiveau` varchar(5) NOT NULL,
  `pointFormation` varchar(5) NOT NULL,
  `pointExperience` varchar(5) NOT NULL,
  `commentaire1` varchar(255) NOT NULL,
  `prerequis` varchar(255) NOT NULL,
  `resultatTravail` varchar(10) NOT NULL,
  `resultatCuriosite` varchar(10) NOT NULL,
  `resultatDynamisme` varchar(10) NOT NULL,
  `resultatDiscours` varchar(10) NOT NULL,
  `resultatMobilite` varchar(10) NOT NULL,
  `pointTravail` varchar(10) NOT NULL,
  `pointCuriosite` varchar(10) NOT NULL,
  `pointDynamisme` varchar(10) NOT NULL,
  `pointDiscours` varchar(10) NOT NULL,
  `pointMobilite` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `commentaire2` varchar(255) NOT NULL,
  `resultatMetier` varchar(10) NOT NULL,
  `resultatEntreprise` varchar(10) NOT NULL,
  `resultatProjet` varchar(10) NOT NULL,
  `pointMetier` varchar(10) NOT NULL,
  `pointEntreprise` varchar(10) NOT NULL,
  `pointProjet` varchar(10) NOT NULL,
  `total1` varchar(10) NOT NULL,
  `commentaire3` varchar(255) NOT NULL,
  `resultatCulture` varchar(10) NOT NULL,
  `pointCulture` varchar(10) NOT NULL,
  `total2` varchar(10) NOT NULL,
  `commentaire4` varchar(255) NOT NULL,
  `NbPoints` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `date` varchar(255) NOT NULL,
  `stagiaire` varchar(255) NOT NULL,
  `promo` int(9) NOT NULL
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
  `telephone` varchar(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `promo` int(8) NOT NULL,
  `accepter` varchar(255) NOT NULL
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
-- Index pour la table `resultattest`
--
ALTER TABLE `resultattest`
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
-- AUTO_INCREMENT pour la table `resultattest`
--
ALTER TABLE `resultattest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
