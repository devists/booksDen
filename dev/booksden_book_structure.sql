-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 03:40 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booksden`
--

-- --------------------------------------------------------

--
-- Table structure for table `booksden_book`
--

CREATE TABLE IF NOT EXISTS `booksden_book` (
  `isbn` bigint(13) NOT NULL,
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `up_date` timestamp NOT NULL,
  `title` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `p_year` timestamp NOT NULL,
  `edition` int(5) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `category` varchar(15) NOT NULL,
  `tags` text NOT NULL,
  `pages` int(7) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`isbn`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
