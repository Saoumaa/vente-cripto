-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 06 août 2021 à 18:18
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `promarket`
--

-- --------------------------------------------------------

--
-- Structure de la table `btob`
--

CREATE TABLE `btob` (
  `business_id` int(11) NOT NULL,
  `society_name` varchar(25) NOT NULL,
  `society_size` int(11) NOT NULL,
  `ceo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_phone` bigint(20) NOT NULL,
  `shop_quantity` smallint(6) NOT NULL,
  `zip_adress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `office_phone` bigint(20) NOT NULL,
  `society_card` blob NOT NULL,
  `society_bill` blob NOT NULL,
  `society_bill-amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `btoc`
--

CREATE TABLE `btoc` (
  `private_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `zip_adress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `identity_card` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pkt`
--

CREATE TABLE `pkt` (
  `id` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `rate` smallint(6) NOT NULL,
  `value` mediumint(9) NOT NULL,
  `date_of _registration` date NOT NULL,
  `date_of_insertion` date NOT NULL,
  `owner` varchar(255) NOT NULL,
  `pkt_key` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `btob`
--
ALTER TABLE `btob`
  ADD PRIMARY KEY (`business_id`);

--
-- Index pour la table `btoc`
--
ALTER TABLE `btoc`
  ADD PRIMARY KEY (`private_id`);

--
-- Index pour la table `pkt`
--
ALTER TABLE `pkt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `btob`
--
ALTER TABLE `btob`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `btoc`
--
ALTER TABLE `btoc`
  MODIFY `private_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pkt`
--
ALTER TABLE `pkt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
