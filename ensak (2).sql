-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 18, 2021 at 09:48 PM
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
-- Database: `ensak`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_com` int(20) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `date_com` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_post` (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_com`, `commentaire`, `date_com`, `id_user`, `id_post`) VALUES
(1, 'yas', '2021-02-02 12:19:10', 2, 50),
(2, 'kks', '2021-02-02 12:22:48', 2, 50),
(3, 'good', '2021-02-02 12:23:11', 2, 50),
(4, 'ks', '2021-02-02 12:24:02', 2, 50),
(5, 'yassibe', '2021-02-02 12:25:32', 2, 50),
(6, 'yassibe', '2021-02-02 12:25:34', 2, 50),
(7, 'ya', '2021-02-02 12:26:27', 2, 50),
(8, 'nice', '2021-02-02 13:45:10', 2, 50),
(9, 'good', '2021-02-02 14:06:02', 2, 50),
(10, 'great', '2021-02-02 14:06:13', 2, 50),
(11, 'gat', '2021-02-02 14:37:53', 2, 50),
(12, 'aa', '2021-02-02 14:38:45', 2, 50),
(13, 'peace', '2021-02-02 14:39:25', 2, 50),
(14, 'a', '2021-02-02 14:39:48', 2, 50),
(15, 'a', '2021-02-02 14:40:16', 2, 50),
(16, 'yaa', '2021-02-02 14:41:53', 2, 51),
(17, 'a', '2021-02-02 14:43:37', 1, 51),
(18, 'va', '2021-02-02 14:46:46', 1, 50),
(19, 'saad', '2021-02-02 14:46:56', 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
CREATE TABLE IF NOT EXISTS `followers` (
  `id_follow` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  PRIMARY KEY (`id_follow`),
  KEY `id_user` (`id_user`),
  KEY `id_follower` (`id_follower`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `post`, `date_post`, `id_user`) VALUES
(48, 'first post', '2021-01-30 17:36:41', 2),
(49, 'Second post', '2021-01-30 17:37:11', 2),
(50, 'Helloo everyone my name is saad and I\'m a web developper Istudy in national school of applied science at Kenitra ', '2021-01-30 17:49:03', 2),
(51, '4 post', '2021-01-30 17:58:30', 1),
(52, 'hello', '2021-02-02 14:08:55', 2),
(53, 'ga', '2021-02-02 16:32:26', 2),
(54, 'wonderful', '2021-02-02 16:40:24', 2),
(55, 'bonjour', '2021-02-14 15:57:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

DROP TABLE IF EXISTS `rating_info`;
CREATE TABLE IF NOT EXISTS `rating_info` (
  `id_like` int(255) NOT NULL AUTO_INCREMENT,
  `id_post` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `rating_action` varchar(11) NOT NULL,
  PRIMARY KEY (`id_like`),
  UNIQUE KEY `id_post_2` (`id_post`),
  KEY `id_post` (`id_post`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=397 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`id_like`, `id_post`, `id_user`, `rating_action`) VALUES
(172, 51, 2, 'like'),
(176, 48, 2, 'like'),
(312, 49, 2, 'dislike'),
(385, 50, 2, 'like'),
(386, 54, 2, 'like'),
(395, 53, 2, 'dislike'),
(396, 52, 2, 'like');

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
  `gender` varchar(10) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `intersts` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `date_de_naissance`, `mot_de_passe`, `photo`, `description`, `email`, `gender`, `nom_utilisateur`, `intersts`) VALUES
(1, 'oujaa', 'yassine', '2021-01-06', '1234', 'ImageProfil/user2.jpg', 'szlsazl', 'jqddjz', 'male', 'yassine_oujaa', 'd'),
(2, 'mazouzi ', 'saad', '2021-01-10', '1234', 'ImageProfil/user1.jpg', 'blabla', 'bla@gmail.com', '', 'saad_mazouzi ', 'blablabla'),
(3, 'oukassou', 'ilham', '2021-02-03', '1234', 'photo', 'fzeefzefzeczec', 'cqscqscqsc', 'female', 'ilham_oukasso', 'zddadcsq'),
(4, 'kassi', 'Ayoub', '2021-02-15', 'dzd', 'dazdazd', 'dzadaz', 'dazdza', 'azdazd', 'Aomini_uchicha', 'zdazdazdaz');

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
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`id_follower`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD CONSTRAINT `rating_info_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_info_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
