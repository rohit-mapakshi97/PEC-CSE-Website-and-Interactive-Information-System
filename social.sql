-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 02:30 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--
CREATE DATABASE IF NOT EXISTS `social` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `social`;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--
-- Creation: Apr 01, 2018 at 11:43 AM
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `year` year(4) NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `teammates` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `awards`:
--

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `title`, `description`, `year`, `added_by`, `user_closed`, `deleted`, `teammates`, `image`) VALUES
(15, 'Android App', 'Won the android app competition  organized by multimedia club,\r\ncse. ', 2018, 'rohit_mapakshi', 'no', 'no', 'Sam', 'uploads/5ae1625196066.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--
-- Creation: Mar 27, 2018 at 11:38 AM
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `likes`:
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--
-- Creation: Apr 27, 2018 at 11:16 AM
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `message` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `priority` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `notification`:
--

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `message`, `added_by`, `date_added`, `priority`) VALUES
(1, 'Lab Exam', 'Simple Notification', 'sugumaran_m', '2018-04-30 15:04:13', 'alert-danger');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--
-- Creation: Apr 06, 2018 at 07:35 PM
--

DROP TABLE IF EXISTS `papers`;
CREATE TABLE `papers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `authors` text NOT NULL,
  `download_link` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `papers`:
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
-- Creation: Apr 27, 2018 at 04:32 AM
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `posts`:
--   `added_by`
--       `users` -> `username`
--

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `date_added`, `user_closed`, `deleted`, `likes`, `image`) VALUES
(1, 'How Big Data Works', 'rohit_mapakshi', '2018-04-26 10:50:30', 'no', 'no', 0, 'uploads/5ae1619eab7a5.jpg'),
(2, 'This is a dem for post', 'admin_admin', '2018-04-30 15:02:58', 'no', 'no', 0, 'uploads/5ae6e2ca3a69c.jpg'),
(3, 'post', 'sugumaran_m', '2018-04-30 15:03:33', 'no', 'no', 0, 'uploads/5ae6e2edc9a34.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--
-- Creation: Mar 27, 2018 at 11:36 AM
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `post_comments`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 27, 2018 at 04:28 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `is_professor` varchar(3) NOT NULL,
  `status` varchar(50) NOT NULL,
  `special_status` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `specialization` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `user_closed`, `is_professor`, `status`, `special_status`, `designation`, `specialization`) VALUES
('Admin', 'Admin', 'admin_admin', 'admin@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '2018-04-27', 'assets/defaults/default_pro_pic.png', 'no', 'no', '', 0, '', ''),
('Akila', 'V', 'akila_v', 'akila@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'Mining software repositories,Social network analysis'),
('Amuthan', 'A', 'amuthan_a', 'amuthan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Associate Dean Accreditation', 3, 'professor', 'Software engineering ,Computer networks,Network security'),
('Gnanesh', 'Rasineni', 'gnanesh_rasineni', 'gnanesh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-04-03', 'profilepics/gnanesh_rasineni.jpg', 'no', 'no', '', 0, '', ''),
('Ilavarasan', 'E', 'ilavarasan_e', 'eilavarasan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'professor', 'Microprocessors & microcontroller,Data mining'),
('Jayabharathy', 'J', 'jayabharathi_j', 'bharathyrajaja@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'associate professor', 'Distributed computing'),
('Kalpana', 'R', 'kalpana_r', 'kalpanar@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Convener Womens cell', 3, 'professor', 'OOD,Distributed computing,Middleware technology'),
('Karunakaran', 'E', 'karunakaran_e', 'ekaruna@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'associate professor', ''),
('Kavitha Kumar', 'R', 'kavithakumar_r', 'rkavithakumar@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'programmer', 'OOPS, Web design, Pervasive computing'),
('Kumaran@kumar', 'J', 'Kumaran@kumar_j', 'kumaran@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'AOP,Programming languages'),
('Lakshmana pandian', 'S', 'lakshmana pandian_s', 'lpandian72@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'associate professor', 'Language technologies,Compiler design'),
('Loganathan', 'D', 'loganathan_d', 'drloganathan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'professor', 'Image processing,Information security'),
('Manoharan', 'R', 'manoharan_r', 'rmanoharan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'professor', 'Highspeed networks,Internet technologies,Software engineering'),
('Phani', 'Indra', 'phani_indra', 'pindra829@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-03-25', 'assets/defaults/default_pro_pic.png', 'no', 'no', '', 0, '', ''),
('Rohit', 'Mapakshi', 'rohit_mapakshi', 'rohitmapakshi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-03-25', 'profilepics/rohit_mapakshi.jpg', 'no', 'no', '', 0, 'student', ''),
('Sagayaraj francis', 'F', 'sagayara francis_f', 'fsfrancis@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Institute Information and Placement Officer', 3, 'professor', 'Database system,Graphics,Automata & management'),
('Salini', 'P', 'salin_p', 'salini@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'Software engineering,Information security, Distributed computing'),
('Sarala', 'R', 'sarala_r', 'sarala@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'Computer Networks, Software engineering'),
('Saruladha', 'K', 'saruladha_k', 'charuladha@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'associate professor', 'Onthology matching,Data management,Opininon mining & sentiment analysis'),
('Sathiyamurthy', 'K', 'sathiyamurthy_k', 'sathiyamurthi@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'associate professor', 'Web services and internet technology,NLP,Information retrieval,E-Learning'),
('Selvaradjou', 'Ka', 'selvaradjou_ka', 'selvaraj@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Convener Anti-Ragging Squad', 3, 'professor', 'Microprocessor,Computer hardware & Sensor networks'),
('Sheeba', 'J I', 'sheeba_ji', 'sheeba@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'Data mining, Network security, Database management system'),
('Sivakumar', 'N', 'sivakumar_n', 'sivakumar1@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Convener  NSS', 3, 'assistant professor', 'Database management system,Computer graphics'),
('Sreenath', 'N', 'sreenath_n', 'nsreenath@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Dean Accreditation', 4, 'professor', 'Highspeed networks,Optical networks'),
('Sugumaran', 'M', 'sugumaran_m', 'sugu@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'profilepics/sugumaran_m.jpg', 'no', 'yes', 'Head Of The Department', 5, 'professor', 'Algorithms,Theretical computer science,Computer networks'),
('Thenmozhi', 'M', 'thenmozhi_m', 'thenmozhi@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'Data warehousing and data mining,Distributed computing, Operating systems, Ontology'),
('Thirumaran', 'M', 'thirumaran_m', 'thirumaran@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', '', 2, 'assistant professor', 'Automata languages and computation, Compiler  design, Web technology'),
('Vivekanadan', 'K', 'vivekanadan_k', 'k.vivekanadan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Dean Student Affairs', 4, 'professor', 'Software engineering,Agile programming'),
('Zayaraz', 'G', 'zayaraz_g', 'gsayaraz@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 'no', 'yes', 'Associate Dean Student Affairs', 3, 'professor', 'Software architecture information security');

-- --------------------------------------------------------

--
-- Table structure for table `users_temp`
--
-- Creation: Apr 07, 2018 at 10:41 AM
--

DROP TABLE IF EXISTS `users_temp`;
CREATE TABLE `users_temp` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL,
  `is_professor` varchar(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `special_status` varchar(5) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `specialization` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users_temp`:
