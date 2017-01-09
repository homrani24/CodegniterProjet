-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Janvier 2017 à 18:13
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `ID_BOUTIQUE` int(10) NOT NULL,
  `ID_CLIENT` int(10) DEFAULT NULL,
  `NOM_BOUTIQUE` longtext,
  `DATE_CRIATION` longtext,
  `DESCRIPTION_BOUT` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `boutique`
--

INSERT INTO `boutique` (`ID_BOUTIQUE`, `ID_CLIENT`, `NOM_BOUTIQUE`, `DATE_CRIATION`, `DESCRIPTION_BOUT`) VALUES
(1, 1, 'alenee', 'dxdddddddddddddddddddddddddddddddddddd', 'nomzer'),
(2, 1, 'mmmmmmmmmmmmmmmmmmmm', 'jjjjjjjjjjjjjjjjjjjjjjj', '2016-12-28');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID_CAT` int(10) NOT NULL,
  `NOM_CAT` longtext,
  `DESCRIPTION` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ID_CAT`, `NOM_CAT`, `DESCRIPTION`) VALUES
(1, 'livre', 'livre science'),
(3, 'dvd', 'dvd produit'),
(4, 'dvd', 'dvd produit');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(10) NOT NULL,
  `NOM_CLIENT` longtext,
  `PRENOM_CLIENT` longtext,
  `ADRESSE_CLIENT` longtext,
  `MAIL` longtext,
  `MDP` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `ADRESSE_CLIENT`, `MAIL`, `MDP`) VALUES
(1, 'homrani', 'now', 'france', 'mmm@mmm.mmm', '9de37a0627c25684fdd519ca84073e34'),
(2, 'dfwsddswsws', 'dwsfwsxfvwsx', 'fxdedfws', 'dfxxdgfmmm@mmm.mmm', '9de37a0627c25684fdd519ca84073e34'),
(3, 'mounir', 'homrani', 'tunis', 'homrani24@hotmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4'),
(4, 'sniper', 'mefdflm', 'fgdsdf', 'sniper@sniper.sniper', '1c27680133b781cadd037e8a6dcc001b');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `ID_CLIENT` int(10) NOT NULL,
  `ID_PROD` int(10) NOT NULL,
  `QUANTITE` int(11) DEFAULT NULL,
  `PRICE` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`ID_CLIENT`, `ID_PROD`, `QUANTITE`, `PRICE`) VALUES
(1, 14, 1, '55'),
(1, 13, 1, '55'),
(1, 16, 1, '78'),
(4, 17, 1, '54'),
(4, 16, 1, '78');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ID_PROD` int(10) NOT NULL,
  `ID_BOUTIQUE` int(10) NOT NULL,
  `ID_CAT` int(10) NOT NULL,
  `NOM_PROD` longtext,
  `PRIX` longtext,
  `DESCRIPTION_PD` longtext,
  `PICTURE_PD` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`ID_PROD`, `ID_BOUTIQUE`, `ID_CAT`, `NOM_PROD`, `PRIX`, `DESCRIPTION_PD`, `PICTURE_PD`) VALUES
(20, 1, 3, 'book', '90', 'ddfvsfs', 'book2.jpg'),
(17, 1, 1, 'books', '54', 'aaaa', 'books1.jpg'),
(16, 1, 4, 'dxdvxcj', '78', 'qqqqqqqqqqqqq', '14611061_1414060025297327_5916713295110377064_n.png'),
(18, 6, 1, 'mmmmmmmmmmmmmmm', '85', 'mmmmmmmmmmmm', '14606339_738727129608143_1862068265155223757_n.jpg'),
(19, 1, 1, 'kkkkkkkkkkk', '62', 'kkkkkkkkk', 'book21.jpg'),
(21, 1, 3, 'aaaaaaaaa', '55', 'ddddddddddddd', 'books.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`ID_BOUTIQUE`),
  ADD KEY `FK_AVOIR` (`ID_CLIENT`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_CAT`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`ID_CLIENT`,`ID_PROD`),
  ADD KEY `FK_PANIER2` (`ID_PROD`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ID_PROD`),
  ADD KEY `FK_DANS` (`ID_BOUTIQUE`),
  ADD KEY `FK_TYPE` (`ID_CAT`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `ID_BOUTIQUE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_CAT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `ID_PROD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
