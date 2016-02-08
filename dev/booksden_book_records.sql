-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2016 at 07:58 PM
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

--
-- Dumping data for table `booksden_book`
--

INSERT INTO `booksden_book` (`isbn`, `up_date`, `title`, `author`, `publisher`, `p_year`, `edition`, `lang`, `category`, `tags`, `pages`, `rating`, `comment`, `count`) VALUES
(9780132990448, '2016-02-06 18:07:57', 'C How to Program', 'Paul Dietel & Harvey', '\0', '2016-02-06 18:07:57', 7, 'English', 'Programming', 'Basic C Programming', 0, '', '', 0),
(9781449325947, '2016-02-06 18:36:08', 'CSS3: MISSING MANUAL', 'DAVID SAWYER', 'MISSING MANUAL', '2016-02-06 18:36:08', 3, 'English', 'css3', 'WEB Development', 650, '5', '', 3),
(9781449363260, '2016-02-06 18:40:45', 'HTML:5', 'Matthew MacDonald', 'MISSING MANUAL', '2016-02-06 18:40:45', 2, 'English', 'Web Development', 'FIRST LESSON TO DESIGN A WEB PAGE', 519, '5', 'NICE ONE', 6),
(9788178087368, '2016-02-06 18:21:31', 'The C Programming Language', 'BRIAN W.KERNIGHAN', 'Prentice HALL', '2016-02-06 18:21:31', 2, 'English', 'Programming', 'C Programming ', 457, '5', '', 5),
(9780471694205, '2016-02-06 18:23:59', 'MATLAB:AN INTRODUCTION WITH AP', 'AMOS GILAT', 'WILEY', '2016-02-06 18:23:59', 5, 'English', 'MATLAB', 'INTRO ', 325, '4', '', 5),
(9780133976892, '2016-02-06 18:11:44', 'C How to Program', 'Paul Dietel & Harvey', 'Prentice HALL', '2016-02-06 18:11:44', 8, 'English', 'Programming', 'basic progrmming', 600, '5', 'vkfdl', 2),
(9781449301729, '2016-02-06 18:32:19', 'CREATING A WEBSITE MISSING MAN', 'Matthew MacDonald', 'MISSING MANUAL', '2016-02-06 18:32:19', 3, 'English', 'Web Development', 'Web Desingn', 581, '5', '', 7),
(9781449342418, '2016-02-06 18:45:58', 'PHOTOSHOP CC', 'Lesa Snider', 'Missing Manual', '2016-02-06 18:45:58', 1, 'english', 'Photoshop', 'Photoshop', 930, '5', '', 10),
(9781449341701, '2016-02-06 18:38:29', 'Dreamweaver CC', 'DAVID SAWYER and Chr', 'MISSING MANUAL', '2016-02-06 18:38:29', 1, 'English', 'CC', 'CC', 1006, '5', '', 6),
(9781449399023, '2016-02-06 18:45:58', 'JavaScript AND Jquery', 'DAVID SAWYER McFarla', 'MISSING MANUAL', '2016-02-06 18:45:58', 2, 'English', 'Web Development', 'NEXT LEVEL WEN DEVELOPMENT', 538, '5', '', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
