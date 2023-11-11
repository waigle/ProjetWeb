-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 nov. 2023 à 16:46
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
-- Base de données : `amphi2`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `jeux`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `participant` varchar(50) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `ID` int(11) NOT NULL,
  `lieu` int(11) NOT NULL,
  `nb_inscrits` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`ID`, `lieu`, `nb_inscrits`, `id_jeu`, `date`, `heure_debut`, `heure_fin`) VALUES
(1, 0, 0, 9, '2023-11-09', '17:30:00', '19:40:00');

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
('bacha', 'baptiste', 'baptiste@gmail.com', '$2y$10$hVb5lz8zSFv34BTDwjbSZekxQNUI26vgu.KnjDBR5DhS4qsFlTwBC', 2),
('Fremaux', 'Jolan', 'jolan.fremaux@gmail.com', '$2y$12$m1k.Dnu1YoZIF7XVkBQt9etRDt2vH/dWrB4HyVYUHIYE5Hx7QNyby', 1);

--
-- Index pour les tables déchargées
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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_session` (`ID`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
