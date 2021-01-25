-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2021 at 09:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensaki`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_com` int(20) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `date_com` timestamp NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_post` (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int(20) NOT NULL AUTO_INCREMENT,
  `id_post` int(20) NOT NULL,
  `date_like` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(20) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(20) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(20) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `post`, `date_post`, `id_user`) VALUES
(1, 'uzdhzzzzzzzzzzzzzzz', '2021-01-24 20:30:05', 1),
(2, 'yassine oujaa', '2021-01-24 20:43:27', 1),
(3, '$Text', '2021-01-24 20:50:46', 1),
(4, '$Text', '2021-01-24 20:52:46', 1),
(5, '$Text', '2021-01-24 22:10:46', 1),
(7, 'yassi nd', '2021-01-24 22:38:09', 1),
(8, 'jfdeuz', '2021-01-24 22:38:12', 1),
(9, 'my name is jhon sina ', '2021-01-24 22:38:33', 1),
(10, 'yassine ', '2021-01-24 22:48:56', 1),
(11, 'oujaa', '2021-01-24 22:49:07', 1),
(12, 'rnnznfz', '2021-01-24 23:06:44', 1),
(13, 'ouaja ', '2021-01-25 20:22:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `intersts` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `date_de_naissance`, `mot_de_passe`, `photo`, `description`, `email`, `nom_utilisateur`, `intersts`) VALUES
(1, 'oujaa', 'yassine', '2021-01-06', '1234', 'jdazi', 'szlsazl', 'jqddjz', 's,djzodkzap', 'jdzijdazdjaz');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
