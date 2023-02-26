-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 fév. 2023 à 12:39
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
(23, 'HORAICHI', 'Abd lhak', 'horachi_abdlhak@egy.com', 647123478, 'http://localhost/img/user.png');

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
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
