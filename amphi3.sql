-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 nov. 2023 à 18:13
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amphi3`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categorie`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`ID`, `NOM`, `FILE`, `RULES`, `categorie`, `description1`) VALUES
(1, 'Monopoly', 'Monopoly.jpg', 0x31642d6d6f6e6f706f6c792d7265676c652e706466, 3, 'Le Monopoly ( litt. « monopole » en anglais) est un jeu de société américain édité par Hasbro. Le but du jeu consiste à ruiner ses adversaires par des opérations immobilières. Il symbolise les aspects apparents et spectaculaires du capitalisme, les fortunes se faisant et se défaisant au fil des coups de dés.'),
(2, 'Poker', 'poker.jpg', 0x706f6b65722e706466, 2, 'POKER, subst. masc. A. ? Jeu de cartes où l\'on mise de l\'argent, fondé sur le bluff, dans lequel chaque joueur disposant de cinq cartes peut gagner s\'il possède la combinaison la plus forte ou s\'il amène ses adversaires à renoncer au coup de cartes par sa force de conviction, l\'importance de sa mise ou de sa relance.'),
(3, 'Risk', 'risk.jpg', 0x63662d7269736b2d7265676c652e706466, 2, 'Le but du jeu de plateau Risk est simple : les joueurs tentent de prendre le contrôle des territoires ennemis en construisant leur armée, en déplaçant des régiments et en combattant.');

-- --------------------------------------------------------

--
-- Structure de la table `liste_jeu`
--

CREATE TABLE `liste_jeu` (
  `mail` varchar(50) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `mail_participant` varchar(50) NOT NULL,
  `id_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `prenom`, `email`, `password`, `role`) VALUES
('Bacha', 'Baptiste', 'baptiste@gmail.com', '$2y$12$m1k.Dnu1YoZIF7XVkBQt9etRDt2vH/dWrB4HyVYUHIYE5Hx7QNyby', 2);

--
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
