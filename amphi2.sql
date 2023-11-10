-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 10 Novembre 2023 à 15:19
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amphi2`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `FILE` varchar(5000) NOT NULL,
  `RULES` varchar(5000) NOT NULL,
  `categorie` int(11) NOT NULL,
  `description1` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`ID`, `NOM`, `FILE`, `RULES`, `categorie`, `description1`) VALUES
(9, 'Monopoly', 'Monopoly.png', '1d-monopoly-regle.pdf', 1, 'Le Monopoly est un jeu de sociÃ©tÃ© de stratÃ©gie qui simule l\'achat, la vente et la construction de propriÃ©tÃ©s.\r\n\r\n\r\n\r\nMonopoly est un jeu classique qui nÃ©cessite des compÃ©tences de nÃ©gociation, de gestion de l\'argent et de prise de dÃ©cision pour rÃ©ussir.\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `liste_jeu`
--

CREATE TABLE `liste_jeu` (
  `nom` varchar(50) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `participant` varchar(50) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `id_session` int(11) NOT NULL,
  `date` date NOT NULL,
  `horaire` double NOT NULL,
  `duree` double NOT NULL,
  `lieu` int(11) NOT NULL,
  `nb_inscrits` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL
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
('bacha', 'baptiste', 'baptiste@gmail.com', '$2y$10$hVb5lz8zSFv34BTDwjbSZekxQNUI26vgu.KnjDBR5DhS4qsFlTwBC', 2),
('aa', 'bb', 'bb@gmail.com', '$2y$12$NyaYi3wncWQzmkRf2g7r8.ULKAHBCc/U3SGDIbnoqFha0/NHXryme', 1),
('fremaux', 'jolan', 'jolan@gmail.com', '$2y$10$dkDgZCJxdQlh4F66QgNeruFGOHSBTqXd3UlkYBLAyCjg4fE6B81Jm', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `liste_jeu`
--
ALTER TABLE `liste_jeu`
  ADD KEY `nom` (`nom`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD KEY `participant` (`participant`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `id_session` (`id_session`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `liste_jeu`
--
ALTER TABLE `liste_jeu`
  ADD CONSTRAINT `liste_jeu_ibfk_1` FOREIGN KEY (`nom`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `liste_jeu_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`ID`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`participant`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `participe_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`ID`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
