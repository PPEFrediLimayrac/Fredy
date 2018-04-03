-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 avr. 2018 à 14:29
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_fredy`
--

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
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`licence_adherent`, `nom_adherent`, `prenom_adherent`, `date_naissance`, `rue_adherent`, `cp_adherent`, `ville_adherent`, `sexe_adherent`, `id_adherent`, `id_club`, `id_demandeur`) VALUES
(20202020, 'gh', 'fdf', NULL, NULL, NULL, NULL, NULL, 4, NULL, 1),
(201458, 'koli', 'cristophe', '2018-03-25', 'pont', '65000', 'toulouse', 'Femme', 6, 1, 3),
(1146841, 'NOM', 'PRENOM', '2018-06-15', 'hutz', '57842', 'toulouse', 'Femme', 7, 1, 3),
(12121212, 'tutu', 'tutu', '2018-03-16', 'tutu', '1212121', 'tuhttht', 'Homme', 9, 3, 7),
(5872, 'Alary', 'adri', '2018-03-24', 'limayrac', '31110', 'toulouse', 'Homme', 10, 2, 8),
(158, 'koi', 'kop', '2018-10-30', 'ahh', '1487', 'toulouse', 'Homme', 11, 1, 8),
(201458, 'fsfesd', 'fesdf', '2018-04-11', 'vic', '8789', 'esfe', 'Femme', 13, 1, 10),
(45646546, 'tutu', 'cristophe', '2018-04-29', 'tutu', '1212121', 'tuhttht', 'Homme', 14, 3, 10);

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
-- Déchargement des données de la table `avancer`
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
(1, 10, 9),
(1, 32, 10),
(1, 33, 11),
(1, 34, 12),
(1, 35, 13),
(1, 36, 14),
(1, 37, 15),
(1, 38, 16),
(1, 39, 17),
(1, 40, 18),
(1, 41, 19),
(1, 42, 20),
(1, 43, 16),
(1, 44, 16),
(1, 45, 16),
(1, 46, 9),
(8, 46, 21),
(8, 47, 21),
(8, 48, 21),
(9, 49, 22),
(10, 50, 25),
(10, 51, 25),
(10, 52, 26),
(10, 53, 26);

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
-- Déchargement des données de la table `bloque`
--

INSERT INTO `bloque` (`nom_bloque`, `annee_bloque`, `id_bloque`) VALUES
('adrien', 2018, 5),
('adrien', 2018, 4),
('adrien', 2016, 6),
('adri', 2018, 7),
('clem', 2018, 8);

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
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `adresse_club`, `cp_club`, `ville_club`, `sigle_club`, `nompresident_club`, `id_ligue`) VALUES
(1, 'TFCC', '31 rue vialette', '31100', 'Toulouse', 'TFCC', 'Stephane Mezart', 1),
(2, 'rugbyclub', 'rue des roses', '31200', 'toulouse', 'coq', 'pignoux', 1),
(3, 'stripclub', 'rue des lilas', '31200', 'toulouse', 'rose', 'robert', 1);

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `id_demandeur` int(11) NOT NULL,
  `pseudo_demandeur` varchar(25) DEFAULT NULL,
  `mail_demandeur` varchar(60) DEFAULT NULL,
  `mdp_demandeur` varchar(150) DEFAULT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demandeur`
--

