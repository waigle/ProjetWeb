-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 17 Novembre 2023 à 10:40
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amphi3`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'jeu de hasard'),
(2, 'jeu de stratégie'),
(3, 'jeu de plateau'),
(4, 'jeu de dés'),
(5, 'jeu de cartes');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `FILE` varchar(5000) NOT NULL,
  `RULES` longblob NOT NULL,
  `categorie` int(11) NOT NULL,
  `description1` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`ID`, `NOM`, `FILE`, `RULES`, `categorie`, `description1`) VALUES
(1, 'Monopoly', 'monopoly-standard-2021.jpg', 0x4d6f6e6f706f6c79284672656e6368292e706466, 3, 'Le Monopoly ( litt. Â« monopole Â» en anglais) est un jeu de sociÃ©tÃ© amÃ©ricain Ã©ditÃ© par Hasbro. Le but du jeu consiste Ã  ruiner ses adversaires par des opÃ©rations immobiliÃ¨res. Il symbolise les aspects apparents et spectaculaires du capitalisme, les fortunes se faisant et se dÃ©faisant au fil des coups de dÃ©s.'),
(2, 'Poker', '7f4b1.jpg', 0x706f6b65722e706466, 5, 'POKER, subst. masc. A. âˆ’ Jeu de cartes oÃ¹ l\'on mise de l\'argent, fondÃ© sur le bluff, dans lequel chaque joueur disposant de cinq cartes peut gagner s\'il possÃ¨de la combinaison la plus forte ou s\'il amÃ¨ne ses adversaires Ã  renoncer au coup de cartes par sa force de conviction, l\'importance de sa mise ou de sa relance.'),
(3, 'Risk', '5f8ef16a01d78_5010993312306_d6dfb034_c12f_464e_9ad5_da3ef7df6f0a.webp', 0x7269736b2d72c3a8676c65732e706466, 2, 'Le but du jeu de plateau Risk est simple : les joueurs tentent de prendre le contrÃ´le des territoires ennemis en construisant leur armÃ©e, en dÃ©plaÃ§ant des rÃ©giments et en combattant.'),
(4, 'Tarot', 'selection-de-cartes-de-tarot-dans-un-pack-traditionnel-de-marseille-d865wc.jpg', 0x522d524f3230313230362e706466, 5, 'En plus des 22 Arcanes Majeurs, le Tarot se compose de 4 Suites ou Enseignes qui comprennent chacune 14 Cartes : 10 Cartes numÃ©rotÃ©es de l\'As au 10, 4 Cartes de Cour parfois appelÃ©es â€œHonneursâ€ : le Valet, le Cavalier, la Reine et le Roi.');

-- --------------------------------------------------------

--
-- Structure de la table `liste_jeu`
--

CREATE TABLE `liste_jeu` (
  `mail` varchar(50) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_jeu`
--

INSERT INTO `liste_jeu` (`mail`, `id_jeu`) VALUES
('baptiste@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `mail_participant` varchar(50) NOT NULL,
  `id_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `ID` int(11) NOT NULL,
  `lieu` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`nom`, `prenom`, `email`, `password`, `role`) VALUES
('Baap', 'aaa', 'baap@gmail.com', '$2y$12$GoyoVrZI4wB4qpm3UMdGZemcrkUbwgn.FIBPxfXRFBqRj8jpCI4o2', 1),
('Bacha', 'Baptiste', 'baptiste@gmail.com', '$2y$12$m1k.Dnu1YoZIF7XVkBQt9etRDt2vH/dWrB4HyVYUHIYE5Hx7QNyby', 2),
('Fremaux', 'Jolan', 'jolan@gmail.com', '$2y$12$m1k.Dnu1YoZIF7XVkBQt9etRDt2vH/dWrB4HyVYUHIYE5Hx7QNyby', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `liste_jeu`
--
ALTER TABLE `liste_jeu`
  ADD KEY `mail` (`mail`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD KEY `mail_participant` (`mail_participant`),
  ADD KEY `id_session` (`id_session`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD CONSTRAINT `jeux_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `liste_jeu`
--
ALTER TABLE `liste_jeu`
  ADD CONSTRAINT `liste_jeu_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `liste_jeu_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`ID`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`mail_participant`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `participe_ibfk_2` FOREIGN KEY (`id_session`) REFERENCES `session` (`ID`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
