-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Mars 2018 à 12:07
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_fredi`
--

CREATE DATABASE db_fredi;
USE db_fredi;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `licence_adherent` int(11) DEFAULT NULL,
  `nom_adherent` varchar(25) DEFAULT NULL,
  `prenom_adherent` varchar(25) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `rue_adherent` varchar(25) DEFAULT NULL,
  `cp_adherent` varchar(25) DEFAULT NULL,
  `ville_adherent` varchar(25) DEFAULT NULL,
  `sexe_adherent` varchar(7) DEFAULT NULL,
  `id_adherent` int(11) NOT NULL,
  `id_club` int(11) DEFAULT NULL,
  `id_demandeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`licence_adherent`, `nom_adherent`, `prenom_adherent`, `date_naissance`, `rue_adherent`, `cp_adherent`, `ville_adherent`, `sexe_adherent`, `id_adherent`, `id_club`, `id_demandeur`) VALUES
(20202020, 'gh', 'fdf', NULL, NULL, NULL, NULL, NULL, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `avancer`
--

CREATE TABLE `avancer` (
  `id_demandeur` int(11) NOT NULL,
  `id_frais` int(11) NOT NULL,
  `id_notedefrais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avancer`
--

INSERT INTO `avancer` (`id_demandeur`, `id_frais`, `id_notedefrais`) VALUES
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7),
(1, 8, 4),
(1, 8, 7),
(1, 9, 8),
(1, 10, 9);

-- --------------------------------------------------------

--
-- Structure de la table `bloque`
--

CREATE TABLE `bloque` (
  `nom_bloque` varchar(32) NOT NULL,
  `annee_bloque` int(4) NOT NULL,
  `id_bloque` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bloque`
--

INSERT INTO `bloque` (`nom_bloque`, `annee_bloque`, `id_bloque`) VALUES
('adrien', 2018, 5),
('adrien', 2018, 4);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `nom_club` varchar(25) DEFAULT NULL,
  `adresse_club` varchar(25) DEFAULT NULL,
  `cp_club` varchar(6) DEFAULT NULL,
  `ville_club` varchar(25) DEFAULT NULL,
  `sigle_club` varchar(25) DEFAULT NULL,
  `nompresident_club` varchar(25) DEFAULT NULL,
  `id_ligue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `adresse_club`, `cp_club`, `ville_club`, `sigle_club`, `nompresident_club`, `id_ligue`) VALUES
(1, 'TFCC', '31 rue vialette', '31100', 'Toulouse', 'TFCC', 'Stephane Mezart', 1);

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `id_demandeur` int(11) NOT NULL,
  `pseudo_demandeur` varchar(25) DEFAULT NULL,
  `mail_demandeur` varchar(60) DEFAULT NULL,
  `mdp_demandeur` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `demandeur`
--

INSERT INTO `demandeur` (`id_demandeur`, `pseudo_demandeur`, `mail_demandeur`, `mdp_demandeur`) VALUES
(1, 'adrien', 'adrien@fakemail.com', '7256fa491423f6017b5a8534f600603cd912904165c0c59847e300b92e43ffe2'),
(2, 'louis', 'moi@fakemail.com', '2c4b93f67dba52098b3b8a148de5476b65f99f76e1b4fb6db667b3242742157c');

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--

CREATE TABLE `indemnite` (
  `id_indemnite` int(11) NOT NULL,
  `annee_indemnite` year(4) DEFAULT NULL,
  `tarif_kilometrique` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `indemnite`
--

INSERT INTO `indemnite` (`id_indemnite`, `annee_indemnite`, `tarif_kilometrique`) VALUES
(1, 2018, 0.543);

-- --------------------------------------------------------

--
-- Structure de la table `lignefrais`
--

CREATE TABLE `lignefrais` (
  `id_frais` int(11) NOT NULL,
  `datelignefrais` date DEFAULT NULL,
  `trajet_frais` varchar(25) DEFAULT NULL,
  `km_frais` float DEFAULT NULL,
  `cout_trajet` float DEFAULT NULL,
  `cout_peage` float DEFAULT NULL,
  `cout_hebergement` float DEFAULT NULL,
  `cout_repas` float DEFAULT NULL,
  `id_motif` int(11) DEFAULT NULL,
  `id_indemnite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lignefrais`
--

INSERT INTO `lignefrais` (`id_frais`, `datelignefrais`, `trajet_frais`, `km_frais`, `cout_trajet`, `cout_peage`, `cout_hebergement`, `cout_repas`, `id_motif`, `id_indemnite`) VALUES
(1, '2018-02-10', 'Toulouse-Bordeau', 400, 20, 35, 0, 35, 1, 1),
(7, '2018-03-23', '8', 7, 5, 4, 2, 5, NULL, NULL),
(8, '2018-03-07', '15', 789, 79, 756, 45, 4678, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `libelle_ligue`) VALUES
(1, 'Aquaponey');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `libelle_motif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `motif`
--

INSERT INTO `motif` (`id_motif`, `libelle_motif`) VALUES
(1, 'Tournois tennis');

-- --------------------------------------------------------

--
-- Structure de la table `notedefrais`
--

CREATE TABLE `notedefrais` (
  `id_notedefrais` int(11) NOT NULL,
  `annee_notedefrais` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notedefrais`
--

INSERT INTO `notedefrais` (`id_notedefrais`, `annee_notedefrais`) VALUES
(1, 2018),
(2, 2018),
(3, 2016),
(4, 2018),
(5, 2014),
(6, 2014),
(7, 2014),
(8, 2017),
(9, 2017);

-- --------------------------------------------------------

--
-- Structure de la table `representant`
--

CREATE TABLE `representant` (
  `nom_representant` varchar(25) DEFAULT NULL,
  `prenom_representant` varchar(25) DEFAULT NULL,
  `rue_representant` varchar(25) DEFAULT NULL,
  `cp_representant` varchar(25) DEFAULT NULL,
  `ville_representant` varchar(25) DEFAULT NULL,
  `id_demandeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD KEY `FK_adherent_id_club` (`id_club`),
  ADD KEY `FK_adherent_id_demandeur` (`id_demandeur`);

--
-- Index pour la table `avancer`
--
ALTER TABLE `avancer`
  ADD PRIMARY KEY (`id_demandeur`,`id_frais`,`id_notedefrais`),
  ADD KEY `FK_avancer_id_frais` (`id_frais`),
  ADD KEY `FK_avancer_id_notedefrais` (`id_notedefrais`);

--
-- Index pour la table `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`id_bloque`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `FK_club_id_ligue` (`id_ligue`);

--
-- Index pour la table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`id_demandeur`);

--
-- Index pour la table `indemnite`
--
ALTER TABLE `indemnite`
  ADD PRIMARY KEY (`id_indemnite`);

--
-- Index pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  ADD PRIMARY KEY (`id_frais`),
  ADD KEY `FK_lignefrais_id_motif` (`id_motif`),
  ADD KEY `FK_lignefrais_id_indemnite` (`id_indemnite`);

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id_motif`);

--
-- Index pour la table `notedefrais`
--
ALTER TABLE `notedefrais`
  ADD PRIMARY KEY (`id_notedefrais`);

--
-- Index pour la table `representant`
--
ALTER TABLE `representant`
  ADD PRIMARY KEY (`id_demandeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `bloque`
--
ALTER TABLE `bloque`
  MODIFY `id_bloque` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id_demandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `indemnite`
--
ALTER TABLE `indemnite`
  MODIFY `id_indemnite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  MODIFY `id_frais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `notedefrais`
--
ALTER TABLE `notedefrais`
  MODIFY `id_notedefrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `FK_adherent_id_club` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `FK_adherent_id_demandeur` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`);

--
-- Contraintes pour la table `avancer`
--
ALTER TABLE `avancer`
  ADD CONSTRAINT `FK_avancer_id_demandeur` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`),
  ADD CONSTRAINT `FK_avancer_id_frais` FOREIGN KEY (`id_frais`) REFERENCES `lignefrais` (`id_frais`),
  ADD CONSTRAINT `FK_avancer_id_notedefrais` FOREIGN KEY (`id_notedefrais`) REFERENCES `notedefrais` (`id_notedefrais`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `FK_club_id_ligue` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

--
-- Contraintes pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  ADD CONSTRAINT `FK_lignefrais_id_indemnite` FOREIGN KEY (`id_indemnite`) REFERENCES `indemnite` (`id_indemnite`),
  ADD CONSTRAINT `FK_lignefrais_id_motif` FOREIGN KEY (`id_motif`) REFERENCES `motif` (`id_motif`);

--
-- Contraintes pour la table `representant`
--
ALTER TABLE `representant`
  ADD CONSTRAINT `FK_representant_id_demandeur` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;