INSERT INTO `demandeur` (`id_demandeur`, `pseudo_demandeur`, `mail_demandeur`, `mdp_demandeur`, `nom`, `prenom`, `adresse`) VALUES
(1, 'adrien', 'adrien@fakemail.com', '7256fa491423f6017b5a8534f600603cd912904165c0c59847e300b92e43ffe2', '', '', ''),
(2, 'louis', 'moi@fakemail.com', '2c4b93f67dba52098b3b8a148de5476b65f99f76e1b4fb6db667b3242742157c', '', '', ''),
(3, 'Clement', 'clement@coucou.fr', '9ece1493eeef8d413fc0a5849589d2d5512c2278788e81e7bd975f77de6e41d8', '', '', ''),
(4, 'tutu', 'tutu@tutu', '6aa119ff81402a287ecbe445d87a289a5189b09810f2f07f811431667fea83c8', '', '', ''),
(5, 'tutu', 'tutu@tutu', '6aa119ff81402a287ecbe445d87a289a5189b09810f2f07f811431667fea83c8', '', '', ''),
(6, 'tutu', 'tutu', '6aa119ff81402a287ecbe445d87a289a5189b09810f2f07f811431667fea83c8', '', '', ''),
(7, 'fufu', 'fufu@fufu', 'f50fd939fb8c453cb4624c86c27134e765dc2a109f7b733f1f6b78f856ae227f', 'fufu', 'fufu', 'fufu'),
(8, 'adri', 'adri@coucou.fr', '2112dd9786065d376be988658e3f5dfb54a1e3024801b26976cd30e900e70115', 'Alary', 'adrien', 'limayrac'),
(9, 'viktor', 'viktorus@mail.fr', '859e2dc09b33cf026b8b9d3f36419f3769d78baf76595059f9b278fbe1102f92', 'Brioche', 'Viktor', '17 rue'),
(10, 'clem', 'clem', '15cb885e986055f752b281182269c95a8b6a7ad27bf3688eaecf9d0a997350e8', 'clem', 'clem', 'clem');

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
-- Déchargement des données de la table `indemnite`
--

