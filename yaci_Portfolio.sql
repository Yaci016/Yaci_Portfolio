-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: yacifrzgfcyacine.mysql.db
-- Generation Time: Feb 10, 2019 at 10:16 AM
-- Server version: 5.6.40-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yacifrzgfcyacine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `prenom`, `email`, `mdp`, `nom`) VALUES
(1, 'yacine', 'yaci016@hotmail.fr', '$2y$10$/70tfAuB.jFvS6MTW0Zp2e6Dcl5ooqDBeq1LJ/q5J0OWttrNpJg4a', 'kherbache');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenue` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenue`, `date_ajout`, `id_auteur`, `id_categorie`) VALUES
(3, 'Creation du projet blog', '<p>Premiere version du blog de <strong>yaci</strong> !</p> on peux commenter les news, dessiner en canvas et en svg !  Si ca c\'est pas genial !! :D ', '2018-10-22 01:00:33', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Auteur`
--

CREATE TABLE `Auteur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Auteur`
--

INSERT INTO `Auteur` (`id`, `Nom`, `Prenom`) VALUES
(1, 'Kherbache', 'Yacine'),
(2, 'BeterLoup', 'Christophe');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `Nom_De_Categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `Nom_De_Categorie`) VALUES
(1, 'Jeux_video'),
(2, 'famille'),
(3, 'General'),
(5, 'SliceOfLife');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `id_user`, `prix_total`, `date`) VALUES
(1, 6, 21, '2018-11-23 23:50:41'),
(2, 6, 3, '2018-11-23 23:52:13'),
(3, 6, 3, '2018-11-23 23:53:02'),
(4, 6, 9, '2018-11-23 23:53:05'),
(5, 6, 3, '2018-11-23 23:53:16'),
(6, 6, 6, '2018-11-23 23:53:21'),
(7, 6, 6, '2018-11-23 23:53:31'),
(8, 6, 6, '2018-11-23 23:53:50'),
(9, 5, 3, '2018-11-24 00:47:01'),
(10, 5, 39, '2018-11-24 00:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `id` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `contenue` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_article` int(11) NOT NULL,
  `Valide` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ligne_de_commande`
--

CREATE TABLE `ligne_de_commande` (
  `id` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `id_meal` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ligne_de_commande`
--

INSERT INTO `ligne_de_commande` (`id`, `idCommande`, `id_meal`, `quantité`, `prix_unitaire`) VALUES
(1, 8, 1, 1, 3),
(2, 8, 1, 1, 3),
(3, 9, 1, 1, 3),
(4, 10, 5, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categories` text NOT NULL,
  `description` text NOT NULL,
  `prix_achat` float NOT NULL,
  `prix_vente` float NOT NULL,
  `stock` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `categories`, `description`, `prix_achat`, `prix_vente`, `stock`, `photo`) VALUES
(1, 'Coca-Cola', 'Boisson', 'Mmmm, le Coca-Cola avec 10 morceaux de sucres et tout plein de caféine', 1, 3, 50, 'coca.jpg'),
(6, 'Cookie', 'gateau', 'Nos cookies sont delicieux', 0.5, 7.5, 100, 'cookies.jpg'),
(7, 'Dr.Pepper', 'Boisson', 'son goût sucré avec de l\'amande vous ravira !', 1, 5, 600, 'drpepper.jpg'),
(8, 'Milkshake', 'boisson', 'Notre milkshake bien crémeux contient des morceaux d\'Oréos et est accompagné de crème chantilly et de smarties en guise de topping il éblouira vos papilles ! ', 3, 37, 100, 'milkshake.jpg'),
(9, 'Donut Chocolat', 'gateau', 'Les donuts sont fabriqués le matin même et sont recouvert d\'une délicieuse sauce au chocolat ! ', 2, 15, 42, 'chocolate_donut.jpg'),
(10, 'Carrot Cake', 'gateau', 'Le carrot cake maison ravira les plus gourmands et les puristes : tous les ingrédients sont naturels ! A consommer sans modération', 13, 27, 20, 'carrot_cake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `nb_couverts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse` text,
  `code_postal` int(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `phone` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `date_de_naissance`, `mdp`, `adresse`, `code_postal`, `ville`, `phone`) VALUES
(5, 'Kherbache', 'Yacine', 'yacinekherbache3@yaci.fr', '1939-01-01', '$2y$10$LpBI7J0tNKg2PBWww6GaUerHugmjmPDI5wbNiqcSd2LcHnCkvXbPa', '85 rue remi caughe', 59100, 'ROUBAIX', '05 17 42 11 38'),
(6, 'Kherbache', 'Yacine', 'yacinekherbache4@yaci.fr', '1939-01-01', '$2y$10$KSXU4RNYR8uYYaKH32zXsuaNB1Lhc6lcQun/dH2LsZGSDJaq35U5m', '85 rue remi caughe', 59100, 'ROUBAIX', '05 17 42 11 37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Pseudo` varchar(60) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `Droits` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Pseudo`, `Pass`, `Droits`) VALUES
(2, 'dz', '$2y$10$gRML0JwED6Yt7FzA96dwD.5yVtQE9Ymbjj2Yft08Jgbqck7ap9unG', 1),
(3, 'yaci016', '$2y$10$7nhwJPU3EMfYsfISrcH2OOo0DbwV2.7Gu9tTdR9n2IsXo1TzR9tLe', 3),
(4, 'Modo', '$2y$10$ehJRrhvNkmvVAU3y83I2DOOMH/t6DqdIFsVYFWuFKJ6tIiQTCtt2u', 2),
(5, '', '$2y$10$fOM87p/7meWa/SIJWqmwwesBnJv4majghXXNKRb9ORwE/9kb.4vmC', 1),
(6, 'L', '$2y$10$MGRlOo6mleRpe6OkcPAKwOnOvp0VqErTVdAPknYswp9KGJ/.dnY4m', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Auteur`
--
ALTER TABLE `Auteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligne_de_commande`
--
ALTER TABLE `ligne_de_commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Auteur`
--
ALTER TABLE `Auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `ligne_de_commande`
--
ALTER TABLE `ligne_de_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
