-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2018 at 02:53 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes3`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes3`
--

DROP TABLE IF EXISTS `notes3`;
CREATE TABLE IF NOT EXISTS `notes3` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(355) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes3`
--

INSERT INTO `notes3` (`note_id`, `title`, `description`, `tags`, `user_id`) VALUES
(1, 'My noteskia', 'Hello', 'hello', 1),
(54, 'English', 'hello hii ', 'bye bye', 2),
(56, 'lalita2', 'lalita', 'lalita', 25),
(57, 'Sagar', 'Anand', 'abcd2', 2),
(59, 'aa', 'aaaaaaaaaaa', 'aaaaaaaaaaaa', 2),
(60, 'abc', 'abcd', 'abcde', 2),
(61, 'sweta', 'shared to sweta ', 'done', 28);

-- --------------------------------------------------------

--
-- Table structure for table `users3`
--

DROP TABLE IF EXISTS `users3`;
CREATE TABLE IF NOT EXISTS `users3` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users3`
--

INSERT INTO `users3` (`user_id`, `user_name`, `email`, `password`, `active`) VALUES
(1, 'Kiayara', 'kia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Sweta', 'khasalesweta@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'Janvi', 'jan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'iggy', 'iggy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(20, 'binny', 'binny@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(21, 'sia', 'sia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(25, 'lalita', 'lalita@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(26, 'miley', 'miley@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(27, 'jimmy', 'jimmy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(28, 'Sagar', 'sagarpatel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(29, 'temp', 'temp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_notes`
--

DROP TABLE IF EXISTS `user_notes`;
CREATE TABLE IF NOT EXISTS `user_notes` (
  `un_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `shareby` varchar(255) NOT NULL,
  `shareto` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  PRIMARY KEY (`un_id`),
  KEY `fk_user` (`user_id`),
  KEY `fk_note` (`note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notes`
--

INSERT INTO `user_notes` (`un_id`, `permission`, `shareby`, `shareto`, `user_id`, `note_id`) VALUES
(10, 'Read,Write', '', 'lalita', 2, 54),
(12, 'Read,Write,Edit', '', 'miley', 2, 54),
(13, 'Read,Write', 'sweta', 'sia', 25, 56),
(17, 'Read,Write', 'sweta', 'sweta', 2, 54),
(18, 'Read', 'sweta', 'sia', 2, 59),
(19, 'Read,Write,Share', 'sweta', 'Janvi', 2, 60),
(20, 'Read,Write', 'sweta', 'Janvi', 2, 59),
(21, 'Read,Write', 'sweta', 'Sagar', 2, 57),
(22, 'Read,Write', 'Sagar', 'Sweta', 28, 61),
(23, 'Read', 'Sagar', 'Sweta', 28, 61),
(24, 'Read,Write', 'sweta', 'Sagar', 2, 59),
(25, 'Read,Write', 'sweta', 'Sagar', 2, 59);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes3`
--
ALTER TABLE `notes3`
  ADD CONSTRAINT `notes3_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users3` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_notes`
--
ALTER TABLE `user_notes`
  ADD CONSTRAINT `user_notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users3` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_notes_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `notes3` (`note_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
