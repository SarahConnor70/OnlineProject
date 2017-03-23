-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 22 Mars 2017 à 11:09
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
  `commentaire1` varchar(255) NOT NULL,
  `prerequis` varchar(255) NOT NULL;
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

--
-- Contenu de la table `resultatTest`
--

INSERT INTO `resultatTest` (`id`, `date`, `connuFormation`, `age`, `prescription`, `status`, `prescripteur`, `contreIndic`, `commentaire`, `id_stagiaire`, `resultatNiveau`, `resultatFormation`, `resultatExperience`, `pointNiveau`, `pointFormation`, `pointExperience`, `commentaire1`, `resultatTravail`, `resultatCuriosite`, `resultatDynamisme`, `resultatDiscours`, `resultatMobilite`, `pointTravail`, `pointCuriosite`, `pointDynamisme`, `pointDiscours`, `pointMobilite`, `total`, `commentaire2`, `commentaires2`, `resultatMetier`, `resultatEntreprise`, `resultatProjet`, `pointMetier`, `pointEntreprise`, `pointProjet`, `total1`, `commentaire3`, `commentaires3`, `resultatCulture`, `pointCulture`, `total2`, `commentaire4`, `NbPoints`, `note`) VALUES
(10, '21/12/1234', 'cgvhbj', 24, 'vbn,', 'bnjk,l', 'bhkjnl', 'bnkjl', 'bhnjk,', 0, 'oui', 'oiu', 'oiu', '1', '2', '2', 'cvbn,;', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '5', 'wxcvbn,', 'xcvbn,;', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', ''),
(11, '13/04/2017', 'pole emploi', 24, 'non', 'demandeur d\'emploi', 'moi', 'non', 'aucun', 0, 'oui', 'non', 'oui', '1', '2', '2', 'bien', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '12', 'pas de commentaires ', 'il faut mettre un commentaire', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', ''),
(12, '13/04/2017', 'pole emploi', 24, 'non', 'demandeur d\'emploi', 'moi', 'non', 'aucun', 0, 'oui', 'non', 'oui', '1', '2', '2', 'bien', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '12', 'pas de commentaires sddsdsdlqkfhsdlkvhfsoghnÃ¹epodfhÃ¹EPOiojkgbvjnc,mlxÃ¹lsqpoedirjfhgvbn c,;mÃ¹qpzoeifhgjvbn clmsqoezirgbvn ', 'il faut mettre un commentaire', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', ''),
(13, '12/12/2016', 'zertyui', 12, 'dfghbn', 'sdcfgvbhnj,k', 'dhgjkl', 'tghjkl', 'cvbn', 0, 'oui', 'oui', 'oui', '2', '2', '1', 'ertyuiop', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '4', 'sqdwfxgchjbkn', 'wxcbvnezrtyuiop', '1', '1', '0', '0', '0', '0', '0', 'vhbjknl,mlkjhgfd', 'mlkjhgtfrdsw', '', '', '', '', '', ''),
(14, '12/12/2016', 'zertyui', 12, 'dfghbn', 'sdcfgvbhnj,k', 'dhgjkl', 'tghjkl', 'cvbn', 0, 'oui', 'oui', 'oui', '2', '2', '1', 'ertyuiop', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '4', 'sqdwfxgchjbkn', 'wxcbvnezrtyuiop', '1', '1', '0', '0', '0', '0', '0,223', 'vhbjknl,mlkjhgfd', 'mlkjhgtfrdsw', '', '', '', '', '', ''),
(15, '12/12/2016', 'zertyui', 12, 'dfghbn', 'sdcfgvbhnj,k', 'dhgjkl', 'tghjkl', 'cvbn', 0, 'oui', 'oui', 'oui', '2', '2', '1', 'ertyuiop', '1', '1', '1', '1', '1', '0,234', '0,234', '0,234', '0,234', '0,234', '4,234', 'sqdwfxgchjbkn', 'wxcbvnezrtyuiop', '1', '1,5', '0,5', '0,223', '0,223', '0,223', '0,223', 'vhbjknl,mlkjhgfd', 'mlkjhgtfrdsw', '', '', '', '', '', ''),
(16, '12/12/2016', 'zertyui', 12, 'dfghbn', 'sdcfgvbhnj,k', 'dhgjkl', 'tghjkl', 'cvbn', 0, 'oui', 'oui', 'oui', '2', '2', '1', 'ertyuiop', '1', '1', '1', '1', '1', '0,234', '0,234', '0,234', '0,234', '0,234', '4,234', 'sqdwfxgchjbkn', 'wxcbvnezrtyuiop', '1', '1,5', '0,5', '0,223', '0,223', '33', '0,223', 'vhbjknl,mlkjhgfd', 'mlkjhgtfrdsw', '', '', '', '', '', ''),
(17, '12/12/2016', 'zertyui', 12, 'dfghbn', 'sdcfgvbhnj,k', 'dhgjkl', 'tghjkl', 'cvbn', 0, 'oui', 'oui', 'oui', '2', '2', '1', 'ertyuiop', '1', '1', '1', '1', '1', '0,234', '0,234', '0,234', '0,234', '0,234', '4,234', 'sqdwfxgchjbkn', 'wxcbvnezrtyuiop', '1', '1,5', '0,5', '0,223', '0,223', '', '0,223', 'vhbjknl,mlkjhgfd', 'mlkjhgtfrdsw', '', '', '', '', '', ''),
(18, '12/12/2016', 'zertyui', 12, 'dfghbn', 'sdcfgvbhnj,k', 'dhgjkl', 'tghjkl', 'cvbn', 0, 'oui', 'oui', 'oui', '2', '2', '1', 'ertyuiop', '1', '1', '1', '1', '1', '0,234', '0,234', '0,234', '0,234', '0,234', '4,234', 'sqdwfxgchjbkn', 'wxcbvnezrtyuiop', '1', '1,5', '0,5', '0,223', '0,223', '3333', '0,223', 'vhbjknl,mlkjhgfd', 'mlkjhgtfrdsw', '', '', '', '', '', ''),
(19, '12/12/2017', 'kuyjfthg', 32, 'jhghfd', 'pmlkjhg', 'mlkj,hn', 'm!l:k;,jnb', 'mlk;j,hnb', 0, 'poi', 'iu', 'kiu', '1,23', '1,23', '1,23', 'okijhg', '1', '1', '1', '1', '1', '1,23', '1,23', '1,23', '1,23', '1,23', '1,23', 'opiuyt', 'oliuyhgf', '1', '1', '1', '1,23', '1,23', '1,23', '1,23', 'iujh', 'oiuh', '5', '1,23', '1,23', 'rtyui', '12', '43'),
(20, '12', 'dfcgvbn', 55, 'xcvb', ' vb', 'bn,', 'vbn,', 'cvbn', 0, 'jhkj', 'lkj', 'lk;j,hn', '1', '1', '1', 'fggvhb,j', '1', '1', '1', '1', '1', '0.625', '0.625', '0.625', '0.625', '0.625', '3.125', 'dfghj', 'cvbn,', '2', '2', '2', '1.25', '1.25', '1.25', '3.75', 'fdgbn', 'cvbn,', '5', '5', '5', '20/40', '11.875', '11.875');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
