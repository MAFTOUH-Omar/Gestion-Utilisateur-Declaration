-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 26 fév. 2023 à 01:14
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `demopdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `arrchive`
--

CREATE TABLE `arrchive` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `img` text DEFAULT 'http://localhost/img/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arrchive`
--

INSERT INTO `arrchive` (`id`, `nom`, `prenom`, `email`, `tel`, `img`) VALUES
(17, 'BELGADIR', 'Youssef', 'omarmaftou0000@gmail.com', 604534791, 'http://localhost/img/user.png'),
(16, 'BEN AMAR', 'Yassine', 'benamar@gmail.com', 600457890, 'http://localhost/img/user.png');

-- --------------------------------------------------------

--
-- Structure de la table `declaration`
--

CREATE TABLE `declaration` (
  `id` int(11) NOT NULL,
  `NomAdmin` varchar(255) DEFAULT NULL,
  `PrenomAdmin` varchar(255) DEFAULT NULL,
  `Problem` text DEFAULT NULL,
  `DateDeclaration` date DEFAULT curdate(),
  `locations` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `solution` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `declaration`
--

INSERT INTO `declaration` (`id`, `NomAdmin`, `PrenomAdmin`, `Problem`, `DateDeclaration`, `locations`, `company`, `solution`) VALUES
(14, 'MAFTOUH', 'Omar', 'Probleme d\'insertion de produit', '2023-02-20', 'EcOmar', 'Khouribga', 'Verifier le serveur local wamp'),
(15, 'ALLAOUI', 'Mousab', 'Connexion', '2023-02-21', 'RXT', 'Casablanca', 'Verifier le serveur local wamp'),
(16, 'ARABI', 'Mohamed', 'Débogage sur l\'application X ', '2023-02-22', 'Rabat', 'Imigration Canada', NULL);

--
-- Déclencheurs `declaration`
--
DELIMITER $$
CREATE TRIGGER `remplir_solution` AFTER INSERT ON `declaration` FOR EACH ROW insert into solution(declaration,NomAdmin,PrenomAdmin,company,locations,DateDeclaration) values(NEW.Problem,NEW.NomAdmin,NEW.PrenomAdmin,NEW.company,NEW.locations,NEW.DateDeclaration)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `declaration` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `NomAdmin` varchar(255) DEFAULT NULL,
  `PrenomAdmin` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `locations` varchar(255) DEFAULT NULL,
  `DateDeclaration` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `solution`
--

INSERT INTO `solution` (`id`, `declaration`, `solution`, `NomAdmin`, `PrenomAdmin`, `company`, `locations`, `DateDeclaration`) VALUES
(5, 'Probleme d\'insertion de produit', 'Verifier le serveur local wamp', 'MAFTOUH', 'Omar', 'Khouribga', 'EcOmar', '2023-02-20'),
(6, 'Connexion', 'verifier roteur', 'ALLAOUI', 'Mousab', 'Casablanca', 'RXT', '2023-02-21'),
(7, 'Débogage sur l\'application X ', NULL, 'ARABI', 'Mohamed', 'Imigration Canada', 'Rabat', '2023-02-22');

--
-- Déclencheurs `solution`
--
DELIMITER $$
CREATE TRIGGER `remplir_declaration` AFTER UPDATE ON `solution` FOR EACH ROW update declaration set solution=new.solution where NomAdmin=NomAdmin
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `specialite` varchar(255) DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `_password_` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`id`, `nom`, `prenom`, `email`, `specialite`, `solution`, `_password_`) VALUES
(1, 'SAROUTE', 'Othmane', 'saroute.othmane@contact.com', 'informatcien', NULL, 'SAROUTE'),
(2, NULL, NULL, NULL, NULL, 'verifier les cables', NULL),
(3, NULL, NULL, NULL, NULL, 'verfier la carte mere', NULL),
(4, NULL, NULL, NULL, NULL, 'verfier la carte mere', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `img` text DEFAULT 'http://localhost/img/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `tel`, `img`) VALUES
(18, 'KHALID', 'Amine', 'khalide_@gmail.col', 678347619, 'http://localhost/img/user.png'),
(19, 'BELGADIR', 'Youssef', 'belgadir.youssef@gmail.com', 678936718, 'http://localhost/img/user.png'),
(20, 'SAROUTE', 'Othmane', 'saroute.pubg@yahoo.ma', 767482619, 'http://localhost/img/user.png'),
(21, 'MENGADE', 'Ayoub', 'ayoub.ock1234@gmail.fr', 634178910, 'http://localhost/img/user.png'),
(22, 'FANNY', 'Wadie', 'fanny_WAC@contact.org', 748392619, 'http://localhost/img/user.png'),
(23, 'HORAICHI', 'Abd lhak', 'horachi_abdlhak@egy.com', 647123478, 'http://localhost/img/user.png'),
(24, 'NOUBIR', 'Morad', 'noubir@mail.ita', 678452929, 'http://localhost/img/user.png');

--
-- Déclencheurs `user`
--
DELIMITER $$
CREATE TRIGGER `Arrchives` AFTER DELETE ON `user` FOR EACH ROW begin
insert into Arrchive value(OLD.id,OLD.nom,OLD.prenom,OLD.email,OLD.tel,OLD.img);
end
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `declaration`
--
ALTER TABLE `declaration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `declaration`
--
ALTER TABLE `declaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `technicien`
--
ALTER TABLE `technicien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
