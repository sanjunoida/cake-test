-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2018 at 10:54 AM
-- Server version: 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `path`, `description`, `user_id`) VALUES
(18, 'test', 'sanjay', 'bnnb', 2),
(2, 'fefefef', 'dww', 'ertertret', 2),
(3, 'sdsdsdddssdss', 'sfdsdrt', 'ertert', 2),
(17, 'key', 'key', 'key', 2),
(5, 'folder', 'folder', 'folder', 3),
(16, 'new fuck', 'fefe', 'sdfd', 3),
(7, 'new image', 'dww', 'ertertret', 3),
(8, 'new image', 'dww', 'ertertret', 3),
(9, 'info', 'dedeeeffef', 'ertertret', 3),
(10, 'hghg', 'jhuh', 'ygyug', 3),
(11, 'jhjh', 'jhjh', 'jnjn', 3),
(12, 'jhjjh', 'mkm', 'mnmn', 3),
(13, 'jnnjn', 'nnmn', 'jnbjn', 3);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  `folder_id` int(11) NOT NULL,
  `approved` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `path`, `created`, `modified`, `folder_id`, `approved`) VALUES
(1, 'new image', '1200px-Mäksa_Parish,_Tartu_County,_Estonia_-_panoramio_(3).jpg', '2018-07-02 11:37:00', '2018-07-07 02:20:05', 2, 'true'),
(3, 'info', '17353249_1155535611222406_150769949944653723_n.jpg', '2018-07-03 03:35:22', '2018-07-06 17:42:04', 2, 'false'),
(4, 'test', '17264681_1154621474647153_9093909278072064648_n.jpg', '2018-07-03 03:36:17', '2018-07-06 17:42:07', 2, 'false'),
(5, 'mom', '17353249_1155535611222406_150769949944653723_n.jpg', '2018-07-03 03:37:18', '2018-07-06 17:42:09', 2, 'false'),
(6, 'kdjsdsks', '20180321_124611.jpg', '2018-07-03 03:37:58', '2018-07-06 17:42:12', 2, 'false'),
(7, 'addd image', '214-1675-14_DOOR_COUNTY_WISCONSIN_X_xgaplus.jpg', '2018-07-03 03:39:30', '2018-07-06 17:42:15', 2, 'false'),
(8, 'NY’s Best Metropolitan Linen', '20170417_134936_1.jpg', '2018-07-03 08:38:24', '2018-07-06 17:42:18', 2, 'false'),
(9, 'testing folders', '16507980_1117518728357428_1345865200088497620_n.jpg', '2018-07-03 08:46:13', '2018-07-06 17:30:04', 2, 'false'),
(10, 'rrtrtr', 'Picture3.png', '2018-07-06 03:01:28', '2018-07-06 17:41:47', 2, 'true'),
(11, 'new folder imag', 'Picture2.png', '2018-07-06 03:04:42', '2018-07-06 17:41:51', 2, 'true'),
(12, 'new folder imag', 'Picture2.png', '2018-07-06 03:05:20', '2018-07-06 17:41:55', 2, 'true'),
(13, 'dfdff', 'Picture4.png', '2018-07-06 03:05:36', '2018-07-06 17:41:58', 2, 'true'),
(15, 'new image', 'Assembly_Developments_logo.jpg', '2018-07-06 03:10:21', '2018-07-06 03:10:21', 3, 'false'),
(16, 'NYC', 'Picture2.png', '2018-07-06 03:12:28', '2018-07-06 03:12:28', 3, 'false'),
(19, 'sanjay', 'Picture4.png', '2018-07-07 03:21:52', '2018-07-07 03:21:52', 17, 'false'),
(20, 'Sanjay Singh image', 'Picture1.png', '2018-07-07 03:23:27', '2018-07-07 03:23:27', 17, 'false'),
(21, 'NY’s Best Metropolitan Linen', 'Picture2.png', '2018-07-07 03:30:35', '2018-07-07 03:30:44', 17, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20180701033358, 'Initial', '2018-06-30 22:03:58', '2018-06-30 22:03:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `userrole` varchar(255) NOT NULL DEFAULT 'author',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `created`, `modified`, `userrole`) VALUES
(2, 'sanjunoida1@gmail.com', '$2y$10$rE7Skg2a63V7wrhdFAOIVOGtvPw2GdFADEB/rUBqLRJH0irAmxcFi', '7017161084', '2018-07-02 04:18:16', '2018-07-02 04:18:16', 'author'),
(3, 'sanjunoida4@gmail.com', '$2y$10$iy8N6rZFZ6tpnifha8fn8OEc0cxSvT5nfkJ6S5GOq/pCOvkU8NOJi', '7017161081', '2018-07-02 04:23:31', '2018-07-02 04:23:31', 'admin'),
(7, 'sanjunoida11@gmail.com', 'passwor', '7017161084', '2018-07-05 10:43:26', '2018-07-05 10:43:26', 'admin'),
(8, 'sanjunoida12@gmail.com', '$2y$10$XKXdsyQ9vbB/JReJ1UaMAOVhYZ5rdKOOkafrid55AcsgkBlCaeyxi', '7017161084', '2018-07-07 04:27:51', '2018-07-07 04:27:51', 'author'),
(9, 'sanjunoida15@gmail.com', '$2y$10$tgbLrXHrG7.ekWcb1SAD0O4X7Ypyx1YEgJewsUqLwzxhkid4d6CEu', '7017161084', '2018-07-07 10:06:19', '2018-07-07 10:06:19', 'author');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