INSERT INTO `indemnite` (`id_indemnite`, `annee_indemnite`, `tarif_kilometrique`) VALUES
(1, 2018, 0.543),
(2, 2017, 0.524),
(3, 2016, 0.5),
(4, 2015, 0.2),
(5, 2014, 0.15);

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
  `id_indemnite` int(11) DEFAULT NULL,
  `Adherent` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefrais`
--

INSERT INTO `lignefrais` (`id_frais`, `datelignefrais`, `trajet_frais`, `km_frais`, `cout_trajet`, `cout_peage`, `cout_hebergement`, `cout_repas`, `id_motif`, `id_indemnite`, `Adherent`) VALUES
(1, '2018-02-10', 'Toulouse-Bordeau', 400, 20, 35, 0, 35, 1, 1, ''),
(7, '2018-03-23', '8', 7, 5, 4, 2, 5, NULL, NULL, ''),
(8, '2018-03-07', '15', 789, 79, 756, 45, 4678, NULL, NULL, ''),
(9, '2017-12-08', '', 358, 10, 10, 10, 10, NULL, NULL, ''),
(10, '2018-03-08', 'Toulouse - tarbes', 360, 10, 10, 10, 10, NULL, NULL, ''),
(11, '2016-06-17', 'Toulouse - tarbes', 236, 25, 23, 24, 25, NULL, NULL, ''),
(12, '2016-06-17', 'Toulouse - tarbes', 236, 25, 23, 24, 25, NULL, NULL, ''),
(13, '2016-06-17', 'Toulouse - tarbes', 236, 25, 23, 24, 25, NULL, NULL, ''),
(14, '0001-01-14', '1', 1, 1, 1, 5, 11, NULL, NULL, ''),
(15, '0001-01-14', '1', 1, 1, 1, 5, 11, NULL, NULL, ''),
(17, '0001-01-14', '1', 1, 1, 1, 5, 11, NULL, NULL, ''),
(18, '2018-03-07', '542', 5, 7, 8, 1, 7, NULL, NULL, ''),
(19, '2018-03-07', '542', 5, 7, 8, 1, 7, NULL, NULL, ''),
(20, '2018-03-07', '542', 5, 7, 8, 1, 7, NULL, NULL, ''),
(21, '2018-03-08', 'Toulouse - tarbes', 15, 75, 78, 96, 54, NULL, NULL, ''),
(22, '2018-03-08', 'Toulouse - tarbes', 15, 75, 78, 96, 54, NULL, NULL, ''),
(23, '2018-03-08', 'Toulouse - tarbes', 15, 75, 78, 96, 54, NULL, NULL, ''),
(24, '2018-03-08', 'Toulouse - tarbes', 15, 75, 78, 96, 54, NULL, NULL, ''),
(25, '2018-03-07', '15?156', 4864, 684, 56, 148, 4, NULL, NULL, ''),
(26, '2018-03-07', '7', 8, 21, 4, 94, 2, NULL, NULL, ''),
(27, '2018-03-07', '7', 8, 21, 4, 94, 2, NULL, NULL, ''),
(28, '2018-03-07', '7', 8, 21, 4, 94, 2, NULL, NULL, ''),
(29, '2018-03-07', '7', 8, 21, 4, 94, 2, NULL, NULL, ''),
(30, '2018-03-07', '7', 8, 21, 4, 94, 2, NULL, NULL, ''),
(31, '2018-03-07', '7', 8, 21, 4, 94, 2, NULL, NULL, ''),
(32, '2018-03-15', '15', 1, 68, 486, 46, 146, NULL, NULL, ''),
(33, '2018-03-01', '', 48, 4, 9814, 814, 4, NULL, NULL, ''),
(34, '2018-03-15', '186141864', 6841, 61, 6486, 1, 1, NULL, NULL, ''),
(35, '2018-03-15', '7', 8, 78, 7, 89789, 5, NULL, NULL, ''),
(36, '2018-03-15', '7', 8, 78, 7, 89789, 5, NULL, NULL, ''),
(37, '2018-03-15', '159', 156, 87, 64, 61, 1, NULL, NULL, ''),
(38, '2018-03-14', '1', 61, 61, 6, 16, 1, NULL, NULL, ''),
(39, '2018-03-22', '16', 1, 61, 681, 61, 16, NULL, NULL, ''),
(40, '2018-03-24', '189', 1, 1, 89, 891, 891, NULL, NULL, ''),
(41, '2018-03-15', '1', 891, 891, 981, 91, 18, NULL, NULL, ''),
(42, '2018-03-15', '1', 891, 891, 981, 91, 18, NULL, NULL, ''),
(43, '2018-03-14', '498', 14, 8914, 8914, 891, 89, NULL, NULL, ''),
(45, '2018-03-14', '4', 984, 894, 894, 894, 894, NULL, NULL, ''),
(47, '2018-03-25', 'toulouse paris', 580, 20, 25, 26, 27, NULL, NULL, ''),
(48, '2018-03-14', 'ahahah', 58, 18, 48, 78, 59, NULL, NULL, ''),
(49, '2018-03-17', 'toulouse tarbes', 12, 13, 14, 15, 15, NULL, NULL, ''),
(50, '2018-04-20', '87', 39, 0, 12, 12, 8, NULL, NULL, 'cristophe'),
(51, '2018-04-12', '87', 54, 0, 41, 26, 8, NULL, NULL, 'fesdf'),
(52, '2018-04-04', '121', 1212, 0, 121, 1212, 1221, NULL, NULL, 'cristophe'),
(53, '2018-04-18', '12212', 1212, 0, 3132, 7867, 221, NULL, NULL, 'cristophe');

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
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
-- Déchargement des données de la table `motif`
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
-- Déchargement des données de la table `notedefrais`
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
(9, 2017),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, 2016),
(17, NULL),
(18, 2015),
(19, NULL),
(20, NULL),
(21, 2018),
(22, 2018),
(23, 2018),
(24, 2018),
(25, 2018),
(26, 2017);

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
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `bloque`
--
ALTER TABLE `bloque`
  MODIFY `id_bloque` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id_demandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `indemnite`
--
ALTER TABLE `indemnite`
  MODIFY `id_indemnite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  MODIFY `id_frais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
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
  MODIFY `id_notedefrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Contraintes pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