--

--
-- Dumping data for table `users_temp`
--

INSERT INTO `users_temp` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`, `is_professor`, `status`, `special_status`, `designation`, `specialization`) VALUES
(7, 'Rohit', 'Mapakshi', 'rohit_mapakshi', 'rohitmapakshi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-03-25', 'profilepics/rohit_mapakshi.jpg', 0, 0, 'no', ',', '', '', '', '', ''),
(8, 'Phani', 'Indra', 'phani_indra', 'pindra829@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-03-25', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', '', '', '', '', ''),
(9, 'Phani', 'Indra', 'phani_indra_1', 'pindra829@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '2018-03-25', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', '', '', '', '', ''),
(10, 'Gnanesh', 'Rasineni', 'gnanesh_rasineni', 'gnanesh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-04-03', 'profilepics/gnanesh_rasineni.jpg', 0, 0, 'no', ',', '', '', '', '', ''),
(11, 'Vivekanadan', 'K', 'vivekanadan_k', 'k.vivekanadan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Dean Student Affairs', 'yes', 'professor', 'Software engineering,Agile programming'),
(12, 'Sreenath', 'N', 'sreenath_n', 'nsreenath@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Dean Accreditation', 'yes', 'professor', 'Highspeed networks,Optical networks'),
(13, 'Loganathan', 'D', 'loganathan_d', 'drloganathan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'professor', 'Image processing,Information security'),
(14, 'Sugumaran', 'M', 'sugumaran_m', 'sugu@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Head of the Department', 'yes', 'professor', 'Algorithms,Theretical computer science,Computer networks'),
(15, 'Manoharan', 'R', 'manoharan_r', 'rmanoharan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'professor', 'Highspeed networks,Internet technologies,Software engineering'),
(16, 'Sagayaraj francis', 'F', 'sagayara francis_f', 'fsfrancis@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Institute Information and Placement Officer', 'yes', 'professor', 'Database system,Graphics,Automata & management'),
(17, 'Zayaraz', 'G', 'zayaraz_g', 'gsayaraz@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Associate Dean Student Affairs', 'yes', 'professor', 'Software architecture information security'),
(18, 'Ilavarasan', 'E', 'ilavarasan_e', 'eilavarasan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'professor', 'Microprocessors & microcontroller,Data mining'),
(19, 'Kalpana', 'R', 'kalpana_r', 'kalpanar@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Convener Womens cell', '', 'professor', 'OOD,Distributed computing,Middleware technology'),
(20, 'Amuthan', 'A', 'amuthan_a', 'amuthan@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Associate Dean Accreditation', 'yes', 'professor', 'Software engineering ,Computer networks,Network security'),
(21, 'Selvaradjou', 'Ka', 'selvaradjou_ka', 'selvaraj@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Convener Anti-Ragging Squad', 'yes', 'professor', 'Microprocessor,Computer hardware & Sensor networks'),
(22, 'Lakshmana pandian', 'S', 'lakshmana pandian_s', 'lpandian72@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'associate professor', 'Language technologies,Compiler design'),
(23, 'Saruladha', 'K', 'saruladha_k', 'charuladha@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'associate professor', 'Onthology matching,Data management,Opininon mining & sentiment analysis'),
(24, 'Sathiyamurthy', 'K', 'sathiyamurthy_k', 'sathiyamurthi@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'associate professor', 'Web services and internet technology,NLP,Information retrieval,E-Learning'),
(25, 'Jayabharathy', 'J', 'jayabharathi_j', 'bharathyrajaja@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'associate professor', 'Distributed computing'),
(26, 'Karunakaran', 'E', 'karunakaran_e', 'ekaruna@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'associate professor', ''),
(27, 'Sivakumar', 'N', 'sivakumar_n', 'sivakumar1@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', 'Convener  NSS', 'yes', 'assistant professor', 'Database management system,Computer graphics'),
(28, 'Sarala', 'R', 'sarala_r', 'sarala@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'Computer Networks, Software engineering'),
(29, 'Kumaran@kumar', 'J', 'Kumaran@kumar_j', 'kumaran@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'AOP,Programming languages'),
(30, 'Thirumaran', 'M', 'thirumaran_m', 'thirumaran@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'Automata languages and computation, Compiler  design, Web technology'),
(31, 'Akila', 'V', 'akila_v', 'akila@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'Mining software repositories,Social network analysis'),
(32, 'Salini', 'P', 'salin_p', 'salini@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'Software engineering,Information security, Distributed computing'),
(33, 'Thenmozhi', 'M', 'thenmozhi_m', 'thenmozhi@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'Data warehousing and data mining,Distributed computing, Operating systems, Ontology'),
(34, 'Sheeba', 'J I', 'sheeba_ji', 'sheeba@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'assistant professor', 'Data mining, Network security, Database management system'),
(35, 'Kavitha Kumar', 'R', 'kavithakumar_r', 'rkavithakumar@pec.edu', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 'assets/defaults/default_pro_pic.png', 0, 0, 'no', ',', 'yes', '', '', 'programmer', 'OOPS, Web design, Pervasive computing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users_temp`
--
ALTER TABLE `users_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_temp`
--
ALTER TABLE `users_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
